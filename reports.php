<?php
require_once 'configs/auth.php';
checkAuth();
?>
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
=======
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reports</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            .reports-section {
                margin-top: 30px;
                display: flex;
        justify-content: center; /* Centers chart-container horizontally */
        align-items: center; /* Centers vertically (optional) */
        width: 100%;
            }
            .chart-container {
    position: relative; /* Important to make absolute positioning work */
    margin-top: 30px;
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    height: 50vh;
    width: 100%;
    max-width: 1200px;
    display: flex;
    justify-content: center;
    align-items: center;
}
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c

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
        
        /* Table Styles */
        .table-container {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        
        /* Filter Container Styles */
        .filter-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff8eb;
            border-radius: 8px;
        }
        .filter-select, .export-btn, .filter-btn {
            padding: 8px 12px;
            border: 2px solid #db8505;
            border-radius: 6px;
            background-color: white;
            color: #db8505;
            font-weight: bold;
            cursor: pointer;
        }
        .export-btn, .filter-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        .export-btn:hover, .filter-btn:hover {
            background-color: #db8505;
            color: white;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <span>Reports</span>
            <div class="header-right">
                <div id="current-time" class="current-time"></div>
                <button onclick="redirectToAuthorization(event)" class="lupon-btn">
                    <?php echo htmlspecialchars($_SESSION['username']); ?> <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>
        
        <div class="table-container">
            <div class="filter-container" id="filterContainer">
                <label>From:</label>
                <select id="startYear" class="filter-select">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                <select id="startMonth" class="filter-select">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <label>To:</label>
                <select id="endYear" class="filter-select">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>   
                <select id="endMonth" class="filter-select">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <label>Nature:</label>
                <select id="natureFilter" class="filter-select">
                    <option value="">All Cases</option>
                    <option value="Criminal">Criminal</option>
                    <option value="Civil">Civil</option>
                </select>
                <label>
                    <input type="checkbox" id="allYearsCheckbox"> All Years
                </label>

                <button onclick="applyFilter()" class="filter-btn">
                    <i class="fas fa-filter"></i> Filter
                </button>
                
<<<<<<< HEAD
                <button onclick="exportToExcel()" class="export-btn">
                    <i class="fas fa-file-excel"></i> Export to Excel
                </button>
=======
            .export-section {
                padding: 20px;
                display: flex;
                justify-content: flex-end;
            }

            .export-btn {
                background-color: #db8505;
                color: white;
                border: none;
                border-radius: 4px;
                padding: 8px 15px;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                font-size: 14px;
                margin-left: auto; /* This will push the button to the right */
            }

            .export-btn:hover {
                background-color: #b97004;
            }

            .export-btn i {
                font-size: 16px;
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
                    <li><a href="reports.html" class="active"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
                    <li><a href="archive.html"><i class="fas fa-archive"></i> <span>Archive</span></a></li>
                    <li><a href="settings.html" ><i class="fas fa-cog"></i> <span>Settings</span></a></li>
                </ul>
            </div>
        </div>
    
    
        
        <div class="main-content">
            <div class="dashboard-header">
                <span>Reports</span>
                <div class="header-right">
                    <button onclick="redirectToAuthorization(event)"class="lupon-btn">LOG OUT <i class="fas fa-sign-out-alt"></i></button>
                </div>
            </div>
            
            <div class="reports-section">
                <div class="chart-container">
                    <div class="chart-wrapper">
                        <canvas id="caseChart"></canvas>
                        <select class="year-selector" id="yearSelect"></select>
                    </div>
                </div>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Case ID</th>
                        <th>Complainant</th>
                        <th>Respondent</th>
                        <th>Title</th>
                        <th>Nature</th>
                        <th>Date Filed</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically inserted here -->
                </tbody>
            </table>
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

            document.addEventListener("DOMContentLoaded", function () {
                const startYearSelect = document.getElementById("startYear");
                const endYearSelect = document.getElementById("endYear");
                const currentYear = new Date().getFullYear();

                fetch('configs/get_earliest_year.php')
                    .then(response => response.json())
                    .then(data => {
                        const startYear = data.earliest_year;

                        // Remove existing options from both dropdowns before adding new ones
                        startYearSelect.innerHTML = '';
                        endYearSelect.innerHTML = '';

                        // Populate year dropdowns with options (same options for both)
                        for (let year = currentYear; year >= startYear; year--) {
                            const option = new Option(year, year); // Create a single option for both
                            startYearSelect.appendChild(option.cloneNode(true));
                            endYearSelect.appendChild(option.cloneNode(true));
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching earliest year:', error);
                        const fallback = new Option(currentYear, currentYear);
                        startYearSelect.appendChild(fallback.cloneNode(true));
                        endYearSelect.appendChild(fallback.cloneNode(true));
                    });
            });

<<<<<<< HEAD
            // Apply filter based on selected year/month/nature
            function applyFilter() {
                const startYear = document.getElementById('startYear').value;
                const startMonth = document.getElementById('startMonth').value;
                const endYear = document.getElementById('endYear').value;
                const endMonth = document.getElementById('endMonth').value;
                const nature = document.getElementById('natureFilter').value;
                const tbody = document.querySelector('table tbody');
=======
function exportToExcel() {
    const year = document.getElementById('filterYear').value;
    const month = document.getElementById('filterMonth').value;
    window.location.href = `configs/export_excel.php?year=${year}&month=${month}`;
}
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c

                tbody.innerHTML = '';

                fetch(`configs/fetch_filtered_cases.php?startYear=${startYear}&startMonth=${startMonth}&endYear=${endYear}&endMonth=${endMonth}&nature=${nature}`)
                    .then(response => response.json())
                    .then(cases => {
                        if (cases.length === 0) {
                            const row = document.createElement('tr');
                            row.innerHTML = `<td colspan="6" style="text-align:center;">No records found.</td>`;
                            tbody.appendChild(row);
                            return;
                        }

                        cases.forEach(case_ => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${case_.case_no}</td>
                                <td>${case_.complainants || ''}</td>
                                <td>${case_.respondents || ''}</td>
                                <td>${case_.title}</td>
                                <td>${case_.nature}</td>
                                <td>${case_.file_date}</td>
                            `;
                            tbody.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error fetching filtered cases:', error));
            }

            // Export cases to Excel
            function exportToExcel() {
                const startYear = document.getElementById('startYear').value;
                const startMonth = document.getElementById('startMonth').value;
                const endYear = document.getElementById('endYear').value;
                const endMonth = document.getElementById('endMonth').value;
                const nature = document.getElementById('natureFilter').value;

                window.location.href = `configs/export_excel.php?startYear=${startYear}&startMonth=${startMonth}&endYear=${endYear}&endMonth=${endMonth}&nature=${nature}`;
            }

            // Handle All Years checkbox state
            document.getElementById('allYearsCheckbox').addEventListener('change', function() {
                const yearSelects = document.querySelectorAll('#startYear, #endYear');
                const monthSelects = document.querySelectorAll('#startMonth, #endMonth');
                
                if (this.checked) {
                    yearSelects.forEach(select => select.disabled = true);
                    monthSelects.forEach(select => select.disabled = true);
                } else {
                    yearSelects.forEach(select => select.disabled = false);
                    monthSelects.forEach(select => select.disabled = false);
                }
            });
        </script>
    </div>
</body>
</html>