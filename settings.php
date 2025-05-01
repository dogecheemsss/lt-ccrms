<?php
require_once 'configs/auth.php';
<<<<<<< HEAD
require_once 'configs/logger.php';
checkAuth();
?>

=======
checkAuth();
?>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<<<<<<< HEAD
</head>

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
=======
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
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
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
<<<<<<< HEAD
    content: url('img/logo.png');
    width: 50px;
  }
  

.sidebar.collapsed .sidebar-header h1 {
    display: none;
  }
  
  .sidebar.collapsed .sidebar-header img {
    content: url('img/logo.png');
=======
    content: url('../img/logo.png');
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
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
<<<<<<< HEAD
    font-size: 25px;
=======
    font-size: 30px;
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
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

<<<<<<< HEAD

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
.section {
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
    display: none;  /* Ensure it starts hidden */
    position: fixed;
    top: 0; 
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(3px);
 
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

/* Modal Content */
.popup-content {
    background: white;
    padding: 25px;
    border-radius: 15px;
    width: 60%;
    max-width: 500px;
    position: relative;
    text-align: center;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}


/* Close Button */
.close-button {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 22px;
    cursor: pointer;
    color: #db8505;
    transition: 0.2s ease-in-out;
}

.close-button:hover {
    color: #a86402;
    transform: scale(1.2);
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #db8505;
    padding: 12px;
    text-align: center;
}

th {
    background: #ffcc80;
    font-weight: bold;
    text-transform: uppercase;
}

td {
    background: #fff8f0;
}

/* Edit Button */
.edit-button, .deactivate-button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #db8505;
    transition: 0.3s ease-in-out;
}

.edit-button:hover, .deactivate-button:hover {
    color: #a86402;
    transform: scale(1.1);
}

form {
    justify-content: left;
    text-align: left;
    margin: 20px;
}

label {
    color: #4a464179;
    font-weight: bold;
    font-size: 15px;
    margin-bottom: 30px;
}

select {
    margin-bottom: 15px;
}
input {
    margin-bottom: 15px;
}

input[type="password"], input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 2px solid #db8505;
    font-size: 20px;
    color:#a86402;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease-in-out;
}

input[type="password"]:focus, input[type="text"]:focus,
select:focus {
    border-color: #a86402;
    box-shadow: 0px 0px 8px rgba(230, 126, 34, 0.5);
    font-size: 20px;
    color:#a86402;
}

/* Submit Button */
button[type="submit"] {
    background: #db8505;
    color: white;
    padding: 12px 15px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    transition: all 0.3s ease-in-out;
}

button[type="submit"]:hover {
    background: #a86402;
    transform: translateY(-2px);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Animations */
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

/* Responsive */
@media (max-width: 768px) {
    .popup-content {
        width: 80%;
    }
}

@media (max-width: 500px) {
    .popup-content {
        width: 95%;
    }
}



.add-account-btn {
    background-color: #d68d05;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}
.add-account-btn:hover {
    background-color: #b57304;
}

</style>
<body>
    <?php include 'sidebar.php'; ?>
=======
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
        
        /* Modal Styles */
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

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 2px solid #db8505;
            border-radius: 12px;
            width: 80%;
            max-width: 500px;
            position: relative;
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-button {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 28px;
            font-weight: bold;
            color: #db8505;
            cursor: pointer;
        }

        .close-button:hover {
            color: #f99858;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #db8505;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #db8505;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f99858;
            box-shadow: 0 0 5px rgba(219, 133, 5, 0.3);
        }

        .popup-content button {
            background-color: #db8505;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .popup-content button:hover {
            background-color: #f99858;
        }

        .popup-content h2 {
            color: #db8505;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
                <li><a href="archive.html"><i class="fas fa-archive"></i> <span>Archive</span></a></li>
                <li><a href="settings.html" class="active"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            </ul>
        </div>
    </div>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
    
    <div class="main-content">
        <div class="dashboard-header">
            <span>Settings</span>
            <div class="header-right">
<<<<<<< HEAD
            <div id="current-time" class="current-time"></div>
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">
                <?php echo htmlspecialchars($_SESSION['username']); ?> <i class="fas fa-sign-out-alt"></i>
                </button>
=======
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">LOG OUT <i class="fas fa-sign-out-alt"></i></button>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
            </div>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <div class="settings-container">
            <div class="settings-section">
                <h2>Data</h2>
                <div class="settings-option">
                <div class="settings-card" onclick="backupDatabase()">
                    <i class="fas fa-download"></i>
                    <div>
                        <div class="text">Backup Data</div>
                        <p>Click to download the backup</p>
                    </div>
                </div>


                        <form action="configs/backup_restore.php" method="post" enctype="multipart/form-data">
                            <label class="settings-card">
                                <i class="fas fa-sync-alt"></i>
                                <div>
                                    <div class="text">Restore Data</div>
                                    <p>Upload and restore a backup</p>
                                </div>
                                <input type="file" name="backup_file" accept=".sql" style="display: none;" onchange="this.form.submit()">
                            </label>
                        </form>

                  </div>
             </div>
<<<<<<< HEAD


=======
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
            <div class="settings-section">
                <h2>Account</h2>
                <div class="settings-option">
                    <div class="settings-card" onclick="openManageAccountModal()">
                        <i class="fas fa-users"></i>
                        <div>
                            <div class="text">Manage Account</div>
<<<<<<< HEAD
                            <p>Lupon / Official</p>
=======
                            <p>Change Password</p>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Account Modal -->
    <div id="manageAccountModal" class="modal">
        <div class="popup-content">
<<<<<<< HEAD
        <div style="text-align: left; margin-bottom: 10px;">
    <button class="add-account-btn" onclick="openAddAccountModal()">+</button>
</div>

            <span class="close-button" onclick="closeManageAccountModal()">&times;</span>
            <h2 style = "color: rgb(214, 141, 5)">MANAGE ACCOUNT</h2>
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
                            <button class="deactivate-button" onclick="openDeactivateModal('Lupon')">
            <i class="fas fa-user-slash"></i>
        </button>
                        </td>
                        <td><strong>LUPON</strong></td>
                        <td><span class="access-role">Editor</span></td>
                    </tr>
                    <tr>
                        <td>
                            <button class="edit-button" onclick="openPasswordModal('Official')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="deactivate-button" onclick="openDeactivateModal('Official')">
            <i class="fas fa-user-slash"></i>
        </button>
                        </td>
                        <td><strong>OFFICIAL</strong></td>
                        <td><span class="access-role">Viewer</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div id="passwordModal" class="modal">
        <div class="popup-content">
            <span class="close-button" onclick="closePasswordModal()">&times;</span>
            <h2 style = "color: rgb(214, 141, 5)">Change Password</h2>
            <form id="changePasswordForm" onsubmit="updatePassword(event)">
                <label for="accountType">Account Type:</label>
                <select name="accountType" id="accountType" required>
                    <option value="Lupon">Lupon</option>
                    <option value="Official">Official</option>
                </select><br>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br>
                
                <label for="current_password">Current Password:</label>
                <input type="password" name="current_password" id="current_password" required><br>
                
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password" required><br>
                
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required><br>
                
                <button type="submit">Change Password</button>
=======
            <span class="close-button" onclick="closeManageAccountModal()">&times;</span>
            <h2>Change Password</h2>
            <form id="manageAccountForm" action="configs/update_password.php" method="POST">
                <div class="form-group">
                    <label>Current Password:</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label>New Password:</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label>Confirm New Password:</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <button type="submit">Update Password</button>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
            </form>
        </div>
    </div>

<<<<<<< HEAD
<!-- Add Account Modal -->
<div id="addAccountModal" class="modal">
    <div class="popup-content">
        <span class="close-button" onclick="closeAddAccountModal()">&times;</span>
        <h2 style="color: rgb(214, 141, 5)">Add New Account</h2>
        <form action="php/add_account.php" method="POST">
            <label for="new_username">Username:</label>
            <input type="text" name="new_username" required><br>

            <label for="new_email">Email:</label>
            <input type="email" name="new_email" required><br>

            <label for="new_password">Password:</label>
            <input type="password" name="new_password" required><br>

            <label for="accountType">Account Type:</label>
            <select name="accountType" required>
                <option value="Lupon">Lupon</option>
                <option value="Official">Official</option>
            </select><br>

            <button type="submit">Add Account</button>
        </form>
    </div>
</div>


<!-- Deactivate Account Modal -->
<div id="deactivateModal" class="modal">
    <div class="popup-content">
        <span class="close-button" onclick="closeDeactivateModal()">&times;</span>
        <h2 style="color: red;">Deactivate Account</h2>
        <form id="deactivateForm" onsubmit="deactivateAccount(event)">
            <label for="deactivate_username">Username:</label>
            <input type="text" name="deactivate_username" id="deactivate_username" required><br>

            <label for="deactivate_password">Password:</label>
            <input type="password" name="deactivate_password" id="deactivate_password" required><br>

            <button type="submit" style="background-color: red; color: white;">Deactivate</button>
        </form>
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
  
function openDeactivateModal(accountType) {
    document.getElementById("deactivateModal").style.display = "block";
    document.getElementById("deactivateForm").accountType.value = accountType; // Set the account type in form
}

function closeDeactivateModal() {
    document.getElementById('deactivateModal').style.display = 'none';  // Hide the modal
}


function deactivateAccount(event) {
    event.preventDefault();  // Prevent form from submitting normally

    // Get form data
    const username = document.getElementById('deactivate_username').value;
    const password = document.getElementById('deactivate_password').value;

    // Create a FormData object
    const formData = new FormData();
    formData.append('deactivate_username', username);
    formData.append('deactivate_password', password);

    // Send the data to the server using Fetch API
    fetch('php/deactivate_account.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);  // Show success message
            closeDeactivateModal();  // Close the modal
        } else {
            alert(data.message);  // Show error message
        }
    })
    .catch(error => {
        alert('An error occurred: ' + error);  // Show error message
    });
}



function openAddAccountModal() {
    document.getElementById("addAccountModal").style.display = "block";
}

function closeAddAccountModal() {
    document.getElementById("addAccountModal").style.display = "none";
}

            function backupDatabase() {
=======
    <script>
        function backupDatabase() {
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
            window.location.href = "configs/backup_restore.php?backup=true";
        }

        function redirectToAuthorization(event) {
            event.preventDefault(); 
            window.location.href = "configs/logout.php"; 
        }

<<<<<<< HEAD

    
    // Open & Close Manage Account Modal
    function openManageAccountModal() {
        document.getElementById("manageAccountModal").style.display = "flex";
    }
    function closeManageAccountModal() {
        document.getElementById("manageAccountModal").style.display = "none";
    }
    
    // Open & Close Password Change Modal
    function openPasswordModal(role) {
        document.getElementById("accountType").value = role;
        document.getElementById("passwordModal").style.display = "flex";
    }
    function closePasswordModal() {
        document.getElementById("passwordModal").style.display = "none";
        document.getElementById("changePasswordForm").reset();
        document.getElementById("accountType").selectedIndex = 0;
    }
    
    // Handle Password Update Submission
    function updatePassword(event) {
        event.preventDefault();
        let formData = new FormData(document.getElementById("changePasswordForm"));
    
        fetch("php/change_password.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                document.getElementById("changePasswordForm").reset();
            }
            else {
                document.getElementById("changePasswordForm").reset(); 
            }
        })
        .catch(error => console.error("Error:", error));
    }
    </script>
</body>
</html>
=======
        // Manage Account Modal Functions
        function openManageAccountModal() {
            document.getElementById('manageAccountModal').style.display = 'block';
        }

        function closeManageAccountModal() {
            document.getElementById('manageAccountModal').style.display = 'none';
            document.getElementById('manageAccountForm').reset();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('manageAccountModal');
            if (event.target == modal) {
                closeManageAccountModal();
            }
        }

        // Form validation
        document.getElementById('manageAccountForm').addEventListener('submit', function(event) {
            const newPassword = document.querySelector('input[name="new_password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
            
            if (newPassword !== confirmPassword) {
                event.preventDefault();
                alert('New passwords do not match!');
            }
        });
    </script>
</body>
</html>
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
