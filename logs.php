<?php
require_once 'configs/auth.php';
checkAuth();

// Check role - only allow access to Lupon (admin) users
if (isset($_SESSION['accountType']) && $_SESSION['accountType'] !== 'lupon') {
    header("Location: index.php");
    exit();
}

require_once 'configs/logger.php';
$logger = getLogger();

// Check for any logger errors
$loggerError = $logger->getLastError();

// Get selected date (default to today)
$selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Validate date format
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selectedDate)) {
    $selectedDate = date('Y-m-d');
}

// Get filter type (default to all)
$filterType = isset($_GET['type']) ? strtoupper($_GET['type']) : 'ALL';
$validTypes = ['ALL', 'AUTH', 'CASE', 'USER', 'DATA', 'ERROR', 'SYSTEM'];
if (!in_array($filterType, $validTypes)) {
    $filterType = 'ALL';
}

// Get logs for the selected date
$logs = $logger->getLogs($selectedDate);

// Filter logs by type if needed
$filteredLogs = [];
if ($filterType !== 'ALL' && !empty($logs)) {
    foreach ($logs as $log) {
        if (strpos($log, "$filterType:") !== false) {
            $filteredLogs[] = $log;
        }
    }
} else {
    $filteredLogs = $logs;
}

// Log view logs action
$logger->logSystem('view_logs', "User viewed logs for date: $selectedDate, type: $filterType");

// Get all available log dates
$availableDates = $logger->getLogDates();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        body {
            display: flex;
            background-color: rgb(249, 244, 239);
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
        .dashboard-header {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #f6c77f;
            color: #f99858;
        }
        .header-right {
            display: flex;
            align-items: center;
        }
        .lupon-btn {
            background-color: #ffffff;
            color: #db8505;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            border: 3px solid #db8505;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease-in-out;
        }
        .lupon-btn:hover {
            background-color: #db8505;
            color: #ffffff;
        }
        .current-time {
            font-size: 16px;
            margin-right: 20px;
            color: #db8505;
            background-color: white;
            padding: 12px 24px;
            border-radius: 12px;
            border: 3px solid #db8505;
            font-weight: bold;
        }
        
        /* Logs Container */
        .logs-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        
        /* Date Filter */
        .filter-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff8eb;
            border-radius: 8px;
        }
        
        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .filter-section select, .filter-section input {
            padding: 8px 12px;
            border: 2px solid #db8505;
            border-radius: 6px;
            background-color: white;
            color: #db8505;
            font-weight: bold;
            cursor: pointer;
        }
        
        .filter-section button {
            padding: 8px 15px;
            background-color: #db8505;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-section button:hover {
            background-color: #b57304;
        }
        
        /* Log Type Pills */
        .log-type-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            width: 100%;
        }
        
        .type-pill {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .type-pill.all {
            background-color: #e0e0e0;
            color: #424242;
        }
        
        .type-pill.auth {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .type-pill.case {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .type-pill.user {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .type-pill.data {
            background-color: #ffebee;
            color: #c62828;
        }
        
        .type-pill.error {
            background-color: #ffcdd2;
            color: #d32f2f;
        }
        
        .type-pill.system {
            background-color: #eceff1;
            color: #455a64;
        }
        
        .type-pill.active {
            transform: scale(1.05);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .type-pill.all.active {
            background-color: #9e9e9e;
            color: white;
        }
        
        .type-pill.auth.active {
            background-color: #2e7d32;
            color: white;
        }
        
        .type-pill.case.active {
            background-color: #1976d2;
            color: white;
        }
        
        .type-pill.user.active {
            background-color: #7b1fa2;
            color: white;
        }
        
        .type-pill.data.active {
            background-color: #c62828;
            color: white;
        }
        
        .type-pill.error.active {
            background-color: #d32f2f;
            color: white;
        }
        
        .type-pill.system.active {
            background-color: #455a64;
            color: white;
        }
        
        /* Log Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f7ead1;
            color: #db8505;
            font-weight: bold;
        }
        
        tr:hover {
            background-color: #fff8eb;
        }
        
        /* Log Entry Types */
        .log-auth { color: #2e7d32; } /* Green for auth */
        .log-case { color: #1976d2; } /* Blue for case */
        .log-user { color: #7b1fa2; } /* Purple for user */
        .log-data { color: #c62828; } /* Red for data */
        .log-error { color: #d32f2f; font-weight: bold; } /* Bold red for errors */
        .log-system { color: #455a64; } /* Dark gray for system */
        
        .log-type-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 12px;
            margin-right: 8px;
        }
        
        .log-type-badge.auth {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        
        .log-type-badge.case {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .log-type-badge.user {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .log-type-badge.data {
            background-color: #ffebee;
            color: #c62828;
        }
        
        .log-type-badge.error {
            background-color: #ffcdd2;
            color: #d32f2f;
        }
        
        .log-type-badge.system {
            background-color: #eceff1;
            color: #455a64;
        }
        
        /* Empty state */
        .empty-logs {
            text-align: center;
            padding: 40px;
            color: #888;
            font-style: italic;
        }
        
        /* Error alert */
        .error-alert {
            background-color: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 5px solid #c62828;
        }
        
        /* Export button */
        .export-btn {
            margin-left: auto;
            background-color: #4caf50;
            color: white;
            border: none;
        }
        
        .export-btn:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <span>System Logs</span>
            <div class="header-right">
                <div id="current-time" class="current-time"></div>
                <button onclick="redirectToAuthorization(event)" class="lupon-btn">
                    <?php echo htmlspecialchars($_SESSION['username']); ?> <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>
        
        <div class="logs-container">
            <?php if ($loggerError): ?>
            <div class="error-alert">
                <strong>Logger Error:</strong> <?php echo htmlspecialchars($loggerError); ?>
            </div>
            <?php endif; ?>
            
            <form class="filter-section" method="GET">
                <div class="filter-group">
                    <label for="date-select">Date:</label>
                    <select id="date-select" name="date">
                        <?php if (empty($availableDates)): ?>
                            <option value="<?php echo date('Y-m-d'); ?>">Today (<?php echo date('Y-m-d'); ?>)</option>
                        <?php else: ?>
                            <?php foreach ($availableDates as $date): ?>
                                <option value="<?php echo $date; ?>" <?php echo ($date === $selectedDate) ? 'selected' : ''; ?>>
                                    <?php echo $date; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="type-select">Type:</label>
                    <select id="type-select" name="type">
                        <option value="ALL" <?php echo ($filterType === 'ALL') ? 'selected' : ''; ?>>All Types</option>
                        <option value="AUTH" <?php echo ($filterType === 'AUTH') ? 'selected' : ''; ?>>Authentication</option>
                        <option value="CASE" <?php echo ($filterType === 'CASE') ? 'selected' : ''; ?>>Case Management</option>
                        <option value="USER" <?php echo ($filterType === 'USER') ? 'selected' : ''; ?>>User Management</option>
                        <option value="DATA" <?php echo ($filterType === 'DATA') ? 'selected' : ''; ?>>Data Operations</option>
                        <option value="ERROR" <?php echo ($filterType === 'ERROR') ? 'selected' : ''; ?>>Errors</option>
                        <option value="SYSTEM" <?php echo ($filterType === 'SYSTEM') ? 'selected' : ''; ?>>System Events</option>
                    </select>
                </div>
                
                <button type="submit">Apply Filters</button>
                <button type="button" class="export-btn" onclick="exportLogs()">
                    <i class="fas fa-download"></i> Export
                </button>
                
                <div class="log-type-filters">
                    <a href="?date=<?php echo $selectedDate; ?>&type=ALL" 
                       class="type-pill all <?php echo ($filterType === 'ALL') ? 'active' : ''; ?>">All</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=AUTH" 
                       class="type-pill auth <?php echo ($filterType === 'AUTH') ? 'active' : ''; ?>">Authentication</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=CASE" 
                       class="type-pill case <?php echo ($filterType === 'CASE') ? 'active' : ''; ?>">Cases</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=USER" 
                       class="type-pill user <?php echo ($filterType === 'USER') ? 'active' : ''; ?>">Users</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=DATA" 
                       class="type-pill data <?php echo ($filterType === 'DATA') ? 'active' : ''; ?>">Data</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=ERROR" 
                       class="type-pill error <?php echo ($filterType === 'ERROR') ? 'active' : ''; ?>">Errors</a>
                    <a href="?date=<?php echo $selectedDate; ?>&type=SYSTEM" 
                       class="type-pill system <?php echo ($filterType === 'SYSTEM') ? 'active' : ''; ?>">System</a>
                </div>
            </form>
            
            <?php if (empty($filteredLogs)): ?>
                <div class="empty-logs">
                    <p>No logs found for the selected date and filter.</p>
                </div>
            <?php else: ?>
                <table id="logs-table">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filteredLogs as $log): ?>
                            <?php
                            // Parse log entry to extract timestamp and message
                            preg_match('/^\[(.*?)\] (AUTH|CASE|USER|DATA|ERROR|SYSTEM): (.*)$/', $log, $matches);
                            if (count($matches) >= 4) {
                                $timestamp = $matches[1];
                                $logType = $matches[2];
                                $message = $matches[3];
                                
                                // Extract action, detail, and user where possible
                                $action = '';
                                $detail = '';
                                $user = '';
                                
                                // For authentication logs
                                if ($logType === 'AUTH' && preg_match('/^(login|logout|failed_login) by (.*?) \((.*?)\)/', $message, $authMatches)) {
                                    $action = $authMatches[1];
                                    $user = $authMatches[2];
                                    $detail = $authMatches[3] . (isset($authMatches[4]) ? ' - ' . $authMatches[4] : '');
                                }
                                // For case logs
                                else if ($logType === 'CASE' && preg_match('/^(.*?) on case #(.*?) by (.*)$/', $message, $caseMatches)) {
                                    $action = $caseMatches[1];
                                    $detail = 'Case #' . $caseMatches[2];
                                    $user = $caseMatches[3];
                                }
                                // For user management logs
                                else if ($logType === 'USER' && preg_match('/^(.*?) for (.*?) by (.*)$/', $message, $userMatches)) {
                                    $action = $userMatches[1];
                                    $detail = $userMatches[2];
                                    $user = $userMatches[3];
                                }
                                // For data operation logs
                                else if ($logType === 'DATA' && preg_match('/^(.*?) - (.*?) by (.*)$/', $message, $dataMatches)) {
                                    $action = $dataMatches[1];
                                    $detail = $dataMatches[2];
                                    $user = $dataMatches[3];
                                }
                                // For error logs
                                else if ($logType === 'ERROR' && preg_match('/^(.*?) - (.*)$/', $message, $errorMatches)) {
                                    $action = $errorMatches[1];
                                    $detail = $errorMatches[2];
                                }
                                // For system logs
                                else if ($logType === 'SYSTEM' && preg_match('/^(.*?) - (.*)$/', $message, $sysMatches)) {
                                    $action = $sysMatches[1];
                                    $detail = $sysMatches[2];
                                }
                                // Fallback for other log formats
                                else {
                                    $action = $message;
                                }
                                
                                // Determine log class for styling
                                $logClass = 'log-' . strtolower($logType);
                                $typeClass = strtolower($logType);
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars(date('H:i:s', strtotime($timestamp))); ?></td>
                                <td>
                                    <span class="log-type-badge <?php echo $typeClass; ?>">
                                        <?php echo htmlspecialchars($logType); ?>
                                    </span>
                                </td>
                                <td class="<?php echo $logClass; ?>"><?php echo htmlspecialchars($action); ?></td>
                                <td><?php echo htmlspecialchars($detail); ?></td>
                                <td><?php echo htmlspecialchars($user); ?></td>
                            </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById('current-time').textContent = timeString;
        }

        // Update time every second
        setInterval(updateTime, 1000);
        updateTime(); // Run once on page load

        function redirectToAuthorization(event) {
            event.preventDefault(); 
            window.location.href = "configs/logout.php"; 
        }
        
        // Function to export logs to CSV
        function exportLogs() {
            const table = document.getElementById('logs-table');
            if (!table) return;
            
            const rows = table.querySelectorAll('tr');
            let csv = [];
            
            // Add header row
            const headerRow = table.querySelector('thead tr');
            const headers = headerRow.querySelectorAll('th');
            let headerValues = [];
            headers.forEach(header => {
                headerValues.push('"' + header.textContent.trim() + '"');
            });
            csv.push(headerValues.join(','));
            
            // Add data rows
            const dataRows = table.querySelectorAll('tbody tr');
            dataRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowValues = [];
                cells.forEach(cell => {
                    // Get text content, removing any HTML tags
                    const text = cell.textContent.trim().replace(/"/g, '""');
                    rowValues.push('"' + text + '"');
                });
                csv.push(rowValues.join(','));
            });
            
            // Create CSV file
            const csvContent = csv.join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            
            // Create download link
            const link = document.createElement('a');
            const date = document.getElementById('date-select').value;
            const type = document.getElementById('type-select').value;
            link.href = url;
            link.download = `logs_${date}_${type}.csv`;
            link.style.display = 'none';
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html> 