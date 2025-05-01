<?php
// Test script for the new archiving system
include 'configs/config.php';

header('Content-Type: text/plain');

echo "=== TESTING ARCHIVING SYSTEM ===\n\n";

// Function to execute a query and return formatted results
function executeQuery($conn, $sql, $description) {
    echo "--- $description ---\n";
    $result = $conn->query($sql);
    
    if (!$result) {
        echo "ERROR: " . $conn->error . "\n";
        return false;
    }
    
    if ($result->num_rows == 0) {
        echo "No results found.\n";
        return false;
    }
    
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    
    // Print first 3 rows at most
    $count = min(count($rows), 3);
    for ($i = 0; $i < $count; $i++) {
        echo "Row " . ($i+1) . ": " . json_encode($rows[$i]) . "\n";
    }
    
    if (count($rows) > 3) {
        echo "... " . (count($rows) - 3) . " more rows ...\n";
    }
    
    echo "Total: " . count($rows) . " rows\n\n";
    return $rows;
}

// 1. Check cases table
$cases = executeQuery($conn, "SELECT * FROM cases LIMIT 5", "Cases table contents (first 5 rows)");

if (!$cases) {
    die("ERROR: No cases found to test with.");
}

// 2. Check archived_cases table
executeQuery($conn, "SELECT * FROM archived_cases LIMIT 5", "Archived cases table contents (first 5 rows)");

// 3. Select a test case to archive
$testCase = $cases[0]['case_no'];
echo "Selected test case: $testCase\n\n";

// 4. Archive the test case
echo "--- Archiving test case ---\n";
try {
    $conn->begin_transaction();
    
    // Fetch the case data
    $sql = "SELECT * FROM cases WHERE case_no = '$testCase'";
    $result = $conn->query($sql);
    
    if ($result->num_rows === 0) {
        throw new Exception("Case not found");
    }
    
    $case = $result->fetch_assoc();
    
    // Insert into archived_cases table
    $stmt = $conn->prepare("INSERT INTO archived_cases 
        (case_no, title, nature, file_date, confrontation_date, action_taken, 
        settlement_date, exec_settlement_date, main_agreement, compliance_status, remarks, attached_file)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
    $stmt->bind_param("ssssssssssss", 
        $case['case_no'], $case['title'], $case['nature'], $case['file_date'],
        $case['confrontation_date'], $case['action_taken'], $case['settlement_date'],
        $case['exec_settlement_date'], $case['main_agreement'], $case['compliance_status'],
        $case['remarks'], $case['attached_file']);
        
    if (!$stmt->execute()) {
        throw new Exception("Error archiving case: " . $stmt->error);
    }
    $stmt->close();
    
    // Delete from the cases table
    $delete_sql = "DELETE FROM cases WHERE case_no = '$testCase'";
    if (!$conn->query($delete_sql)) {
        throw new Exception("Error removing case from active cases: " . $conn->error);
    }
    
    // Commit transaction
    $conn->commit();
    echo "Successfully archived case $testCase\n\n";
} catch (Exception $e) {
    $conn->rollback();
    echo "ERROR: " . $e->getMessage() . "\n\n";
    die("Test failed at archiving step.");
}

// 5. Verify case was moved to archived_cases
executeQuery($conn, "SELECT * FROM archived_cases WHERE case_no = '$testCase'", "Verifying case is in archived_cases table");
$stillInCases = executeQuery($conn, "SELECT * FROM cases WHERE case_no = '$testCase'", "Verifying case is not in cases table");

if ($stillInCases) {
    echo "ERROR: Case still exists in cases table after archiving.\n\n";
}

// 6. Restore the test case
echo "--- Restoring test case ---\n";
try {
    $conn->begin_transaction();
    
    // Fetch the archived case data
    $sql = "SELECT * FROM archived_cases WHERE case_no = '$testCase'";
    $result = $conn->query($sql);
    
    if ($result->num_rows === 0) {
        throw new Exception("Archived case not found");
    }
    
    $case = $result->fetch_assoc();
    
    // Insert back into cases table
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
    $delete_sql = "DELETE FROM archived_cases WHERE case_no = '$testCase'";
    if (!$conn->query($delete_sql)) {
        throw new Exception("Error removing case from archived cases: " . $conn->error);
    }
    
    // Commit transaction
    $conn->commit();
    echo "Successfully restored case $testCase\n\n";
} catch (Exception $e) {
    $conn->rollback();
    echo "ERROR: " . $e->getMessage() . "\n\n";
    die("Test failed at restoration step.");
}

// 7. Verify case was moved back to cases
executeQuery($conn, "SELECT * FROM cases WHERE case_no = '$testCase'", "Verifying case is back in cases table");
$stillArchived = executeQuery($conn, "SELECT * FROM archived_cases WHERE case_no = '$testCase'", "Verifying case is not in archived_cases table");

if ($stillArchived) {
    echo "ERROR: Case still exists in archived_cases table after restoration.\n\n";
}

echo "=== TEST COMPLETED SUCCESSFULLY ===\n";
echo "Your archiving system is functioning correctly!\n";

$conn->close();
?> 