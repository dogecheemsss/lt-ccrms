<?php
require '../config.php';
date_default_timezone_set('Asia/Manila');

$conn->query("SET time_zone = '+08:00';");

$token = $_GET['token'] ?? '';

if (!$token) {
    die("Invalid token.");
}

$stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("This link is invalid or has expired.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $email = $result->fetch_assoc()['email'];

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE accounts SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashedPassword, $email);
    $stmt->execute();

    // Delete the reset request from the password_resets table
    $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    echo "Password has been reset. <a href='../authorization.php'>Login here</a>.";
    exit;
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form method="POST">
        <label>New Password:</label><br>
        <input type="password" name="password" required autocomplete="off"><br><br>
        
        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password" required autocomplete="off"><br><br>
        
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
