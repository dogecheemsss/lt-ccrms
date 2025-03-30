

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
            font-size: 20px;
        }
        .sidebar h1 {
            text-align: center;
            margin: 20px;
            font-size: 30px;
            font-weight: 900;
            background: linear-gradient(90deg, #fec961, #ff9800);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 50px;
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
        .menu li:hover a, .menu li a.active  {
            background: #ffffff;
            border-radius:4px;
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

            .settings-container {
            margin-top: 20px;
        }
        .settings-section {
            margin-bottom: 30px;
        }
        .settings-section h2 {
            color: #db8505;
            margin-bottom: 10px;
        }
        .settings-option {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }
        .settings-card {
            background: #fdf1e8;
            border: 2px solid #db8505;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            width: 300px;
            transition: all 0.3s ease;
        }
        .settings-card:hover {
            background: #ffe0b3;
            transform: translateY(-5px);
        }
        .settings-card i {
            font-size: 50px;
            color: #db8505;
        }
        .settings-card .text {
            color: #db8505;
            font-size: 30px;
            font-weight: bold;
        }
        .settings-card p {
            font-size: 14px;
            color: #db8505;
        }

        /* ===== Modal Styles ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
}

/* Modal Content */
.popup-content {
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    background: white;
            margin: 12% auto;
            padding: 20px;
            border-radius: 12px;
            width: 60%;
            max-width: 500px;
            position: relative;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
}

/* Close Button */
.close-button {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: #db8505;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    border: 1px solid #db8505;
    padding: 10px;
    text-align: center;
}

th {
    background: #ffcc80;
    font-weight: bold;
}

td {
    background: #fff8f0;
}

/* Edit Button */
.edit-button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #db8505;
}

.edit-button:hover {
    color: #a86402;
}

/* Form Styling */
.form-group {
    margin: 15px 0;
    text-align: left;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #db8505;
}

input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 2px solid #db8505;
    border-radius: 6px;
    font-size: 16px;
}

/* Submit Button */
button[type="submit"] {
    background: #db8505;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

button[type="submit"]:hover {
    background: #a86402;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

        
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>LUPON</h1>
            <ul class="menu">
                <li><a href="index.html"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="cases.html"><i class="fas fa-balance-scale"></i> Cases</a></li>
                <li><a href="reports.html"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li><a href="archive.html"><i class="fas fa-archive"></i> Archive</a></li>
                <li><a href="settings.html" class="active"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </div>
    </div>
    
    <div class="main-content">
        <div class="dashboard-header">
            <span>Settings</span>
            <div class="header-right">
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">LOG OUT <i class="fas fa-sign-out-alt"></i></button>
            </div>

            
        </div>

        <div class="settings-container">
            <div class="settings-section">
                <h2>Data</h2>
                <div class="settings-option">
                    <div class="settings-card">
                        <i class="fas fa-download"></i>
                        <div>
                            <div class="text">Backup Data</div>
                            <p>Saves a backup file</p>
                        </div>
                    </div>
                    <div class="settings-card">
                        <i class="fas fa-sync-alt"></i>
                        <div>
                            <div class="text">Restore Data</div>
                            <p>Restores previously saved</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="settings-section">
                <h2>Account</h2>
                <div class="settings-option">
                <div class="settings-card" onclick="openManageAccountModal()">
                    <i class="fas fa-users"></i>
                    <div>
                        <div class="text">Manage Account</div>
                        <p>Lupon / Official</p>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Manage Account Modal -->
<div id="manageAccountModal" class="modal" style="display: none;">
    <div class="popup-content">
        <span class="close-button" onclick="closeManageAccountModal()">&times;</span>
        <h2>MANAGE ACCOUNT</h2>
        <table>
            <thead>
                <tr>
                    <th>ACTION</th>
                    <th>ROLE</th>
                    <th>ACCESS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <button class="edit-button" onclick="openPasswordModal('Lupon')">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td><strong>LUPON</strong></td>
                    <td><span class="access-role">Viewer</span></td>
                </tr>
                <tr>
                    <td>
                        <button class="edit-button" onclick="openPasswordModal('Official')">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td><strong>OFFICIAL</strong></td>
                    <td><span class="access-role">Editor</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Change Password Modal -->
<div id="passwordModal" class="modal" style="display: none;">
    <div class="popup-content">
        <span class="close-button" onclick="closePasswordModal()">&times;</span>
        <h2>Change Password</h2>
        <form id="changePasswordForm">
            <input type="hidden" id="accountType" name="accountType">
            <div class="form-group">
                <label>Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label>Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Update Password</button>
        </form>
    </div>
</div>

    <script>
        function redirectToAuthorization(event) {
            event.preventDefault(); 
            window.location.href = "authorization.html"; 
        }


    // Open & Close Manage Account Modal
    function openManageAccountModal() {
        document.getElementById("manageAccountModal").style.display = "block";
    }
    function closeManageAccountModal() {
        document.getElementById("manageAccountModal").style.display = "none";
    }

    // Open & Close Password Change Modal
// Open & Close Manage Account Modal
function openManageAccountModal() {
    document.getElementById("manageAccountModal").style.display = "block";
}
function closeManageAccountModal() {
    document.getElementById("manageAccountModal").style.display = "none";
}

// Open Password Change Modal
function openPasswordModal(role) {
    document.getElementById("accountType").value = role;
    document.getElementById("passwordModal").style.display = "block";
    
    // Clear previous inputs
    document.getElementById("current_password").value = "";
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
}

// Close Password Change Modal and Clear Inputs
function closePasswordModal() {
    document.getElementById("passwordModal").style.display = "none";

    // Clear inputs when closing the modal
    document.getElementById("current_password").value = "";
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
}



    </script>
</body>
</html>
