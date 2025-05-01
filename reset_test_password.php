<?php
require 'php/config.php';

$username = "LUPON";
$new_password = "password123"; // Plain text password for testing
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

echo "<h2>Password Reset Utility</h2>";

// Update the user's password
$stmt = $conn->prepare("UPDATE accounts SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashed_password, $username);
$result = $stmt->execute();

if ($result) {
    echo "Password for user '$username' has been reset to '$new_password'<br>";
    echo "Hashed password: $hashed_password<br>";
    echo "<p>You can now try to login with:<br>";
    echo "Username: $username<br>";
    echo "Password: $new_password</p>";
    
    // Also verify if the user exists and display account details
    $check = $conn->prepare("SELECT * FROM accounts WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $user = $check->get_result()->fetch_assoc();
    
    if ($user) {
        echo "<h3>User details:</h3>";
        echo "User ID: " . $user['userID'] . "<br>";
        echo "Username: " . $user['username'] . "<br>";
        echo "Account Type: " . $user['accountType'] . "<br>";
    } else {
        echo "Warning: User $username not found after password update!";
    }
} else {
    echo "Error updating password: " . $conn->error;
}

echo "<p><a href='authorization.php'>Go to Login Page</a></p>";
?> 