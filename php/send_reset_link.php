<?php
require '../config.php';
require '../vendor/autoload.php'; // PHPMailer
date_default_timezone_set('Asia/Manila');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(16));
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 minute'));
 // 60 seconds expiry

        // Store token
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expires_at);
        $stmt->execute();

        // Send email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'floreinesantos.wen@gmail.com';
            $mail->Password = 'cizgrfdvlmipgklk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('you@example.com', 'LT-CCRMS System');
            $mail->addAddress($email);

            $resetLink = "http://localhost/lt-ccrms-main/php/reset_password.php?token=$token";
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Click here to reset your password (valid for 60 seconds): <a href='$resetLink'>Reset Password</a>";

            $mail->send();
            echo "Check your email for the password reset link.";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found.";
    }
}
?>
