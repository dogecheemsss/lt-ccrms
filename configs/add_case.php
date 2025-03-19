<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $nature = $_POST['nature'];
    $file_date = $_POST['file_date'];
    $confrontation_date = $_POST['confrontation_date'] ?? NULL;
    $action_taken = $_POST['action_taken'] ?? NULL;
    $settlement_date = $_POST['settlement_date'] ?? NULL;
    $exec_settlement_date = $_POST['exec_settlement_date'] ?? NULL;
    $main_agreement = $_POST['main_agreement'] ?? NULL;
    $compliance_status = $_POST['compliance_status'] ?? "Ongoing";
    $remarks = $_POST['remarks'] ?? NULL;

    // **Generate Case Number**
    $yearCode = date('y');
    $query = "SELECT MAX(CAST(SUBSTRING_INDEX(case_no, '-', -1) AS UNSIGNED)) AS last_num FROM cases WHERE case_no LIKE '$yearCode-%'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $nextNumber = str_pad(($row['last_num'] ?? 0) + 1, 3, '0', STR_PAD_LEFT);
    $case_no = "$yearCode-$nextNumber";

    // **Insert Case**
    $stmt = $conn->prepare("INSERT INTO cases (case_no, title, nature, file_date, confrontation_date, action_taken, settlement_date, exec_settlement_date, main_agreement, compliance_status, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $case_no, $title, $nature, $file_date, $confrontation_date, $action_taken, $settlement_date, $exec_settlement_date, $main_agreement, $compliance_status, $remarks);
    $stmt->execute();

    // **Insert Persons**
    foreach ($_POST['complainant_first_name'] as $index => $first) {
        $stmt = $conn->prepare("INSERT INTO persons (first_name, middle_name, last_name, suffix) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first, $_POST['complainant_middle_name'][$index], $_POST['complainant_last_name'][$index], $_POST['complainant_suffix'][$index]);
        $stmt->execute();
        $complainant_id = $stmt->insert_id;
        $conn->query("INSERT INTO case_persons (case_no, person_id, role) VALUES ('$case_no', '$complainant_id', 'Complainant')");
    }

    foreach ($_POST['respondent_first_name'] as $index => $first) {
        $stmt->bind_param("ssss", $first, $_POST['respondent_middle_name'][$index], $_POST['respondent_last_name'][$index], $_POST['respondent_suffix'][$index]);
        $stmt->execute();
        $respondent_id = $stmt->insert_id;
        $conn->query("INSERT INTO case_persons (case_no, person_id, role) VALUES ('$case_no', '$respondent_id', 'Respondent')");
    }

    echo "success";
}
$conn->close();
?>
