<?php
include 'config.php';
require_once 'logger.php';

session_start();

// Get logger instance
$logger = getLogger();
$username = $_SESSION['username'] ?? 'Unknown';

// Define database credentials (make these available for both backup and restore)
$database = "lt_ccrms";  // Change this to your actual database name
$user = "root";  // XAMPP default user
$password = "";  // Default password (empty in XAMPP)

// Backup Function
if (isset($_GET['backup'])) {
    // Define backup file location
    $backupFile = "backup_" . date("Y-m-d_H-i-s") . ".sql";
    $backupPath = "C:/xampp/tmp/" . $backupFile;  // Use /tmp/ to avoid permission issues

    // MySQL Dump Command
    $command = "\"C:\\xampp\\mysql\\bin\\mysqldump\" --user=$user --password=$password --databases $database > \"$backupPath\" 2>&1";
    $output = shell_exec($command);

    if (file_exists($backupPath)) {
        // Log the successful backup
        $logger->logData('backup', "Created backup file: $backupFile", $username);
        
        // Force download
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $backupFile . '"');
        readfile($backupPath);
        unlink($backupPath);  // Delete after download
        exit;
    } else {
        // Log the failed backup
        $logger->logError('backup_failed', "Failed to create backup: " . $output);
        
        echo "Backup failed! Debug output: " . htmlspecialchars($output);
    }
}

// Restore Function
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backup_file"])) {
    $file = $_FILES["backup_file"]["tmp_name"];
    $originalFileName = $_FILES["backup_file"]["name"];
    
    if ($file) {
        $command = "\"C:\\xampp\\mysql\\bin\\mysql\" --user=$user --password=$password $database < \"$file\" 2>&1";
        $restoreOutput = shell_exec($command);
        
        if ($restoreOutput === null || $restoreOutput === "") {
            // Log the successful restore
            $logger->logData('restore', "Restored database from: $originalFileName", $username);
            
            echo "<script>alert('✅ Database restored successfully!'); window.location.href='settings.php';</script>";
        } else {
            // Log the failed restore
            $logger->logError('restore_failed', "Failed to restore from: $originalFileName - Error: $restoreOutput");
            
            echo "<script>alert('❌ Restore failed: " . addslashes($restoreOutput) . "');</script>";
        }
    } else {
        // Log the failed restore attempt
        $logger->logError('restore_failed', "No file uploaded or upload failed");
        
        echo "<script>alert('❌ No file uploaded or upload failed!');</script>";
    }
}
?>