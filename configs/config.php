<?php
$servername = "127.0.0.1";  // Use IP instead of 'localhost' to force TCP connection
$port = 3306;
$username = "root";
$password = "";
$database = "lt_ccrms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
