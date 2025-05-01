<?php
session_start();

// Include the logger
require_once __DIR__ . '/logger.php';
$logger = getLogger();

// Log the logout event if a user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['accountType'])) {
    $username = $_SESSION['username'];
    $accountType = $_SESSION['accountType'];
    $logger->logAuth('logout', $username, $accountType);
}

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../authorization.php");
exit();
?> 