<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; // Remove the password as XAMPP default root user has no password
$dbname = "lt_ccrms"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
