<?php
include 'config.php';
require_once 'logger.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $nature = $_POST['nature'];
    $file_date = $_POST['file_date'];
    $confrontation_date = !empty($_POST['confrontation_date']) ? $_POST['confrontation_date'] : NULL;
    $action_taken = !empty($_POST['action_taken']) ? $_POST['action_taken'] : NULL;
    $settlement_date = !empty($_POST['settlement_date']) ? $_POST['settlement_date'] : NULL;
    $exec_settlement_date = !empty($_POST['exec_settlement_date']) ? $_POST['exec_settlement_date'] : NULL;
    $main_agreement = !empty($_POST['main_agreement']) ? $_POST['main_agreement'] : NULL;
    $compliance_status = !empty($_POST['compliance_status']) ? $_POST['compliance_status'] : "Ongoing";
    $remarks = !empty($_POST['remarks']) ? $_POST['remarks'] : NULL;

    // Get logger instance
    $logger = getLogger();
    $username = $_SESSION['username'] ?? 'Unknown'; 

    // Handle the file upload
    $attached_file = NULL;  // Default to no file

    if (isset($_FILES['attached_file']) && $_FILES['attached_file']['error'] == 0) {
        $file_name = $_FILES['attached_file']['name'];
        $file_tmp_name = $_FILES['attached_file']['tmp_name'];
        $file_size = $_FILES['attached_file']['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Set allowed file types (for example, PDF, DOCX, JPG, PNG)
        $allowed_extensions = ['pdf', 'docx', 'jpg', 'jpeg', 'png'];

        // Check if the file extension is allowed
        if (!in_array(strtolower($file_ext), $allowed_extensions)) {
            echo "Error: Invalid file type. Only PDF, DOCX, JPG, and PNG files are allowed.";
            exit();
        }

        // Check file size (for example, 5MB limit)
        if ($file_size > 5 * 1024 * 1024) {
            echo "Error: File size exceeds the 5MB limit.";
            exit();
        }

        // Define a directory to save the file
        $upload_dir = '../uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);  // Create directory if it doesn't exist
        }

        // Generate a unique filename
        $file_new_name = uniqid('file_') . '.' . $file_ext;
        $file_path = $upload_dir . $file_new_name;

        // Move the file to the upload directory
        if (move_uploaded_file($file_tmp_name, $file_path)) {
            $attached_file = $file_new_name;  // Save the file name to the database
        } else {
            echo "Error: Failed to upload file.";
            exit();
        }
    }

    try {
        // Start transaction
        $conn->begin_transaction();

        // Generate Case Number - Using file_date year instead of current year
        $yearCode = date('y', strtotime($file_date));
        
        // Validate year is not in the future
        $currentYear = date('Y');
        $filedYear = date('Y', strtotime($file_date));
        if ($filedYear > $currentYear) {
            throw new Exception("Case filing date cannot be in the future");
        }
        
        // Use prepared statement for security
        $query = "SELECT MAX(CAST(SUBSTRING_INDEX(case_no, '-', -1) AS UNSIGNED)) AS last_num FROM cases WHERE case_no LIKE ?";
        $stmt = $conn->prepare($query);
        $yearPattern = $yearCode . '-%';
        $stmt->bind_param("s", $yearPattern);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $nextNumber = str_pad(($row['last_num'] ?? 0) + 1, 3, '0', STR_PAD_LEFT);
        $case_no = "$yearCode-$nextNumber";
        $stmt->close();
        
        // Validate case number format
        if (!preg_match('/^\d{2}-\d{3}$/', $case_no)) {
            throw new Exception("Generated case number is invalid");
        }

        $stmt = $conn->prepare("INSERT INTO cases (case_no, title, nature, file_date, confrontation_date, action_taken, settlement_date, exec_settlement_date, main_agreement, compliance_status, remarks, attached_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $case_no, $title, $nature, $file_date, $confrontation_date, $action_taken, $settlement_date, $exec_settlement_date, $main_agreement, $compliance_status, $remarks, $attached_file);
        
        if (!$stmt->execute()) {
            throw new Exception("Error inserting case: " . $stmt->error);
        }
        $stmt->close();

        // Insert Complainants
        if (isset($_POST['complainant_first_name']) && is_array($_POST['complainant_first_name'])) {
            foreach ($_POST['complainant_first_name'] as $index => $first_name) {
                $middle_name = isset($_POST['complainant_middle_name'][$index]) ? $_POST['complainant_middle_name'][$index] : NULL;
                $last_name = isset($_POST['complainant_last_name'][$index]) ? $_POST['complainant_last_name'][$index] : NULL;
                $suffix = isset($_POST['complainant_suffix'][$index]) ? $_POST['complainant_suffix'][$index] : NULL;
                
                if (!empty($first_name) && !empty($last_name)) {
                    $stmt = $conn->prepare("INSERT INTO persons (first_name, middle_name, last_name, suffix) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $first_name, $middle_name, $last_name, $suffix);
                    
                    if (!$stmt->execute()) {
                        throw new Exception("Error inserting complainant: " . $stmt->error);
                    }
                    
                    $person_id = $stmt->insert_id;
                    $stmt->close();
                    
                    $stmt = $conn->prepare("INSERT INTO case_persons (case_no, person_id, role) VALUES (?, ?, 'Complainant')");
                    $stmt->bind_param("si", $case_no, $person_id);
                    
                    if (!$stmt->execute()) {
                        throw new Exception("Error linking complainant to case: " . $stmt->error);
                    }
                    $stmt->close();
                }
            }
        }

        // Insert Respondents
        if (isset($_POST['respondent_first_name']) && is_array($_POST['respondent_first_name'])) {
            foreach ($_POST['respondent_first_name'] as $index => $first_name) {
                $middle_name = isset($_POST['respondent_middle_name'][$index]) ? $_POST['respondent_middle_name'][$index] : NULL;
                $last_name = isset($_POST['respondent_last_name'][$index]) ? $_POST['respondent_last_name'][$index] : NULL;
                $suffix = isset($_POST['respondent_suffix'][$index]) ? $_POST['respondent_suffix'][$index] : NULL;
                
                if (!empty($first_name) && !empty($last_name)) {
                    $stmt = $conn->prepare("INSERT INTO persons (first_name, middle_name, last_name, suffix) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $first_name, $middle_name, $last_name, $suffix);
                    
                    if (!$stmt->execute()) {
                        throw new Exception("Error inserting respondent: " . $stmt->error);
                    }
                    
                    $person_id = $stmt->insert_id;
                    $stmt->close();
                    
                    $stmt = $conn->prepare("INSERT INTO case_persons (case_no, person_id, role) VALUES (?, ?, 'Respondent')");
                    $stmt->bind_param("si", $case_no, $person_id);
                    
                    if (!$stmt->execute()) {
                        throw new Exception("Error linking respondent to case: " . $stmt->error);
                    }
                    $stmt->close();
                }
            }
        }

        // Commit the transaction
        $conn->commit();
        
        // Log the successful case addition
        $logger->logCase('add', $case_no, $username);
        
        echo "success";
        
    } catch (Exception $e) {
        // Roll back the transaction if something failed
        $conn->rollback();
        
        // Log the error
        $logger->logError('add_case_failed', $e->getMessage());
        
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
