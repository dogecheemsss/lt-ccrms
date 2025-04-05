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
    content: url('../img/logo.png');
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
    font-size: 30px;
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
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    min-width: 250px;
    box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.3); /* Shadow effect */
}

/* Restore Icon */
.popup i {
    font-size: 50px;
    color: #00C853; /* Green color */
    margin-bottom: 10px;
}

/* Restore Text */
.popup p {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: black;
}

/* Button Container */
.popup-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

/* Yes Button */
.popup .yes-btn {
    background-color: #00C853;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

/* No Button */
.popup .no-btn {
    background-color: #E0E0E0;
    color: #757575;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

/* Hover Effects */
.popup .yes-btn:hover {
    background-color: #009624;
}

.popup .no-btn:hover {
    background-color: #BDBDBD;
}

.case-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 10px;
}

.case-info-grid div {
    background: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar collapsed" id="sidebar">
          <div class="sidebar-header">
            <h1 class="brand-text" id="brandText">LUPON</h1>
            <img src='img/menu.png' alt="Menu Icon" id="menuIcon" onclick="toggleSidebar()" />
          </div>
      
            
    
            <ul class="menu">
                <li><a href="index.html"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="cases.html"><i class="fas fa-balance-scale"></i> <span>Cases</span></a></li>
                <li><a href="reports.html"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
                <li><a href="archive.html" class="active"><i class="fas fa-archive"></i> <span>Archive</span></a></li>
                <li><a href="settings.html" ><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            </ul>
        </div>
    </div>


    <div class="main-content">
        <div class="dashboard-header">
            <span>Archive</span>
            <div class="header-right">
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">LOG OUT <i class="fas fa-sign-out-alt"></i></button>
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
                        c.case_no, 
                        GROUP_CONCAT(DISTINCT CONCAT(p1.first_name, ' ', COALESCE(p1.middle_name, ''), ' ', p1.last_name, ' ', COALESCE(p1.suffix, '')) SEPARATOR ' & ') AS complainants,
                        GROUP_CONCAT(DISTINCT CONCAT(p2.first_name, ' ', COALESCE(p2.middle_name, ''), ' ', p2.last_name, ' ', COALESCE(p2.suffix, '')) SEPARATOR ' & ') AS respondents,
                        c.title, 
                        c.nature, 
                        c.file_date, 
                        c.confrontation_date, 
                        c.action_taken, 
                        c.settlement_date, 
                        c.exec_settlement_date, 
                        c.main_agreement, 
                        c.compliance_status, 
                        c.remarks
                    FROM cases c
                    LEFT JOIN case_persons cp1 ON c.case_no = cp1.case_no AND cp1.role = 'Complainant'
                    LEFT JOIN persons p1 ON cp1.person_id = p1.person_id
                    LEFT JOIN case_persons cp2 ON c.case_no = cp2.case_no AND cp2.role = 'Respondent'
                    LEFT JOIN persons p2 ON cp2.person_id = p2.person_id
                    WHERE c.is_archived = 1
                    GROUP BY c.case_no, c.title, c.nature, c.file_date, c.confrontation_date, c.action_taken, 
                            c.settlement_date, c.exec_settlement_date, c.main_agreement, c.compliance_status, c.remarks
                    ORDER BY c.case_no ASC";

                
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
            <img src="restore-icon.png" alt="Restore Icon" class="restore-icon">
            <p>Are you sure you want to restore this case?</p>
            <div class="popup-buttons">
                <button class="yes-btn">YES</button>
                <button class="no-btn">NO</button>
            </div>
        </div>
    </div>
</body>


<script>
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

// Function to redirect to authorization page
function redirectToAuthorization(event) {
    event.preventDefault();
    window.location.href = "configs/logout.php";
}
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }

</script>

</html>