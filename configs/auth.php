<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['userID'])) {
        header("Location: authorization.php");
        exit();
    }
}

function checkRole($required_role) {
    if (!isset($_SESSION['accountType']) || $_SESSION['accountType'] !== $required_role) {
        header("Location: unauthorized.php");
        exit();
    }
}
?> 