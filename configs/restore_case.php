<?php
include 'config.php';
require_once 'logger.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["case_no"])) {
    $case_no = $conn->real_escape_string($_POST["case_no"]);
    
    // Get logger instance
    $logger = getLogger();
    $username = $_SESSION['username'] ?? 'Unknown';
    
    try {
        // Start transaction
        $conn->begin_transaction();
        
        // First, fetch the archived case data
        $sql = "SELECT * FROM archived_cases WHERE case_no = '$case_no'";
        $result = $conn->query($sql);
        
        if ($result->num_rows === 0) {
            throw new Exception("Archived case not found");
        }
        
        $case = $result->fetch_assoc();
        
        // Insert back into cases table with proper attached_file handling
        $stmt = $conn->prepare("INSERT INTO cases 
            (case_no, title, nature, file_date, confrontation_date, action_taken, 
            settlement_date, exec_settlement_date, main_agreement, compliance_status, remarks, attached_file, is_archived)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
            
        $stmt->bind_param("ssssssssssss", 
            $case['case_no'], $case['title'], $case['nature'], $case['file_date'],
            $case['confrontation_date'], $case['action_taken'], $case['settlement_date'],
            $case['exec_settlement_date'], $case['main_agreement'], $case['compliance_status'],
            $case['remarks'], $case['attached_file']);
            
        if (!$stmt->execute()) {
            throw new Exception("Error restoring case: " . $stmt->error);
        }
        $stmt->close();
        
        // Delete from the archived_cases table
        $delete_sql = "DELETE FROM archived_cases WHERE case_no = '$case_no'";
        if (!$conn->query($delete_sql)) {
            throw new Exception("Error removing case from archived cases: " . $conn->error);
        }
        
        // Log the restore action
        $logger->logCase('restore', $case_no, $username);
        
        // Commit transaction
        $conn->commit();
        echo "success";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        
        // Log the error
        $logger->logError('restore_case_failed', $e->getMessage());
        
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
