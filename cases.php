<?php
require_once 'configs/auth.php';
checkAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            margin-top: 20px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #f6c77f;
            color: #f99858;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
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
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px; 
            transition: all 0.3s ease-in-out;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1),
                        -4px -4px 10px rgba(255, 255, 255, 0.1);
        }

        .lupon-btn i {
            color: #db8505; 
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        .lupon-btn:hover {
            background-color: #db8505;
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.2),
                        -6px -6px 12px rgba(255, 255, 255, 0.1);
        }

        .lupon-btn:hover i {
            color: #ffffff; 
        }

        .lupon-btn:active {
            transform: translateY(1px);
            box-shadow: inset 3px 3px 6px rgba(0, 0, 0, 0.2),
                        inset -3px -3px 6px rgba(255, 255, 255, 0.1);
        }

        .lupon-btn i {
            margin-left: 5px;
        }
         /* Search & Filter Row */
         .search-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 3px solid #f6c77f;
            margin-bottom: 11px;
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

        .filters {
            display: flex;
            gap: 12px;
        }

        .filter-btn, .add-btn {
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

        .filter-btn:hover, .add-btn:hover {
            background: #b25624;
            color: white;
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
#addCaseModal h2 {
    margin-bottom: 20px;
    font-size: 40px;
    color: #a85d2b
}

.modal {
    font-family: 'Arial', sans-serif;
    font-size: 15px;
    color: black;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
    max-height: 80vh; /* Add this to limit height */
    overflow-y: auto; /* Add this to enable vertical scrolling */
    border: 2px solid #c76c2e;
    padding: 20px;
    border-radius: 10px;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    z-index: 1000;
}

.modal button {
   
    margin-top: 30px; /* Adjust the space between the button and the content above */
}

        h2 {
            margin-top: 0;
        }
        .close-button {
            position: sticky;
            top: 10px;
            float: right;
            font-size: 20px;
            cursor: pointer;
            background-color: white;
            z-index: 1001;
        }
                .form-group {
            margin-bottom: 10px;
        }
        .inline {
            display: inline-block;
            width: 23%;
            margin-right: 2%;
        }
        .inline:last-child {
            margin-right: 0;
        }
        textarea, input {
            
            padding: 5px;
            margin-top: 5px;
        }
        .modal input, .modal textarea {
            border: 3px solid #c85c2e;
}

        .case {
            width: 100%;
            height:100px;
            border: 3px solid #c85c2e;

        }
        .radio-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section {
            margin-bottom: 15px;
        }
        button {
            background-color: #c76c2e;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            margin: auto;
        }
        button:hover {
            background-color: #a55a25;
        }
                

        .case-details-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.case-left, .case-center, .case-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
}

textarea, input[type="text"], input[type="date"] {
    width: 100%;
    max-width: 250px;
}
.complainant-fields, .respondent-fields {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    width: 100%;
}

/* Making sure the input fields take appropriate space */
.complainant-fields input, .respondent-fields input {
    padding: 5px;
    border: 3px solid #c85c2e;
    border-radius: 3px;
    width: 150px;
}

/* Remove containers' previous right-alignment */
.add-complainant-container, .add-respondent-container {
    display: flex;
    margin-top: 10px;
    width: 100%;
}

/* Styling for the add buttons */
.add-complainant, .add-respondent {
    background-color: #c85c2e;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    width: 150px;
    text-align: center;
}

input[type="radio"]:checked {
    accent-color: #c85c2e;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    width: 500px;
    max-width: 90%;
    max-height: 80vh; /* Add this to limit height */
    overflow-y: auto; /* Add this to enable vertical scrolling */
}

.popup-content {
    background: white;
    width: 320px;
    padding: 20px;
    text-align: left;
    margin: 0 auto; /* Changed from margin: 15% auto */
    border-radius: 10px;
    box-shadow: 0px 0px 10px #aaa;
    position: relative;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: red;
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

.trash-icon {
    width: 50px;
    height: 50px;
    color: red;
}

.delete-text {
    font-size: 20px;
    font-weight: bold;
    margin: 10px 0;
}

.remove-person {
    background-color: #c85c2e;
    color: white;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    line-height: 20px;
    text-align: center;
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    padding: 0;
    margin-left: 10px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
}

.button-group {
    display: flex;
    justify-content: center;
    gap: 15px;  /* Ensures horizontal spacing */
    margin-top: 15px;
}

.yes-btn {
    background: #a50000;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    flex: 1;
    max-width: 100px;
}

.no-btn {
    background: lightgray;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    flex: 1;
    max-width: 100px;
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
                <li><a href="cases.html" class="active"><i class="fas fa-balance-scale"></i> <span>Cases</span></a></li>
                <li><a href="reports.html"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
                <li><a href="archive.html"><i class="fas fa-archive"></i> <span>Archive</span></a></li>
                <li><a href="settings.html" ><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            </ul>
        </div>
    </div>


    <div class="main-content">

        <div class="dashboard-header">
            <span>Cases</span>
            <div class="header-right">
                
                <button onclick=" redirectToAuthorization(event)" class="lupon-btn">LOG OUT <i class="fas fa-sign-out-alt"></i></button>
            </div>
        </div>
        <div class="search-container">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Case by Case ID">
            </div>
            <div class="filters">
                <select class="filter-btn">
                    <option value="all">ALL CASES</option>
                    <option value="criminal">Criminal Cases</option>
                    <option value="civil">Civil Cases</option>
                </select>
                <button class="add-btn"><i class="fas fa-plus"></i></button>
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
        WHERE c.is_archived = 0
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
                    <td>
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
                        <i class='fas fa-edit'></i>
                        <i class='fas fa-trash-alt delete-btn' data-case-no='{$row['case_no']}'></i>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No cases found</td></tr>";
    }

    $conn->close();
    ?>
</tbody>


            </table>
        </div>
    </div>
       
    <div id="addCaseModal" class="modal">
    <span class="close-button">&times;</span>
    <h2>Add Case</h2>

        <form id="addCaseForm">
            <!-- Complainant -->
            <div class="complainant-container">
                <label>Complainant:</label>
                <div id="complainantFields">
                    <div class="complainant-fields">
                        <input type="text" name="complainant_first_name[]" placeholder="First Name" required>
                        <input type="text" name="complainant_middle_name[]" placeholder="Middle Initial">
                        <input type="text" name="complainant_last_name[]" placeholder="Last Name" required>
                        <input type="text" name="complainant_suffix[]" placeholder="Suffix">
                    </div>
                </div>
                <button type="button" class="add-complainant">+ Add complainant</button>
            </div>

            <!-- Respondent -->
            <div class="respondent-container">
                <label>Respondent:</label>
                <div id="respondentFields">
                    <div class="respondent-fields">
                        <input type="text" name="respondent_first_name[]" placeholder="First Name" required>
                        <input type="text" name="respondent_middle_name[]" placeholder="Middle Initial">
                        <input type="text" name="respondent_last_name[]" placeholder="Last Name" required>
                        <input type="text" name="respondent_suffix[]" placeholder="Suffix">
                    </div>
                </div>
                <button type="button" class="add-respondent">+ Add respondent</button>
            </div>

            <!-- Case Details -->
            <div class="case-details-container">
                <div class="case-left">
                    <h3>Case Details:</h3>
                    <textarea name="title" placeholder="Title" class="case" required></textarea>
                    <label>Nature:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="nature" value="Criminal" required> Criminal</label>
                        <label><input type="radio" name="nature" value="Civil"> Civil</label>
                    </div>
                    <label>Date Filed: <input type="date" name="file_date" required></label>
                </div>

                <div class="case-center">
                    <label>Date of Initial Confrontation: <input type="date" name="confrontation_date"></label>
                    <input type="text" name="action_taken" placeholder="Action Taken">
                    
                    <label>Date of Settlement or Award: 
                        <input type="text" name="settlement_date" class="date-or-text" 
                            placeholder="YYYY-MM-DD or CFA/N/A" 
                            pattern="(\d{4}-\d{2}-\d{2})|(CFA)|(N/A)"
                            title="Enter a date in YYYY-MM-DD format, or CFA, or N/A">
                    </label>
                    
                    <label>Date of Execution: 
                        <input type="text" name="exec_settlement_date" class="date-or-text" 
                            placeholder="YYYY-MM-DD or CFA/N/A" 
                            pattern="(\d{4}-\d{2}-\d{2})|(CFA)|(N/A)"
                            title="Enter a date in YYYY-MM-DD format, or CFA, or N/A">
                    </label>
                </div>

                <div class="case-right">
                    <h3>Main Point of Agreement:</h3>
                    <textarea name="main_agreement" placeholder="Enter details..."></textarea>

                    <h4>Compliance:</h4>
                    <div class="radio-group">
                        <label><input type="radio" name="compliance_status" value="Complete"> Complete</label>
                        <label><input type="radio" name="compliance_status" value="Ongoing"> Ongoing</label>
                    </div>

                    <h4>Remarks:</h4>
                    <div class="radio-group">
                        <label><input type="radio" name="remarks" value="Settled"> Settled</label>
                        <label><input type="radio" name="remarks" value="Issued CFA"> Issued CFA</label>
                    </div>
                </div>
            </div>

            <button type="submit">Add Case</button>
        </form>
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


    <div id="deletePopup" class="popup">
        <div class="popup-content">
            <img src="trash-icon.png" alt="Trash Icon" class="trash-icon">
            <p>Archive this case?</p>
            <div class="button-group">
                <button class="yes-btn" onclick="confirmDelete()">YES</button>
                <button class="no-btn" onclick="closePopup()">NO</button>
            </div>
        </div>
    </div>
    
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("addCaseModal");
    const addBtn = document.querySelector(".add-btn");
    const closeBtn = document.querySelector(".close-button");
    const editIcons = document.querySelectorAll(".fa-edit");
    const modalTitle = modal.querySelector("h2");
    const modalAddButton = modal.querySelector("button[type='submit']");
    const caseDetailsButtons = document.querySelectorAll(".case-details-btn");
    const deleteButtons = document.querySelectorAll(".delete-btn");
    const addComplainantBtn = document.querySelector(".add-complainant");
    const addRespondentBtn = document.querySelector(".add-respondent");
    const searchInput = document.querySelector(".search-bar input");
    const filterSelect = document.querySelector(".filter-btn");

    // Form submission - update to handle both add and edit cases
    document.getElementById("addCaseForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        let formData = new FormData(this);
        const isEditMode = this.getAttribute("data-edit-mode") === "true";
        
        if (isEditMode) {
            const caseNo = this.getAttribute("data-case-no");
            formData.append("case_no", caseNo);
            
            fetch("configs/edit_case.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert("Case updated successfully!");
                    location.reload();
                } else {
                    alert("Error: " + data);
                }
            })
            .catch(error => console.error("Error:", error));
        } else {
            // Existing add case functionality
            fetch("configs/add_case.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert("Case added successfully!");
                    location.reload();
                } else {
                    alert("Error: " + data);
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });

    // Function to handle opening the modal for adding a case
    addBtn.addEventListener("click", function () {
    // Reset form attributes for add mode
    const form = document.getElementById("addCaseForm");
    form.removeAttribute("data-edit-mode");
    form.removeAttribute("data-case-no");
    
    // Change modal title and button text for adding
    const modalTitle = modal.querySelector("h2");
    const modalAddButton = modal.querySelector("button[type='submit']");
    modalTitle.textContent = "Add Case";
    modalAddButton.textContent = "Add Case";
    
    // Clear all fields
    clearModalFields();
    
    // Show the modal
    modal.style.display = "block";
});

    // Add functionality for adding complainants
    addComplainantBtn.addEventListener("click", function() {
        const complainantContainer = document.getElementById("complainantFields");
        const newFields = document.createElement("div");
        newFields.className = "complainant-fields";
        newFields.innerHTML = `
            <input type="text" name="complainant_first_name[]" placeholder="First Name" required>
            <input type="text" name="complainant_middle_name[]" placeholder="Middle Initial">
            <input type="text" name="complainant_last_name[]" placeholder="Last Name" required>
            <input type="text" name="complainant_suffix[]" placeholder="Suffix">
            <button type="button" class="remove-person">×</button>
        `;
        complainantContainer.appendChild(newFields);
        
        // Add event listener to the remove button
        newFields.querySelector(".remove-person").addEventListener("click", function() {
            complainantContainer.removeChild(newFields);
        });
    });
    
    // Add functionality for adding respondents
    addRespondentBtn.addEventListener("click", function() {
        const respondentContainer = document.getElementById("respondentFields");
        const newFields = document.createElement("div");
        newFields.className = "respondent-fields";
        newFields.innerHTML = `
            <input type="text" name="respondent_first_name[]" placeholder="First Name" required>
            <input type="text" name="respondent_middle_name[]" placeholder="Middle Initial">
            <input type="text" name="respondent_last_name[]" placeholder="Last Name" required>
            <input type="text" name="respondent_suffix[]" placeholder="Suffix">
            <button type="button" class="remove-person">×</button>
        `;
        respondentContainer.appendChild(newFields);
        
        // Add event listener to the remove button
        newFields.querySelector(".remove-person").addEventListener("click", function() {
            respondentContainer.removeChild(newFields);
        });
    });

    // Delete case handlers    
    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            const caseNo = this.getAttribute("data-case-no");
            showDeletePopup(caseNo);
        });
    });

    // Case details popup
    caseDetailsButtons.forEach(button => {
        button.addEventListener("click", function () {
            // Retrieve data from `data-*` attributes
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

            // Show the case details modal
            document.getElementById("caseDetailsPopup").style.display = "block";
        });
    });

    // Close case details popup
    document.getElementById("closeCasePopup").addEventListener("click", function () {
        document.getElementById("caseDetailsPopup").style.display = "none";
    });

    // Function to handle opening the modal for editing a case
    editIcons.forEach(icon => {
        icon.addEventListener("click", function (event) {
            const row = event.target.closest("tr");
            const caseNo = row.querySelector("td:first-child").textContent.trim();
            openEditModal(caseNo);
        });
    });

    // Close the modal when the close button is clicked
    closeBtn.addEventListener("click", function () {
        const form = document.getElementById("addCaseForm");
        form.removeAttribute("data-edit-mode");
        form.removeAttribute("data-case-no");
        modal.style.display = "none";
    });

    // Close the modal if the user clicks outside of it
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
        
        if (event.target === document.getElementById("caseDetailsPopup")) {
            document.getElementById("caseDetailsPopup").style.display = "none";
        }
        
        if (event.target === document.getElementById("deletePopup")) {
            closePopup();
        }
    });

    // Add search functionality
    if (searchInput) {
        searchInput.addEventListener("keyup", function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            
            rows.forEach(row => {
                const caseId = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                const visible = caseId.includes(searchValue);
                row.style.display = visible ? "" : "none";
            });
        });
    }
    
    // Add filter functionality
    if (filterSelect) {
        filterSelect.addEventListener("change", function() {
            const filterValue = this.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            
            if (filterValue === "all") {
                rows.forEach(row => row.style.display = "");
                return;
            }
            
            rows.forEach(row => {
                const nature = row.querySelector("td:nth-child(5)").textContent.toLowerCase();
                const visible = nature === filterValue;
                row.style.display = visible ? "" : "none";
            });
        });
    }
});

// Function to handle opening the modal for editing a case
function openEditModal(caseNo) {
    const modal = document.getElementById("addCaseModal");
    const modalTitle = modal.querySelector("h2");
    const modalAddButton = modal.querySelector("button[type='submit']");
    
    // Change modal title and button text for editing
    modalTitle.textContent = "Edit Case";
    modalAddButton.textContent = "Update Case";
    
    // Set form action for edit
    const form = document.getElementById("addCaseForm");
    form.setAttribute("data-edit-mode", "true");
    form.setAttribute("data-case-no", caseNo);
    
    // Fetch case details and populate form
    fetchCaseDetails(caseNo);
    
    // Show the modal
    modal.style.display = "block";
}

// Function to fetch case details for editing
function fetchCaseDetails(caseNo) {
    fetch(`configs/get_case_details.php?case_no=${caseNo}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert("Error: " + data.error);
                return;
            }
            populateEditForm(data);
        })
        .catch(error => {
            console.error("Error fetching case details:", error);
            alert("Failed to load case details. Please try again.");
        });
}

// Function to populate the form with case details for editing
function populateEditForm(data) {
    // Clear existing fields first
    clearModalFields();
    
    // Populate case details
    document.querySelector('textarea[name="title"]').value = data.case.title;
    
    // Set nature radio button
    const natureRadios = document.querySelectorAll('input[name="nature"]');
    natureRadios.forEach(radio => {
        if (radio.value === data.case.nature) {
            radio.checked = true;
        }
    });
    
    // Set dates and other fields
    document.querySelector('input[name="file_date"]').value = data.case.file_date;
    
    if (data.case.confrontation_date) {
        document.querySelector('input[name="confrontation_date"]').value = data.case.confrontation_date;
    }
    
    if (data.case.action_taken) {
        document.querySelector('input[name="action_taken"]').value = data.case.action_taken;
    }
    
    if (data.case.settlement_date) {
        document.querySelector('input[name="settlement_date"]').value = data.case.settlement_date;
    }
    
    if (data.case.exec_settlement_date) {
        document.querySelector('input[name="exec_settlement_date"]').value = data.case.exec_settlement_date;
    }
    
    if (data.case.main_agreement) {
        document.querySelector('textarea[name="main_agreement"]').value = data.case.main_agreement;
    }
    
    // Set compliance radio button
    if (data.case.compliance_status) {
        const complianceRadios = document.querySelectorAll('input[name="compliance_status"]');
        complianceRadios.forEach(radio => {
            if (radio.value === data.case.compliance_status) {
                radio.checked = true;
            }
        });
    }
    
    // Set remarks radio button if available
    if (data.case.remarks) {
        const remarksRadios = document.querySelectorAll('input[name="remarks"]');
        remarksRadios.forEach(radio => {
            if (radio.value === data.case.remarks) {
                radio.checked = true;
            }
        });
    }
    
    // Handle complainants
    const complainantContainer = document.getElementById("complainantFields");
    // Remove the default first row
    while (complainantContainer.firstChild) {
        complainantContainer.removeChild(complainantContainer.firstChild);
    }
    
    // Add each complainant
    data.complainants.forEach((person, index) => {
        const newFields = document.createElement("div");
        newFields.className = "complainant-fields";
        newFields.innerHTML = `
            <input type="text" name="complainant_first_name[]" placeholder="First Name" required value="${person.first_name || ''}">
            <input type="text" name="complainant_middle_name[]" placeholder="Middle Initial" value="${person.middle_name || ''}">
            <input type="text" name="complainant_last_name[]" placeholder="Last Name" required value="${person.last_name || ''}">
            <input type="text" name="complainant_suffix[]" placeholder="Suffix" value="${person.suffix || ''}">
            ${index > 0 ? '<button type="button" class="remove-person">×</button>' : ''}
        `;
        complainantContainer.appendChild(newFields);
        
        // Add event listener to the remove button if it exists
        const removeBtn = newFields.querySelector(".remove-person");
        if (removeBtn) {
            removeBtn.addEventListener("click", function() {
                complainantContainer.removeChild(newFields);
            });
        }
    });
    
    // If no complainants were added (shouldn't happen), add an empty row
    if (complainantContainer.children.length === 0) {
        const newFields = document.createElement("div");
        newFields.className = "complainant-fields";
        newFields.innerHTML = `
            <input type="text" name="complainant_first_name[]" placeholder="First Name" required>
            <input type="text" name="complainant_middle_name[]" placeholder="Middle Initial">
            <input type="text" name="complainant_last_name[]" placeholder="Last Name" required>
            <input type="text" name="complainant_suffix[]" placeholder="Suffix">
        `;
        complainantContainer.appendChild(newFields);
    }
    
    // Handle respondents
    const respondentContainer = document.getElementById("respondentFields");
    // Remove the default first row
    while (respondentContainer.firstChild) {
        respondentContainer.removeChild(respondentContainer.firstChild);
    }
    
    // Add each respondent
    data.respondents.forEach((person, index) => {
        const newFields = document.createElement("div");
        newFields.className = "respondent-fields";
        newFields.innerHTML = `
            <input type="text" name="respondent_first_name[]" placeholder="First Name" required value="${person.first_name || ''}">
            <input type="text" name="respondent_middle_name[]" placeholder="Middle Initial" value="${person.middle_name || ''}">
            <input type="text" name="respondent_last_name[]" placeholder="Last Name" required value="${person.last_name || ''}">
            <input type="text" name="respondent_suffix[]" placeholder="Suffix" value="${person.suffix || ''}">
            ${index > 0 ? '<button type="button" class="remove-person">×</button>' : ''}
        `;
        respondentContainer.appendChild(newFields);
        
        // Add event listener to the remove button if it exists
        const removeBtn = newFields.querySelector(".remove-person");
        if (removeBtn) {
            removeBtn.addEventListener("click", function() {
                respondentContainer.removeChild(newFields);
            });
        }
    });
    
    // If no respondents were added (shouldn't happen), add an empty row
    if (respondentContainer.children.length === 0) {
        const newFields = document.createElement("div");
        newFields.className = "respondent-fields";
        newFields.innerHTML = `
            <input type="text" name="respondent_first_name[]" placeholder="First Name" required>
            <input type="text" name="respondent_middle_name[]" placeholder="Middle Initial">
            <input type="text" name="respondent_last_name[]" placeholder="Last Name" required>
            <input type="text" name="respondent_suffix[]" placeholder="Suffix">
        `;
        respondentContainer.appendChild(newFields);
    }
}

// Helper function to clear modal fields when adding a new case
function clearModalFields() {
    // Clear the form completely
    document.getElementById("addCaseForm").reset();
    
    // Clear complainant fields - completely remove all fields and add a fresh one
    const complainantContainer = document.getElementById("complainantFields");
    while (complainantContainer.firstChild) {
        complainantContainer.removeChild(complainantContainer.firstChild);
    }
    
    // Add a single empty complainant field
    const newComplainantField = document.createElement("div");
    newComplainantField.className = "complainant-fields";
    newComplainantField.innerHTML = `
        <input type="text" name="complainant_first_name[]" placeholder="First Name" required>
        <input type="text" name="complainant_middle_name[]" placeholder="Middle Initial">
        <input type="text" name="complainant_last_name[]" placeholder="Last Name" required>
        <input type="text" name="complainant_suffix[]" placeholder="Suffix">
    `;
    complainantContainer.appendChild(newComplainantField);
    
    // Clear respondent fields - completely remove all fields and add a fresh one
    const respondentContainer = document.getElementById("respondentFields");
    while (respondentContainer.firstChild) {
        respondentContainer.removeChild(respondentContainer.firstChild);
    }
    
    // Add a single empty respondent field
    const newRespondentField = document.createElement("div");
    newRespondentField.className = "respondent-fields";
    newRespondentField.innerHTML = `
        <input type="text" name="respondent_first_name[]" placeholder="First Name" required>
        <input type="text" name="respondent_middle_name[]" placeholder="Middle Initial">
        <input type="text" name="respondent_last_name[]" placeholder="Last Name" required>
        <input type="text" name="respondent_suffix[]" placeholder="Suffix">
    `;
    respondentContainer.appendChild(newRespondentField);
}

// Redirect to authorization page
function redirectToAuthorization(event) {
    event.preventDefault();
    window.location.href = "configs/logout.php";
}

// Show delete confirmation popup
function showDeletePopup(caseNo) {
    const popup = document.getElementById("deletePopup");
    popup.style.display = "block";
    popup.setAttribute("data-case-no", caseNo);
}

// Close popup
function closePopup() {
    document.getElementById("deletePopup").style.display = "none";
}

// Confirm delete/archive action
function confirmDelete() {
    const popup = document.getElementById("deletePopup");
    const caseNo = popup.getAttribute("data-case-no");

    if (!caseNo) {
        alert("Error: No case selected.");
        return;
    }

    fetch("configs/delete_case.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "case_no=" + encodeURIComponent(caseNo),
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {
            document.getElementById("row-" + caseNo).remove(); // Hide row
            closePopup();
        } else {
            alert("Error archiving case.");
        }
    })
    .catch(error => console.error("Error:", error));
}
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }

</script>
</html>
