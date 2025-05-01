<?php
session_start();
require 'config.php';
require_once '../configs/logger.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Get logger instance
    $logger = getLogger();
    
    // Step 1: Check if the user is in the deactivated_accounts table
    $checkDeactivated = $conn->prepare("SELECT * FROM deactivated_accounts WHERE username = ?");
    $checkDeactivated->bind_param("s", $username);
    $checkDeactivated->execute();
    $deactivatedResult = $checkDeactivated->get_result();
    $deactivatedUser = $deactivatedResult->fetch_assoc();

    if ($deactivatedUser) {
        // Optional: you can also verify password before showing the message
        if (password_verify($password, $deactivatedUser['password'])) {
            $logger->logAuth('failed_login', $username, 'Deactivated', null);
            header("Location: ../authorization.php?error=deactivated");
            exit();
        }
    }

    // Step 2: Proceed to normal login check
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user) {
        $password_verify_result = password_verify($password, $user['password']);
        
        if ($password_verify_result) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['accountType'] = $user['accountType'];
            
            // Log successful login
            $logger->logAuth('login', $user['username'], $user['accountType'], null);
            
            header("Location: ../index.php");
            exit();
        } else {
            // Log failed login (invalid password)
            $logger->logAuth('failed_login', $username, $user['accountType'], null);
            header("Location: ../authorization.php?error=invalid");
            exit();
        }
    } else {
        // Log failed login (user not found)
        $logger->logAuth('failed_login', $username, 'Unknown', null);
        header("Location: ../authorization.php?error=invalid");
        exit();
    }
}
?>
