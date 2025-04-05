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
        .cards {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            background: linear-gradient(145deg, #ffde59, #ff914d);
            padding: 20px;
            flex: 1;
            border-radius: 12px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2), 
                        -4px -4px 10px rgba(0, 0, 0, 0.15);
            font-weight: bold;
            color: rgb(241, 226, 196);
            transition: all 0.3s ease-in-out;
            height: 200px;
            width: 260px;
            font-size: 20px;
            text-shadow: 0 0 15px #ce5804, 
                        0 0 3px #8b4513, 
                        0 0 15px #5a2e0d, 
                        0 0 25px #3e1f07;
        }

        .card-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .card-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .card-text span {
            font-size: 15px;
            display: block;
        }

        .card-text p {
            margin: 0;
            font-size: 25px;
        }

        .card h1 {
            margin: 5px 0 0;
            color:white;
        }

        .card-icon img {
            width: 100px; 
            height: 100px;
            opacity: 0.60;
        }

        .charts {
            display: flex;
            gap: 30px;
            align-items: center;
            justify-content: center; 
            margin-top: 50px;
        }

        .chart-container1, .chart-container2 {
            background: white;
            padding: 50px;
            flex: 1;
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center;
            border-radius: 12px;
            box-shadow: 4px 4px 8px #a25907, -4px -4px 8px #fff;
            text-align: center;
            height: 50vh;
        }


        .chart-container1 h2,
        .chart-container2 h2 {
            text-align: center;
            color: rgb(200, 107, 0);
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.15); 
            border-radius: 8px;
            display: inline-block;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2),
                        -4px -4px 10px rgba(255, 255, 255, 0.1);
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease-in-out;
        }



       
        .container {
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 100vh;
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
                <li><a href="index.html" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="cases.html"><i class="fas fa-balance-scale"></i> <span>Cases</span></a></li>
                <li><a href="reports.html"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
                <li><a href="archive.html"><i class="fas fa-archive"></i> <span>Archive</span></a></li>
                <li><a href="settings.html"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            </ul>
        </div>
    </div>


    <div class="main-content">
        <div class="dashboard-header">
            <span>Dashboard</span>
            <div class="header-right">
                <button onclick="redirectToAuthorization(event)" class="lupon-btn">
                    LOG OUT <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>

        <div class="cards">
            <div class="card card1">
                <div class="card-content">
                    <div class="card-text">
                        <span>Total</span>
                        <p>Cases Filed</p>
                        <h1 id="totalCases">0</h1>
                    </div>
                    <div class="card-icon">
                        <img src="LOGOS/cases.png" alt="Cases Icon">
                    </div>
                </div>
            </div>
        
            <div class="card card2">
                <div class="card-content">
                    <div class="card-text">
                        <span>Total</span>
                        <p>Criminal Cases</p>
                        <h1 id="criminalCases">0</h1>
                    </div>
                    <div class="card-icon">
                        <img src="LOGOS/criminal.png" alt="Criminal Cases Icon">
                    </div>
                </div>
            </div>
        
            <div class="card card3">
                <div class="card-content">
                    <div class="card-text">
                        <span>Total</span>
                        <p>Civil Cases</p>
                        <h1 id="civilCases">0</h1>
                    </div>
                    <div class="card-icon">
                        <img src="LOGOS/civil.png" alt="Civil Cases Icon">
                    </div>
                </div>
            </div>
        
            <div class="card card4">
                <div class="card-content">
                    <div class="card-text">
                        <span class="recent">This Year</span>
                        <p>Month with Highest Cases</p>
                        <h1 id="highestMonth">0</h1>
                    </div>
                    <div class="card-icon">
                        <img src="LOGOS/pending.png" alt="Pending Cases Icon">
                    </div>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="chart-container1">
                <h2>Case Status</h2><br>
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-container2">
                <h2>Yearly Case Filing Statistics</h2><br>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    fetchDashboardData();
});

function fetchDashboardData() {
    fetch('configs/fetch_cases.php')
        .then(response => response.json())
        .then(data => {
            console.log("Fetched Data:", data); // Debugging output

            // Update Dashboard Cards
            document.getElementById("totalCases").textContent = data.total_cases;
            document.getElementById("criminalCases").textContent = data.criminal_cases;
            document.getElementById("civilCases").textContent = data.civil_cases;
            document.getElementById("highestMonth").textContent = data.highest_month;

            // Update Charts
            updatePieChart(data.status_data);
            updateLineChart(data.yearly_cases);
        })
        .catch(error => console.error("Error fetching dashboard data:", error));
}

// Pie Chart Instance
let pieChartInstance;
function updatePieChart(statusData) {
    if (pieChartInstance) {
        pieChartInstance.destroy(); // Destroy previous chart instance
    }
    const pieChartCtx = document.getElementById('pieChart').getContext('2d');
    pieChartInstance = new Chart(pieChartCtx, {
        type: 'pie',
        data: {
            labels: Object.keys(statusData),
            datasets: [{
                data: Object.values(statusData),
                backgroundColor: ['#ff9933', '#EEE1C6']
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 50,
                        usePointStyle: true,
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });
}

// Line Chart Instance
let lineChartInstance;
function updateLineChart(yearlyData) {
    if (lineChartInstance) {
        lineChartInstance.destroy();
    }

    const lineChartCtx = document.getElementById('lineChart').getContext('2d');

    const years = Object.keys(yearlyData).sort(); // Get all years (sorted)
    const caseCounts = years.map(year => yearlyData[year]); // Get case count for each year

    lineChartInstance = new Chart(lineChartCtx, {
        type: 'line',
        data: {
            labels: years, // Use years as x-axis labels
            datasets: [{
                label: 'Cases Filed per Year',
                data: caseCounts,
                borderColor: '#ff6600',
                borderWidth: 2,
                fill: false,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: { stepSize: 1 } // Ensure y-axis increments properly
                }
            },
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
}



// Function to generate random colors for each year
function getRandomColor() {
    return `hsl(${Math.floor(Math.random() * 360)}, 70%, 50%)`;
}


// Logout Function
function redirectToAuthorization(event) {
    event.preventDefault();
    window.location.href = "configs/logout.php";
}

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }
    </script>
</body>
</html>
