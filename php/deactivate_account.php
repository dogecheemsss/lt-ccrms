<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['deactivate_username'] ?? '';
    $password = $_POST['deactivate_password'] ?? '';

    // Check if username exists in the accounts table
    $stmt = $conn->prepare("SELECT userID, password, email, accountType FROM accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userID, $db_password, $email, $accountType);
    $stmt->fetch();
    $stmt->close();

    if (!$userID) {
        echo json_encode(["success" => false, "message" => "Username not found!"]);
        exit();
    }

    // Verify password
    if (!password_verify($password, $db_password)) {
        echo json_encode(["success" => false, "message" => "Incorrect password!"]);
        exit();
    }

    // Begin transaction to ensure both actions happen together
    $conn->begin_transaction();

    try {
        // Insert into deactivated_accounts
        $insertStmt = $conn->prepare("INSERT INTO deactivated_accounts (userID, username, password, email, accountType) 
                                      VALUES (?, ?, ?, ?, ?)");
        $insertStmt->bind_param("issss", $userID, $username, $db_password, $email, $accountType);
        $insertStmt->execute();
        $insertStmt->close();

        // Delete from accounts table
        $deleteStmt = $conn->prepare("DELETE FROM accounts WHERE userID = ?");
        $deleteStmt->bind_param("i", $userID);
        $deleteStmt->execute();
        $deleteStmt->close();

        // Commit transaction
        $conn->commit();

        echo json_encode(["success" => true, "message" => "Account deactivated successfully!"]);
    } catch (Exception $e) {
        $conn->rollback(); // Rollback on failure
        echo json_encode(["success" => false, "message" => "Transaction failed: " . $e->getMessage()]);
    }

    exit();
}
?>
