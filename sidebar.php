<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['accountType'])) {
    header("Location: login.php");
    exit;
}
?>

<style>
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
                inset -8px -8px 10px rgba(255, 255, 255, 0.7);
    border-radius: 8px;
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
</style>

<div class="container">
    <div class="sidebar collapsed" id="sidebar">
        <div class="sidebar-header">
            <h1 class="brand-text" id="brandText">
            <?php echo ($_SESSION['accountType'] === 'lupon') ? 'LUPON' : 'OFFICIAL'; ?>
            </h1>
            <img src='img/menu.png' alt="Menu Icon" id="menuIcon" onclick="toggleSidebar()" />
        </div>
        
        <ul class="menu">
            <li><a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="cases.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'cases.php') ? 'class="active"' : ''; ?>><i class="fas fa-balance-scale"></i> <span>Cases</span></a></li>
            <li><a href="reports.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'reports.php') ? 'class="active"' : ''; ?>><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
            <li><a href="archive.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'archive.php') ? 'class="active"' : ''; ?>><i class="fas fa-archive"></i> <span>Archive</span></a></li>
            <li><a href="settings.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'settings.php') ? 'class="active"' : ''; ?>><i class="fas fa-cog"></i> <span>Settings</span></a></li>
            <?php if (isset($_SESSION['accountType']) && $_SESSION['accountType'] === 'lupon'): ?>
            <li><a href="logs.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'logs.php') ? 'class="active"' : ''; ?>><i class="fas fa-clipboard-list"></i> <span>System Logs</span></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<script>
// Sidebar toggle functionality
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
    
    // Save state to localStorage
    const isCollapsed = sidebar.classList.contains("collapsed");
    localStorage.setItem("sidebarCollapsed", isCollapsed);
}

// Load saved state on page load
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.getElementById("sidebar");
    const savedState = localStorage.getItem("sidebarCollapsed");
    
    if (savedState !== null) {
        // Apply saved state
        if (savedState === "true") {
            sidebar.classList.add("collapsed");
        } else {
            sidebar.classList.remove("collapsed");
        }
    }
});
</script> 