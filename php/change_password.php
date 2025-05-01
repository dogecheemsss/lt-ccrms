<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accountType = $_POST['accountType'] ?? '';
    $username = $_POST['username'] ?? '';
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($username) || empty($accountType) || empty($current_password) || empty($new_password) || empty($confirm_password)) {
        echo json_encode(["success" => false, "message" => "All fields are required!"]);
        exit();
    }

    if ($new_password !== $confirm_password) {
        echo json_encode(["success" => false, "message" => "Passwords do not match!"]);
        exit();
    }

    // Find the account with the matching username and accountType
    $stmt = $conn->prepare("SELECT password FROM accounts WHERE username = ? AND accountType = ?");
    $stmt->bind_param("ss", $username, $accountType);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "Account not found!"]);
        $stmt->close();
        exit();
    }

    $stmt->bind_result($db_passkey);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current_password, $db_passkey)) {
        echo json_encode(["success" => false, "message" => "Current password is incorrect!"]);
        exit();
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $updateStmt = $conn->prepare("UPDATE accounts SET password = ? WHERE username = ? AND accountType = ?");
    $updateStmt->bind_param("sss", $hashed_password, $username, $accountType);
    $updateStmt->execute();
    $updateStmt->close();

    echo json_encode(["success" => true, "message" => "Password updated successfully!"]);
    exit();
}
?>
