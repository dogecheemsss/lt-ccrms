<?php
require_once 'configs/auth.php';
checkAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>
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
.sidebar {
    width: 250px;
    background-color: rgb(255, 255, 255);
    box-shadow: 3px 3px 10px #f5dbcb;
    min-height: 95vh;
    padding: 10px;
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    font-size: 25px;
    transition: width 0.2s ease; 
}
.menu {
    list-style: none;
}
.menu li a {
    text-decoration: none;
    color: rgb(205, 94, 3);
    display: flex;
    width: 100%;
    padding: 20px;
}
/* Only apply hover when sidebar is NOT collapsed */
.sidebar:not(.collapsed) .menu li:hover a,
.sidebar:not(.collapsed) .menu li a.active {
    background: #ffffff;
    border-radius: 4px;
    border-left: 4px solid rgb(106, 70, 3);
    box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.3), 
                inset -8px -8px 10px rgba(255, 255, 255, 0.7);
    transform: scale(1.02); 
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.menu li {
    padding: 10px;
    cursor: pointer;
    display: flex;
}
.menu li i {
    margin-right: 15px;
}

/*added*/
.hamburger {
    cursor: pointer;
    padding: 20px;
    text-align: right;
}

.hamburger img {
    width: 30px;
    height: auto;
    margin: 0px auto;
}


.sidebar.collapsed {
    width: 80px;
    transition: width 0.3s ease;
}

.sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px;
    margin-bottom: 30px;
  }
  
  
  .sidebar-header img {
    width: 30px;
    height: auto;
    cursor: pointer;
  }
  
.sidebar.collapsed .sidebar-header h1 {
    display: none;
  }
  
  .sidebar.collapsed .sidebar-header img {
    content: url('img/logo.png');
    width: 50px;
  }
  

.sidebar.collapsed .menu li a span {
    display: none;
}

.sidebar.collapsed {
    width: 100px;
    transition: width 0.3s ease;
    align-items: center; /* Center children horizontally */
}

.sidebar.collapsed .menu {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;     /* Center vertically */
    height: 100%;                /* Take full height */
    width: 100%;
}

.sidebar.collapsed .menu li a.active {
    background-color: #ffffff; 
    box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.3), 
                inset -8px -8px 10px rgba(255, 255, 255, 0.7);        /* Blue background */
    border-radius: 8px;               /* Optional: make text white */
    display: flex;
    justify-content: center;
    align-items: center;
    border-right: 5px solid rgb(106, 70, 3);
}

.sidebar:not(.collapsed) .menu li a:hover {
    background: #ffffff;
    border-radius: 4px;
    border-left: 4px solid rgb(106, 70, 3);
    box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.3), 
                inset -8px -8px 10px rgba(255, 255, 255, 0.7);
    transform: scale(1.02); 
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.sidebar.collapsed .menu li a:hover {
    background-color: rgba(255, 224, 185, 0.4);
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(255, 170, 70, 0.5);
    color: rgb(205, 94, 3);
    border-right: 5px solid rgb(106, 70, 3);
}

.brand {
    text-align: center;
    margin: 20px 0 50px 0;
    position: relative;
}

.brand-text {
    font-size: 25px;
    font-weight: 900;
    color: #CF8600;
}

.brand-logo {
    width: 50px;
    height: auto;
    display: none;
    margin: 0px auto;
}

/* When sidebar is collapsed */
.sidebar.collapsed .brand-text {
    display: none;
}

.sidebar.collapsed .brand-logo {
    display: block;
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
    transform: translateY(-3px);
}
.container {
        display: flex;
        justify-content: center;
        align-items: center; 
        height: 100vh;
    }
               
        .table-container {
    max-height: 680px; /* Adjust height as needed */
    overflow-y: auto;
    display: block;
    border: 2px solid #f6c77f; /* Optional: Add border for visibility */
    border-radius: 8px; /* Optional: Rounded edges */
    background: white; /* Ensure the table background remains white */
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow */
}

table {
    width: 100%; /* Ensure it takes full width */
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 2px solid #f6c77f;
}

th {
    background-color: #f6c77f;
    color: #683500;
    font-weight: bold;
}

tbody tr:nth-child(odd) {
    background-color: #f9f3eb;
}

tbody tr:hover {
    background-color: #f6eee3;
}


td i {
    color: #a85d2b;
    cursor: pointer;
    margin-right: 10px;
    font-size: 18px;
    transition: color 0.3s ease;
}

td i:hover {
    color: #b25624;
}

/* Action buttons for restore */
.action-icons i {
    color: #db8505;
    cursor: pointer;
    margin-right: 10px;
    font-size: 18px;
    transition: color 0.3s ease;
}

.action-icons i:hover {
    color: #b25624;
}

/* Restore Popup Styling */
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(135deg, #ffffff, #f4f4f4);
    padding: 30px 25px;
    border-radius: 12px;
    text-align: center;
    min-width: 320px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    border: 1px solid #e0e0e0;
    animation: popupFade 0.4s ease-in-out;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.popup h2 {
    font-size: 24px;
    color:rgb(126, 72, 6);
    font-weight: 700;
    margin-bottom: 20px;
    border-bottom: 2px solid #c85c2e;
    padding-bottom: 10px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    text-align: left;
}
/* Restore Icon */
.popup i,
.popup img.restore-icon {
    font-size: 48px;
    color: #2e7d32;
    margin-bottom: 15px;
    width: 48px;
    height: 48px;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    animation: fadeIcon 1.5s ease-in-out;
}

/* Restore Text */
.popup p {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
    line-height: 1.4;
    text-align: center;
}

/* Button Container */
.popup-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
}

/* Yes Button */
.popup .yes-btn {
    background: #2e7d32;
    color: white;
    border: none;
    padding: 10px 24px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease;
}

.popup .yes-btn:hover {
    background-color: #1b5e20;
}

/* No Button */
.popup .no-btn {
    background: #e0e0e0;
    color: #555;
    border: none;
    padding: 10px 24px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.15);
    transition: background-color 0.3s ease;
}

.popup .no-btn:hover {
    background-color: #c2c2c2;
}

.case-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-top: 20px;
    text-align: left;
}

.case-info-grid div {
    background: #ffffff;
    padding: 12px 16px;
    border-radius: 8px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.05);
    font-size: 14px;
    font-weight: 500;
    color: #2e2e2e;
    border-left: 4px solid #c85c2e;
    text-align: left;
}

.case-info-grid div strong {
    color: #c85c2e;
    font-weight: 600;
    margin-right: 5px;
}

@keyframes popupFade {
    from {
        opacity: 0;
        transform: translate(-50%, -55%) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

@keyframes fadeIcon {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Close Button Styling */
.close-button {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 22px;
    font-weight: bold;
    color: #888;
    cursor: pointer;
    transition: color 0.3s ease, transform 0.3s ease;
    z-index: 1001;
}

.close-button:hover {
    color: #c85c2e;
    transform: scale(1.2) rotate(90deg);
}

/* Enhanced Search Container Styles */
.search-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    padding-bottom: 20px;
    border-bottom: 3px solid #f6c77f;
    margin-bottom: 11px;
}

.search-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.search-bar {
    display: flex;
    align-items: center;
    border: 2px solid #d36c2f;
    border-radius: 25px;
    padding: 8px 15px;
    background: white;
    width: 300px;
}

.search-bar i {
    color: #d36c2f;
}

.search-bar input {
    border: none;
    outline: none;
    padding: 5px;
    margin-left: 8px;
    font-size: 14px;
    width: 200px;
}

.filter-controls {
    display: flex;
    gap: 10px;
}

.filter-btn {
    background: #f6eee3;
    color: #683500;
    border: 2px solid #a85d2b;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: background 0.3s ease;
}

.filter-btn:hover {
    background: #b25624;
    color: white;
}

/* Advanced Filters Panel */
.advanced-filters-panel {
    background: #fff8f0;
    border: 2px solid #f6c77f;
    border-radius: 8px;
    padding: 15px;
    margin-top: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.filter-row {
    display: flex;
    gap: 15px;
    margin-bottom: 12px;
}

.filter-group {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.filter-group label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #683500;
    font-size: 14px;
}

.filter-group input, .filter-group select {
    padding: 8px 12px;
    border: 1px solid #d36c2f;
    border-radius: 5px;
    background: white;
    font-size: 14px;
}

.filter-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 10px;
}

.apply-btn {
    background: #3ea842;
    color: white;
    border-color: #2d8331;
}

.reset-btn {
    background: #f5f5f5;
    color: #555;
    border-color: #ccc;
}

.apply-btn:hover {
    background: #2d8331;
}

.reset-btn:hover {
    background: #e0e0e0;
    color: #333;
}

/* Columns Toggle Panel */
.columns-toggle-panel {
    position: absolute;
    right: 20px;
    top: 170px;
    background: white;
    border: 2px solid #f6c77f;
    border-radius: 8px;
    padding: 15px;
    z-index: 10;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 200px;
}

.column-toggle-header {
    font-weight: bold;
    color: #683500;
    margin-bottom: 10px;
    padding-bottom: 8px;
    border-bottom: 1px solid #f6c77f;
}

.column-toggle-options {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.column-toggle-options label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.column-toggle-options input[type="checkbox"] {
    width: 16px;
    height: 16px;
}

.column-toggle-options label:hover {
    color: #d36c2f;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .filter-row {
        flex-direction: column;
        gap: 10px;
    }
    
    .search-controls {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .search-bar {
        width: 100%;
    }
}

    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="dashboard-header">
            <span>Archive</span>
            <div class="header-right">
            <div id="current-time" class="current-time"></div>
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">
                <?php echo htmlspecialchars($_SESSION['username']); ?> <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>
        
        <!-- Add this search container right after the dashboard header in archive.php -->
        <div class="search-container">
            <div class="search-controls">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Search by ID, Name, Title...">
                </div>
                <div class="filter-controls">
                    <button id="show-advanced-filters" class="filter-btn"><i class="fas fa-filter"></i> Advanced Filters</button>
                    <button id="toggle-columns-btn" class="filter-btn"><i class="fas fa-columns"></i> Columns</button>
                </div>
            </div>
            
            <!-- Advanced Filters Panel -->
            <div id="advanced-filters" class="advanced-filters-panel" style="display: none;">
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="filter-case-type">Case Type:</label>
                        <select id="filter-case-type" class="filter-select">
                            <option value="">All Types</option>
                            <option value="Criminal">Criminal</option>
                            <option value="Civil">Civil</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="filter-complainant">Complainant:</label>
                        <input type="text" id="filter-complainant" placeholder="Complainant name">
                    </div>
                    <div class="filter-group">
                        <label for="filter-respondent">Respondent:</label>
                        <input type="text" id="filter-respondent" placeholder="Respondent name">
                    </div>
                </div>
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="filter-date-from">Filed From:</label>
                        <input type="date" id="filter-date-from">
                    </div>
                    <div class="filter-group">
                        <label for="filter-date-to">Filed To:</label>
                        <input type="date" id="filter-date-to">
                    </div>
                </div>
                <div class="filter-actions">
                    <button id="apply-filters" class="filter-btn apply-btn"><i class="fas fa-check"></i> Apply Filters</button>
                    <button id="reset-filters" class="filter-btn reset-btn"><i class="fas fa-undo"></i> Reset</button>
                </div>
            </div>
            
            <!-- Columns Toggle Panel -->
            <div id="columns-toggle-panel" class="columns-toggle-panel" style="display: none;">
                <div class="column-toggle-header">Show/Hide Columns</div>
                <div class="column-toggle-options">
                    <label><input type="checkbox" class="column-toggle" data-column="0" checked> Case ID</label>
                    <label><input type="checkbox" class="column-toggle" data-column="1" checked> Complainant</label>
                    <label><input type="checkbox" class="column-toggle" data-column="2" checked> Respondent</label>
                    <label><input type="checkbox" class="column-toggle" data-column="3" checked> Title</label>
                    <label><input type="checkbox" class="column-toggle" data-column="4" checked> Nature</label>
                    <label><input type="checkbox" class="column-toggle" data-column="5" checked> Date Filed</label>
                    <label><input type="checkbox" class="column-toggle" data-column="6" checked> Action</label>
                </div>
            </div>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Case ID</th>
                        <th>Complainant</th>
                        <th>Respondent</th>
                        <th>Title</th>
                        <th>Nature</th>
                        <th>Date Filed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'configs/config.php';
                
                    $sql = "SELECT 
                        ac.case_no, 
                        GROUP_CONCAT(DISTINCT CONCAT(p1.first_name, ' ', COALESCE(p1.middle_name, ''), ' ', p1.last_name, ' ', COALESCE(p1.suffix, '')) SEPARATOR ' & ') AS complainants,
                        GROUP_CONCAT(DISTINCT CONCAT(p2.first_name, ' ', COALESCE(p2.middle_name, ''), ' ', p2.last_name, ' ', COALESCE(p2.suffix, '')) SEPARATOR ' & ') AS respondents,
                        ac.title, 
                        ac.nature, 
                        ac.file_date, 
                        ac.confrontation_date, 
                        ac.action_taken, 
                        ac.settlement_date, 
                        ac.exec_settlement_date, 
                        ac.main_agreement, 
                        ac.compliance_status, 
                        ac.remarks
                    FROM archived_cases ac
                    LEFT JOIN case_persons cp1 ON ac.case_no = cp1.case_no AND cp1.role = 'Complainant'
                    LEFT JOIN persons p1 ON cp1.person_id = p1.person_id
                    LEFT JOIN case_persons cp2 ON ac.case_no = cp2.case_no AND cp2.role = 'Respondent'
                    LEFT JOIN persons p2 ON cp2.person_id = p2.person_id
                    GROUP BY ac.case_no, ac.title, ac.nature, ac.file_date, ac.confrontation_date, ac.action_taken, 
                            ac.settlement_date, ac.exec_settlement_date, ac.main_agreement, ac.compliance_status, ac.remarks
                    ORDER BY ac.case_no ASC";

                
                    $result = $conn->query($sql);
                
                    if (!$result) {
                        die("<tr><td colspan='7'>SQL Error: " . $conn->error . "</td></tr>");
                    }
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id='row-{$row['case_no']}'>
                                    <td>{$row['case_no']}</td>
                                    <td>" . htmlspecialchars($row['complainants']) . "</td>
                                    <td>" . htmlspecialchars($row['respondents']) . "</td>
                                    <td>" . htmlspecialchars($row['title']) . "</td>
                                    <td>" . htmlspecialchars($row['nature']) . "</td>
                                    <td>" . htmlspecialchars($row['file_date']) . "</td>
                                    <td class='action-icons'>
                                        <i class='fas fa-ellipsis-h case-details-btn' 
                                            data-case-no='" . htmlspecialchars($row['case_no']) . "'
                                            data-complainants='" . htmlspecialchars($row['complainants']) . "'
                                            data-respondents='" . htmlspecialchars($row['respondents']) . "'
                                            data-title='" . htmlspecialchars($row['title']) . "'
                                            data-nature='" . htmlspecialchars($row['nature']) . "'
                                            data-file-date='" . htmlspecialchars($row['file_date']) . "'
                                            data-confrontation-date='" . htmlspecialchars($row['confrontation_date']) . "'
                                            data-action='" . htmlspecialchars($row['action_taken']) . "'
                                            data-settlement-date='" . htmlspecialchars($row['settlement_date']) . "'
                                            data-exec-settlement-date='" . htmlspecialchars($row['exec_settlement_date']) . "'
                                            data-main-agreement='" . htmlspecialchars($row['main_agreement']) . "'
                                            data-compliance='" . htmlspecialchars($row['compliance_status']) . "'
                                            data-remarks='" . htmlspecialchars($row['remarks']) . "'>
                                        </i>
                                        <i class='fas fa-redo-alt restore-btn' data-case-no='{$row['case_no']}'></i>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No archived cases found</td></tr>";
                    }
                
                    $conn->close();
                    ?>
                </tbody>
                
            </table>
        </div>
    </div>

    <div id="caseDetailsPopup" class="popup">
        <div class="popup-content">
            <span class="close-button" id="closeCasePopup">&times;</span>
            <h2>Case Details</h2>
            <div class="case-info-grid">
                <div><strong>Case No.:</strong> <span id="caseNo"></span></div>
                <div><strong>Complainant:</strong> <span id="complainant"></span></div>
                <div><strong>Respondent:</strong> <span id="respondent"></span></div>
                <div><strong>Title:</strong> <span id="title"></span></div>
                <div><strong>Nature:</strong> <span id="nature"></span></div>
                <div><strong>Date Filed:</strong> <span id="dateFiled"></span></div>
                <div><strong>Initial Confrontation:</strong> <span id="initialConfrontation"></span></div>
                <div><strong>Action Taken:</strong> <span id="action"></span></div>
                <div><strong>Settlement Date:</strong> <span id="settlement"></span></div>
                <div><strong>Execution Date:</strong> <span id="execution"></span></div>
                <div><strong>Agreement:</strong> <span id="agreement"></span></div>
                <div><strong>Compliance:</strong> <span id="compliance"></span></div>
                <div><strong>Remarks:</strong> <span id="remarks"></span></div>
            </div>
        </div>
    </div>


    <div class="popup" id="restorePopup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
        <div class="popup-content">
            <img src="LOGOS/restore.png" alt="Restore Icon" class="restore-icon">
            <p>Are you sure you want to restore this case?</p>
            <div class="popup-buttons">
                <button class="yes-btn">YES</button>
                <button class="no-btn">NO</button>
            </div>
        </div>
    </div>
</body>


<script>

function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    document.getElementById('current-time').textContent = timeString;
  }

  // Update time every second
  setInterval(updateTime, 1000);
  updateTime(); // Run once on page load
  
document.addEventListener("DOMContentLoaded", function () {
    const caseDetailsButtons = document.querySelectorAll(".case-details-btn");
    const popup = document.getElementById("caseDetailsPopup");
    const closeButton = document.getElementById("closeCasePopup");
    const restorePopup = document.getElementById("restorePopup");
    const restoreIcons = document.querySelectorAll(".fa-redo-alt");
    const restoreNoButton = restorePopup.querySelector(".no-btn");
    const restoreYesButton = restorePopup.querySelector(".yes-btn");

    let selectedCaseNo = null; // Store selected case_no


    caseDetailsButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Fetch data attributes from the clicked button
            document.getElementById("caseNo").innerText = button.dataset.caseNo;
            document.getElementById("complainant").innerText = button.dataset.complainants;
            document.getElementById("respondent").innerText = button.dataset.respondents;
            document.getElementById("title").innerText = button.dataset.title;
            document.getElementById("nature").innerText = button.dataset.nature;
            document.getElementById("dateFiled").innerText = button.dataset.fileDate;
            document.getElementById("initialConfrontation").innerText = button.dataset.confrontationDate;
            document.getElementById("action").innerText = button.dataset.action;
            document.getElementById("settlement").innerText = button.dataset.settlementDate;
            document.getElementById("execution").innerText = button.dataset.execSettlementDate;
            document.getElementById("agreement").innerText = button.dataset.mainAgreement;
            document.getElementById("compliance").innerText = button.dataset.compliance;
            document.getElementById("remarks").innerText = button.dataset.remarks;

            // Show popup
            popup.style.display = "block";
        });
    });

    // Close popup when clicking the close button
    closeButton.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Close popup when clicking outside the popup
    window.addEventListener("click", function (event) {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
    // Show restore popup when clicking the restore icon
    restoreIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            selectedCaseNo = this.getAttribute("data-case-no"); // Get case_no from button
            restorePopup.style.display = "block";
        });
    });

    // Hide restore popup when clicking the No button
    restoreNoButton.addEventListener("click", function () {
        restorePopup.style.display = "none";
    });

    // Confirm Restore - AJAX Request to restore_case.php
    restoreYesButton.addEventListener("click", function () {
        if (!selectedCaseNo) {
            alert("Error: No case selected.");
            return;
        }

        fetch("configs/restore_case.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "case_no=" + encodeURIComponent(selectedCaseNo),
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                document.getElementById("row-" + selectedCaseNo).remove(); // Remove row from table
                restorePopup.style.display = "none"; // Close popup
            } else {
                alert("Error restoring case.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});

function redirectToAuthorization(event) {
            event.preventDefault(); 
            window.location.href = "configs/logout.php"; 
        }

// Add filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const searchInput = document.getElementById('search-input');
    const showAdvancedFilters = document.getElementById('show-advanced-filters');
    const advancedFilters = document.getElementById('advanced-filters');
    const applyFilters = document.getElementById('apply-filters');
    const resetFilters = document.getElementById('reset-filters');
    const toggleColumnsBtn = document.getElementById('toggle-columns-btn');
    const columnsTogglePanel = document.getElementById('columns-toggle-panel');
    const columnToggles = document.querySelectorAll('.column-toggle');
    const caseTypeFilter = document.getElementById('filter-case-type');
    const complainantFilter = document.getElementById('filter-complainant');
    const respondentFilter = document.getElementById('filter-respondent');
    const dateFromFilter = document.getElementById('filter-date-from');
    const dateToFilter = document.getElementById('filter-date-to');
    const tableRows = document.querySelectorAll('tbody tr');
    
    // Toggle advanced filters panel
    showAdvancedFilters.addEventListener('click', function() {
        advancedFilters.style.display = advancedFilters.style.display === 'none' ? 'block' : 'none';
        columnsTogglePanel.style.display = 'none'; // Hide columns panel when showing filters
    });
    
    // Toggle columns panel
    toggleColumnsBtn.addEventListener('click', function() {
        columnsTogglePanel.style.display = columnsTogglePanel.style.display === 'none' ? 'block' : 'none';
        advancedFilters.style.display = 'none'; // Hide filters panel when showing columns
    });
    
    // Column visibility toggle
    columnToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const columnIndex = this.getAttribute('data-column');
            const isVisible = this.checked;
            
            // Update table cell visibility
            const headerCells = document.querySelectorAll('thead th');
            if (columnIndex < headerCells.length) {
                headerCells[columnIndex].style.display = isVisible ? '' : 'none';
            }
            
            document.querySelectorAll('tbody tr').forEach(row => {
                const cells = row.querySelectorAll('td');
                if (columnIndex < cells.length) {
                    cells[columnIndex].style.display = isVisible ? '' : 'none';
                }
            });
        });
    });
    
    // Search input functionality
    searchInput.addEventListener('keyup', applyAllFilters);
    
    // Apply all filters
    applyFilters.addEventListener('click', applyAllFilters);
    
    // Reset all filters
    resetFilters.addEventListener('click', function() {
        searchInput.value = '';
        caseTypeFilter.value = '';
        complainantFilter.value = '';
        respondentFilter.value = '';
        dateFromFilter.value = '';
        dateToFilter.value = '';
        
        applyAllFilters();
    });
    
    // Function to apply all filters
    function applyAllFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const caseType = caseTypeFilter.value.toLowerCase();
        const complainant = complainantFilter.value.toLowerCase();
        const respondent = respondentFilter.value.toLowerCase();
        const dateFrom = dateFromFilter.value ? new Date(dateFromFilter.value) : null;
        const dateTo = dateToFilter.value ? new Date(dateToFilter.value) : null;
        
        tableRows.forEach(row => {
            const caseId = row.cells[0].textContent.toLowerCase();
            const complainantText = row.cells[1].textContent.toLowerCase();
            const respondentText = row.cells[2].textContent.toLowerCase();
            const title = row.cells[3].textContent.toLowerCase();
            const nature = row.cells[4].textContent.toLowerCase();
            const dateFiledText = row.cells[5].textContent;
            const dateFiled = new Date(dateFiledText);
            
            // Search filter
            const matchesSearch = searchTerm === '' || 
                caseId.includes(searchTerm) || 
                complainantText.includes(searchTerm) || 
                respondentText.includes(searchTerm) || 
                title.includes(searchTerm) ||
                nature.includes(searchTerm);
            
            // Advanced filters
            const matchesCaseType = caseType === '' || nature.includes(caseType);
            const matchesComplainant = complainant === '' || complainantText.includes(complainant);
            const matchesRespondent = respondent === '' || respondentText.includes(respondent);
            const matchesDateFrom = !dateFrom || !isNaN(dateFiled.getTime()) && dateFiled >= dateFrom;
            const matchesDateTo = !dateTo || !isNaN(dateFiled.getTime()) && dateFiled <= dateTo;
            
            // Combined result
            const isVisible = matchesSearch && matchesCaseType && matchesComplainant && 
                matchesRespondent && matchesDateFrom && matchesDateTo;
            
            row.style.display = isVisible ? '' : 'none';
        });
    }
    
    // Close panels when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('#advanced-filters') && 
            !event.target.closest('#show-advanced-filters')) {
            advancedFilters.style.display = 'none';
        }
        
        if (!event.target.closest('#columns-toggle-panel') && 
            !event.target.closest('#toggle-columns-btn')) {
            columnsTogglePanel.style.display = 'none';
        }
    });
});

</script>

</html>