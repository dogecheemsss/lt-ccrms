<?php
$servername = "localhost"; 
$username = "root"; 
$password = "brgyMolino3"; 
$dbname = "lt_ccrms"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
