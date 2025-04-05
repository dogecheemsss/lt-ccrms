<?php
require_once 'configs/auth.php';
checkAuth();
?>
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

.year-selector {
    position: absolute;
    top: 10px;
    right: 10px;
    background: white;
    color: #a85d2b;
    font-weight: bold;
    border: 2px solid #a85d2b;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 10; /* Ensures it appears above the chart */
}
                canvas {
        width: 100% !important; /* Force it to take full width */
        height: 100% !important; /* Adjust height dynamically */
    }


            .chart-container h2 {
                margin-bottom: 10px;
                color: #db8505;
                font-size: 20px;
            }
            
            .table-container {
                margin-top: 20px;
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                max-height: calc(100vh - 400px); /* Adjust based on your layout */
                overflow: hidden;
            }

            .filter-container {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                background: #f5dbcb;
                padding: 8px 15px;
                border-radius: 5px;
                width: 100%;
                position: sticky;
                top: 0;
                z-index: 1;
            }

            .filter-select {
                padding: 8px;
                border: 1px solid #db8505;
                border-radius: 4px;
                background: white;
                color: #db8505;
                font-size: 14px;
                outline: none;
            }

            .filter-btn {
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
            }

            .filter-btn:hover {
                background-color: #b97004;
            }

            .filter-btn i {
                font-size: 16px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border: 2px solid #db8505;
                overflow-y: auto;
            }

            thead {
                position: sticky;
                top: 0;
                background: white;
                z-index: 1;
            }

            tbody {
                display: block;
                max-height: calc(100vh - 500px); /* Adjust based on your layout */
                overflow-y: auto;
            }

            thead tr, tbody tr {
                display: table;
                width: 100%;
                table-layout: fixed;
            }

            th, td {
                border: 1px solid #db8505;
                padding: 10px;
                text-align: center;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            th {
                background: white;
                color: #db8505;
                font-weight: bold;
            }

            /* Add custom scrollbar styling */
            tbody::-webkit-scrollbar {
                width: 8px;
            }

            tbody::-webkit-scrollbar-track {
                background: #f5dbcb;
                border-radius: 4px;
            }

            tbody::-webkit-scrollbar-thumb {
                background: #db8505;
                border-radius: 4px;
            }

            tbody::-webkit-scrollbar-thumb:hover {
                background: #b97004;
            }

            .chart-wrapper {
                position: relative; /* Make this the reference for absolute positioning */
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container {
                display: flex;
                justify-content: center;
                align-items: center; 
                height: 100vh;
            }
                
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
            </div>

            <div class="table-container">
                <div class="filter-container">
                    <select id="filterYear" class="filter-select">
                        <option value="">All Years</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                    <select id="filterMonth" class="filter-select">
                        <option value="">All Months</option>
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
                    <button onclick="applyFilter()" class="filter-btn">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <button onclick="exportToExcel()" class="export-btn">
                        <i class="fas fa-file-excel"></i> Export to Excel
                    </button>
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
            
        </div>

        
        <script>

document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('caseChart').getContext('2d');
    let caseChart;

    function updateChart(year) {
        fetch(`configs/fetch_cases.php?year=${year}`)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data for Year:", year, data); // Debugging

                if (!data.monthly_cases || !Array.isArray(data.monthly_cases)) {
                    console.error("Invalid monthly_cases data format.");
                    return;
                }

                if (caseChart) {
                    caseChart.destroy();
                }

                caseChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: `Cases Filed in ${year}`,
                            data: data.monthly_cases,
                            borderColor: '#db8505',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: `Monthly Case Filing Statistics (${year})`,
                                font: {
                                    size: 20,
                                    weight: 'bold'
                                },
                                color: '#db8505',
                                padding: {
                                    top: 10,
                                    bottom: 20
                                }
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error("Error fetching data:", error));
    }

    // Add chart update listener for year selector
    const yearSelect = document.getElementById("yearSelect");
    yearSelect.addEventListener("change", function() {
        updateChart(this.value);
    });
    
    // Make updateChart function globally available
    window.updateChart = updateChart;
});

// Populate year filter with available years
document.addEventListener("DOMContentLoaded", function() {
    const yearSelect = document.getElementById("filterYear");
    const chartYearSelect = document.getElementById("yearSelect");
    const currentYear = new Date().getFullYear();
    
    // Fetch the earliest year from database instead of hardcoding 2022
    fetch('configs/get_earliest_year.php')
        .then(response => response.json())
        .then(data => {
            const startYear = data.earliest_year;
            
            // Add years from current year down to earliest year for report filter
            for (let year = currentYear; year >= startYear; year--) {
                const option = document.createElement("option");
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            }
            
            // Also update the chart year selector
            chartYearSelect.innerHTML = ''; // Clear existing options
            for (let year = currentYear; year >= startYear; year--) {
                const option = document.createElement("option");
                option.value = year;
                option.textContent = year;
                chartYearSelect.appendChild(option);
            }
            
            chartYearSelect.value = currentYear; // Set default selection
            
            // Initialize chart with current year
            if (typeof updateChart === 'function') {
                updateChart(currentYear);
            }
        })
        .catch(error => {
            console.error('Error fetching earliest year:', error);
            // Fallback to showing just the current year if fetch fails
            const option = document.createElement("option");
            option.value = currentYear;
            option.textContent = currentYear;
            yearSelect.appendChild(option);
            
            if (chartYearSelect.options.length === 0) {
                const chartOption = document.createElement("option");
                chartOption.value = currentYear;
                chartOption.textContent = currentYear;
                chartYearSelect.appendChild(chartOption);
            }
        });
});

function applyFilter() {
    const year = document.getElementById('filterYear').value;
    const month = document.getElementById('filterMonth').value;
    const tbody = document.querySelector('table tbody');
    
    // Clear existing rows
    tbody.innerHTML = '';
    
    // Fetch filtered data
    fetch(`configs/fetch_filtered_cases.php?year=${year}&month=${month}`)
        .then(response => response.json())
        .then(cases => {
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

function exportToExcel() {
    const year = document.getElementById('filterYear').value;
    const month = document.getElementById('filterMonth').value;
    window.location.href = `configs/export_excel.php?year=${year}&month=${month}`;
}
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }

        </script>
    </body>
    </html>
