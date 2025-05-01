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

            // Apply filter based on selected year/month/nature
            function applyFilter() {
                const startYear = document.getElementById('startYear').value;
                const startMonth = document.getElementById('startMonth').value;
                const endYear = document.getElementById('endYear').value;
                const endMonth = document.getElementById('endMonth').value;
                const nature = document.getElementById('natureFilter').value;
                const tbody = document.querySelector('table tbody');

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