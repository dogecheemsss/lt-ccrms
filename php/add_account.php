<?php
session_start();
include 'config.php'; // your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['new_username'];
    $email = $_POST['new_email'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $accountType = $_POST['accountType']; // uses the correct key

    // Check if email already exists
    $check = $conn->prepare("SELECT * FROM accounts WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "An account with that email already exists.";
        header("Location: ../settings.php");
        exit;
    }

    // Insert the account
    $stmt = $conn->prepare("INSERT INTO accounts (username, email, password, accountType) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $accountType);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Account added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add account.";
    }

    header("Location: ../settings.php");
    exit;
}
?>
