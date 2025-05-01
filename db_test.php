<?php
require 'php/config.php';

echo "<h2>Database Connection Test</h2>";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful!<br>";
}

// Check if users exist
$query = "SELECT userID, username, accountType FROM accounts";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "<h3>Users found in database:</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>User ID: " . $row['userID'] . ", Username: " . $row['username'] . ", Account Type: " . $row['accountType'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users found in the database.<br>";
}

// Check session variables
echo "<h3>Session Variables:</h3>";
session_start();
if (isset($_SESSION['userID'])) {
    echo "User ID in session: " . $_SESSION['userID'] . "<br>";
    echo "Username in session: " . $_SESSION['username'] . "<br>";
    echo "Account Type in session: " . $_SESSION['accountType'] . "<br>";
} else {
    echo "No user session found.<br>";
}

// Display tables in the database
$tables_query = "SHOW TABLES";
$tables_result = $conn->query($tables_query);

if ($tables_result) {
    echo "<h3>Tables in lt_ccrms database:</h3>";
    echo "<ul>";
    while ($table = $tables_result->fetch_row()) {
        echo "<li>" . $table[0] . "</li>";
    }
    echo "</ul>";
}
?> 