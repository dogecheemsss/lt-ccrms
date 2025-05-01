<?php
session_start();
require_once 'auth.php';
require_once 'logger.php';

// Check if user is authorized
if (!isset($_SESSION['username']) || !isset($_SESSION['accountType']) || $_SESSION['accountType'] !== 'lupon') {
    echo "unauthorized";
    exit;
}

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logging_type'])) {
    $loggingType = $_POST['logging_type'];
    $useDatabase = ($loggingType === 'database');
    
    try {
        // Get username for logging
        $username = $_SESSION['username'];
        
        // Get logger instance
        $logger = getLogger();
        
        // Create config file to store the setting
        $configFile = __DIR__ . '/../logs/config.php';
        $configDir = dirname($configFile);
        
        // Create directory if it doesn't exist
        if (!file_exists($configDir)) {
            if (!@mkdir($configDir, 0777, true)) {
                throw new Exception("Failed to create logs directory");
            }
        }
        
        // Create or update config file
        $configContent = "<?php\n// Auto-generated logging configuration\n\$LOGGING_USE_DATABASE = " . ($useDatabase ? 'true' : 'false') . ";\n?>";
        if (file_put_contents($configFile, $configContent) === false) {
            throw new Exception("Failed to write logging configuration");
        }
        
        // Enable/disable database logging for current session
        $logger->setDatabaseLogging($useDatabase);
        
        // Log the configuration change
        $logger->logSystem('change_logging_config', "Changed logging type to " . ($useDatabase ? 'database' : 'file'), $username);
        
        echo "success";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo "invalid_request";
}
?> 