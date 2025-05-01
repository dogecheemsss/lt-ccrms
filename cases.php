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

<<<<<<< HEAD
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
<<<<<<< HEAD

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
=======
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c

.menu li {
    padding: 10px;
    cursor: pointer;
    display: flex;
}
.menu li i {
    margin-right: 15px;
}

<<<<<<< HEAD
.sidebar.collapsed {
    width: 80px;
    transition: width 0.3s ease;
}

=======
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

>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
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
=======
    content: url('../img/logo.png');
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c
    width: 50px;
  }
  

.sidebar.collapsed .menu li a span {
    display: none;
}
<<<<<<< HEAD
=======

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

>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c

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
         /* Search & Filter Row */
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

        .filter-controls {
            display: flex;
            gap: 10px;
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
    overflow-x: auto; /* Add horizontal scrolling */
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
    padding: 13px;
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
    gap:5px;
    font-size: 15px;
    transition: color 0.3s ease;
    
}

td {
    font-size: 13px;
}
td i:hover {
    color: #b25624;
}
#addCaseModal h2 {
    margin-bottom: 20px;
    font-size: 40px;
    color: #a85d2b;
    font-weight: 600;
    text-align: left;
    letter-spacing: 1px;
}

.modal {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 15px;
    color: #333;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 720px;
    max-height: 80vh;
    overflow-y: auto;
    padding: 35px;
    border-radius: 20px;
    background: linear-gradient(to bottom right, #ffffff, #f7f3f0);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
    border: 2px solid rgba(200, 100, 50, 0.2);
    backdrop-filter: blur(12px);
    z-index: 1000;
    animation: fadeInModal 0.4s ease forwards;
}

@keyframes fadeInModal {
    from {
        opacity: 0;
        transform: translate(-50%, -60%) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

/* Form Group & Inline Fields */
.form-group {
    margin-bottom: 15px;
}

.inline {
    display: inline-block;
    width: 23%;
    margin-right: 2%;
}

.inline:last-child {
    margin-right: 0;
}

/* Inputs & Textareas */
textarea, input {
    padding: 10px;
    margin-top: 6px;
    font-size: 14px;
}

.modal input,
.modal textarea {
    border: 2px solid #d27b4b;
    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
    background-color: #fffaf5;
    transition: all 0.3s ease;
}

.modal input:focus,
.modal textarea:focus {
    border-color: #a85d2b;
    box-shadow: 0 0 10px rgba(200, 100, 50, 0.35);
    outline: none;
}

/* Case Textarea */
.case {
    width: 100%;
    height: 120px;
    border: 2px solid #c85c2e;
    border-radius: 6px;
    resize: vertical;
    background: #fffdfb;
}

/* Radio Group */
.radio-group {
    display: flex;
    align-items: center;
    gap: 12px;
}

input[type="radio"]:checked {
    accent-color: #c85c2e;
}

/* Section Spacing */
.section {
    margin-bottom: 20px;
}

/* Button Styling */
.modal button {
    margin-top: 30px;
    background: linear-gradient(to right, #c85c2e, #a85d2b);
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    font-size: 15px;
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.modal button:hover {
    background: linear-gradient(to right, #a85d2b, #c85c2e);
    transform: scale(1.05);
}

button {
    background-color: #c76c2e;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    display: block;
    margin: auto;
    font-weight: bold;
    border-radius: 6px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #a55a25;
    transform: scale(1.05);
}

.case-details-container {
    display: flex;
    justify-content: space-between;
    gap: 25px;
    margin-top: 20px;
}

.case-left, .case-center, .case-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 12px;
    align-items: center;
    background: #fff8f3;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.case-left:hover,
.case-center:hover,
.case-right:hover {
    transform: translateY(-3px);
}

textarea,
input[type="text"],
input[type="date"] {
    width: 100%;
    max-width: 260px;
    padding: 10px;
    
    border-radius: 6px;
    background-color: #fffaf5;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

textarea:focus,
input[type="text"]:focus,
input[type="date"]:focus {
    border-color: #a85d2b;
    box-shadow: 0 0 10px rgba(200, 100, 50, 0.3);
    outline: none;
}

.complainant-fields,
.respondent-fields {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
    width: 100%;
    justify-content: center;
}

.complainant-fields input,
.respondent-fields input {
    padding: 8px 10px;
    border: 2px solid #c85c2e;
    border-radius: 6px;
    background: #fffefb;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    width: 160px;
}

.complainant-fields input:focus,
.respondent-fields input:focus {
    border-color: #a85d2b;
    box-shadow: 0 0 6px rgba(200, 100, 50, 0.3);
}

.add-complainant-container,
.add-respondent-container {
    display: flex;
    justify-content: center;
    margin-top: 12px;
    width: 100%;
}

.add-respondent {
    margin-bottom: 40px;
}

.add-complainant,
.add-respondent {
    background: linear-gradient(to right, #c85c2e, #a85d2b);
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    width: 200px;
    text-align: center;
    transition: background 0.3s ease, transform 0.2s ease;
}

.add-complainant:hover,
.add-respondent:hover {
    background: linear-gradient(to right, #a85d2b, #c85c2e);
    transform: scale(1.05);
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
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.15);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
    z-index: 9999;
    width: 500px;
    max-width: 90%;
    max-height: 80vh;
    overflow-y: auto;
    animation: popupFadeIn 0.5s ease forwards;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.popup-content {
    padding: 30px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.85);
    box-shadow: inset 0 0 15px rgba(0,0,0,0.05);
    position: relative;
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
}

.popup-content h2 {
    margin-top: 0;
    color: #a85d2b;
    font-size: 2em;
    letter-spacing: 1px;
    text-shadow: 1px 1px 2px rgba(168, 93, 43, 0.3);
}

.popup-content p {
    font-size: 1.1em;
    line-height: 1.8;
    font-weight: 600;
    color: #444;
    margin-bottom: 20px;
}

.popup-content button.close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    font-size: 1.5em;
    cursor: pointer;
    color: #a85d2b;
    transition: all 0.3s ease;
    text-shadow: 0 0 5px rgba(168, 93, 43, 0.5);
}

.popup-content button.close:hover {
    color: #ff8c42;
    transform: scale(1.2);
    text-shadow: 0 0 10px #ff8c42;
}

@keyframes popupFadeIn {
    from {
        opacity: 0;
        transform: translate(-50%, -60%) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}


@keyframes fadeIn {
    from { opacity: 0; transform: translate(-50%, -60%); }
    to { opacity: 1; transform: translate(-50%, -50%); }
}

.case-info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 20px;
    text-align: left;
}

.case-info-grid div {
    background: rgba(255, 255, 255, 0.7);
    border-radius: 12px;
    padding: 12px 16px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.2s ease, box-shadow 0.3s ease;
    font-size: 0.95em;
    line-height: 1.4;
}

.case-info-grid div:hover {
    transform: scale(1.02);
    box-shadow: 0 4px 12px rgba(168, 93, 43, 0.2);
    background: #fff8f5;
}

.case-info-grid strong {
    display: block;
    font-size: 0.85em;
    color: #a85d2b;
    margin-bottom: 4px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.case-info-grid span {
    font-weight: 500;
    color: #333;
}

/* Fancy Close Button */
.close-button {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #a85d2b;
    cursor: pointer;
    background: transparent;
    border: none;
    transition: all 0.3s ease;
}

.close-button:hover {
    color: #ff5c5c;
    transform: rotate(90deg) scale(1.2);
    text-shadow: 0 0 10px rgba(255, 92, 92, 0.5);
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

.filter-controls {
    display: flex;
    gap: 10px;
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
<<<<<<< HEAD
    <?php include 'sidebar.php'; ?>
=======
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
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c


    <div class="main-content">
        <div class="dashboard-header">
            <span>Cases</span>
            <div class="header-right">
            <div id="current-time" class="current-time"></div>
                <button onclick="redirectToAuthorization(event)"class="lupon-btn">
                <?php echo htmlspecialchars($_SESSION['username']); ?> <i class="fas fa-sign-out-alt"></i>
                </button>
            </div>
        </div>
        <div class="search-container">
            <div class="search-controls">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Search by ID, Name, Title...">
                </div>
                <div class="filter-controls">
                    <button id="show-advanced-filters" class="filter-btn"><i class="fas fa-filter"></i> Advanced Filters</button>
                    <button id="toggle-columns-btn" class="filter-btn"><i class="fas fa-columns"></i> Columns</button>
                    <button class="add-btn"><i class="fas fa-plus"></i></button>
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
                    <div class="filter-group">
                        <label for="filter-compliance">Compliance:</label>
                        <select id="filter-compliance" class="filter-select">
                            <option value="">All</option>
                            <option value="Complete">Complete</option>
                            <option value="Ongoing">Ongoing</option>
                        </select>
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
                    <label><input type="checkbox" class="column-toggle" data-column="6" checked> Action Taken</label>
                    <label><input type="checkbox" class="column-toggle" data-column="7" checked> Initial Confrontation</label>
                    <label><input type="checkbox" class="column-toggle" data-column="8" checked> Settlement Date</label>
                    <label><input type="checkbox" class="column-toggle" data-column="9" checked> Execution Date</label>
                    <label><input type="checkbox" class="column-toggle" data-column="10" checked> Agreement</label>
                    <label><input type="checkbox" class="column-toggle" data-column="11" checked> Compliance</label>
                    <label><input type="checkbox" class="column-toggle" data-column="12" checked> Remarks</label>
                    <label><input type="checkbox" class="column-toggle" data-column="13" checked> File</label>
                    <label><input type="checkbox" class="column-toggle" data-column="14" checked> Action</label>
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
                        <th>Action Taken</th>
                        <th>Initial Confrontation</th>
                        <th>Settlement Date</th>
                        <th>Execution Date</th>
                        <th>Agreement</th>
                        <th>Compliance</th>
                        <th>Remarks</th>
                        <th>File</th>
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
            c.remarks,
            c.attached_file
        FROM cases c
        LEFT JOIN case_persons cp1 ON c.case_no = cp1.case_no AND cp1.role = 'Complainant'
        LEFT JOIN persons p1 ON cp1.person_id = p1.person_id
        LEFT JOIN case_persons cp2 ON c.case_no = cp2.case_no AND cp2.role = 'Respondent'
        LEFT JOIN persons p2 ON cp2.person_id = p2.person_id
        WHERE c.is_archived = 0
        GROUP BY c.case_no, c.title, c.nature, c.file_date, c.confrontation_date, c.action_taken, 
                 c.settlement_date, c.exec_settlement_date, c.main_agreement, c.compliance_status, c.remarks, c.attached_file
        ORDER BY c.case_no ASC";

    $result = $conn->query($sql);

    if (!$result) {
        echo "<tr><td colspan='15'>SQL Error: " . $conn->error . "</td></tr>";
    } else if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Prepare attached file display
            $fileDisplay = $row['attached_file'] ? 
                "<a href='./uploads/{$row['attached_file']}' target='_blank'><i class='fas fa-file-alt'></i></a>" : 
                "<i class='fas fa-times text-muted'></i>";
                
            echo "<tr id='row-{$row['case_no']}'>
                    <td>{$row['case_no']}</td>
                    <td>" . htmlspecialchars($row['complainants']) . "</td>
                    <td>" . htmlspecialchars($row['respondents']) . "</td>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>" . htmlspecialchars($row['nature']) . "</td>
                    <td>" . htmlspecialchars($row['file_date']) . "</td>
                    <td>" . htmlspecialchars($row['action_taken']) . "</td>
                    <td>" . htmlspecialchars($row['confrontation_date']) . "</td>
                    <td>" . htmlspecialchars($row['settlement_date']) . "</td>
                    <td>" . htmlspecialchars($row['exec_settlement_date']) . "</td>
                    <td>" . htmlspecialchars($row['main_agreement']) . "</td>
                    <td>" . htmlspecialchars($row['compliance_status']) . "</td>
                    <td>" . htmlspecialchars($row['remarks']) . "</td>
                    <td>" . $fileDisplay . "</td>
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
                            data-remarks='" . htmlspecialchars($row['remarks']) . "'
                            data-attached-file='" . htmlspecialchars($row['attached_file']) . "'>
                        </i>
                           
                        <i class='fas fa-box-archive delete-btn' data-case-no='{$row['case_no']}'></i>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No cases found</td></tr>";
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

        <form id="addCaseForm" method="POST" enctype="multipart/form-data">
            <!-- Complainant -->
            <div class="complainant-container">
                <label> <span style="font-weight:bold;">Complainant:</span></label>
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
                <label><span style="font-weight:bold;">Respondent:</span></label>
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
                    <label <span style = "font-weight:bold">Case Title</span></label>
                    <textarea name="title" placeholder="Title" class="case" required></textarea>
                    <label> <span style="font-weight: bold;">Nature</span></label>
                    <div class="radio-group">
                        <label><input type="radio" name="nature" value="Criminal" required> Criminal</label>
                        <label><input type="radio" name="nature" value="Civil"> Civil</label>
                    </div>
                    <label> <span style="font-weight: bold;">Date Filed</span> <input type="date" name="file_date" required></label>
                </div>

                <div class="case-center">
                <label>
                    <span style="font-weight: bold;">Date of Initial Confrontation</span>
                    <input type="date" name="confrontation_date">
                    </label>
                    <input type="text" name="action_taken" placeholder="Action Taken">
                    
                    <label><span style="font-weight: bold;">Date of Settlement or Award</span> 
                        <input type="text" name="settlement_date" class="date-or-text" 
                            placeholder="YYYY-MM-DD or CFA/N/A" 
                            pattern="(\d{4}-\d{2}-\d{2})|(CFA)|(N/A)"
                            title="Enter a date in YYYY-MM-DD format, or CFA, or N/A">
                    </label>
                    
                    <label><span style="font-weight: bold;">Date of Execution</span>
                        <input type="text" name="exec_settlement_date" class="date-or-text" 
                            placeholder="YYYY-MM-DD or CFA/N/A" 
                            pattern="(\d{4}-\d{2}-\d{2})|(CFA)|(N/A)"
                            title="Enter a date in YYYY-MM-DD format, or CFA, or N/A">
                    </label>
                </div>

                <div class="case-right">
                    <label><span style = "font-weight:bold">Main Point of Agreement</span></label>
                    <textarea name="main_agreement" placeholder="Enter details..."></textarea>

                    <h4>Compliance</h4>
                    <div class="radio-group">
                        <label><input type="radio" name="compliance_status" value="Complete"> Complete</label>
                        <label><input type="radio" name="compliance_status" value="Ongoing"> Ongoing</label>
                    </div>

                    <h4>Remarks</h4>
                    <div class="radio-group">
                        <label><input type="radio" name="remarks" value="Settled"> Settled</label>
                        <label><input type="radio" name="remarks" value="Issued CFA"> Issued CFA </></label>
                    </div>
                </div>
            </div>
            <div class="file-attachment-container">
    <label for="attached-file" style="font-weight: bold;">Attach File</label>
    <input type="file" name="attached_file" id="attached-file" accept=".pdf,.docx,.jpg,.png" />
</div>
            <button type="submit" style = "background-color: green;">ADD CASE</button>
        </form>
    </div>

    
    <div id="caseDetailsPopup" class="popup">
    <div class="popup-content">
        <span class="close-button" id="closeCasePopup">&times;</span>
        <h2>CASE DETAILS</h2>
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
            
            <!-- Add this section for the file attachment -->
            <div><strong>Attached File:</strong> <span id="attachedFile"></span></div>

        </div>
    </div>
</div>



    <div id="deletePopup" class="popup">
        <div class="popup-content">
            <img src="LOGOS/archive.png" alt="Trash Icon" class="trash-icon">
            <p>Archive this case?</p>
            <div class="button-group">
                <button class="yes-btn" onclick="confirmDelete()">YES</button>
                <button class="no-btn" onclick="closePopup()">NO</button>
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
    const modal = document.getElementById("addCaseModal");
    const addBtn = document.querySelector(".add-btn");
    const closeBtn = document.querySelector(".close-button");
    const modalTitle = modal.querySelector("h2");
    const modalAddButton = modal.querySelector("button[type='submit']");
    const caseDetailsButtons = document.querySelectorAll(".case-details-btn");
    const deleteButtons = document.querySelectorAll(".delete-btn");
    const addComplainantBtn = document.querySelector(".add-complainant");
    const addRespondentBtn = document.querySelector(".add-respondent");
    const searchInput = document.querySelector(".search-bar input");
    const filterSelect = document.querySelector(".filter-btn");

    // Form submission - for adding cases
    document.getElementById("addCaseForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        let formData = new FormData(this);
        
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
    });

    // Function to handle opening the modal for adding a case
    addBtn.addEventListener("click", function () {
        // Reset form and set for add mode
        const form = document.getElementById("addCaseForm");
        form.removeAttribute("data-edit-mode");
        form.removeAttribute("data-case-no");
        
        // Change modal title and button text for adding
        modalTitle.textContent = "ADD CASE";
        modalAddButton.textContent = "ADD CASE";
        
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
            const attachedFile = button.dataset.attachedFile;
            const fileDisplay = attachedFile ? `<a href="./uploads/${attachedFile}" target="_blank">${attachedFile}</a>` : "No file attached";
            document.getElementById("attachedFile").innerHTML = fileDisplay;
            // Show the case details modal
            document.getElementById("caseDetailsPopup").style.display = "block";
        });
    });

    // Close case details popup
    document.getElementById("closeCasePopup").addEventListener("click", function () {
        document.getElementById("caseDetailsPopup").style.display = "none";
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
    const filterButton = document.querySelector(".filter-btn");
    const rows = document.querySelectorAll("tbody tr");

    function filterRows(searchValue, selectedFilter) {
        const searchParts = searchValue.toLowerCase().split(" ").filter(part => part !== "");

        rows.forEach(row => {
            const caseId = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
            const complainant = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
            const respondent = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
            const nature = row.querySelector("td:nth-child(5)").textContent.toLowerCase();

            let complainantMatch = searchParts.every(part => complainant.includes(part));
            let respondentMatch = searchParts.every(part => respondent.includes(part));
            let caseIdMatch = searchParts.every(part => caseId.includes(part));

            const searchMatch = searchParts.length === 0 || complainantMatch || respondentMatch || caseIdMatch;
            const filterMatch = selectedFilter === "all" || nature === selectedFilter;

            if (searchMatch && filterMatch) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function applyCurrentFilter() {
        const searchValue = searchInput.value.trim();
        const selectedFilter = filterButton.value.toLowerCase();
        filterRows(searchValue, selectedFilter);
    }

    searchInput.addEventListener("keyup", applyCurrentFilter);
    filterButton.addEventListener("change", applyCurrentFilter);

    // Initial filter run
    applyCurrentFilter();
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
<<<<<<< HEAD

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
    const complianceFilter = document.getElementById('filter-compliance');
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
            const columnIndex = parseInt(this.getAttribute('data-column'));
            const isVisible = this.checked;
            
            // Update table cell visibility for all rows
            // First for the header
            const headerRow = document.querySelector('thead tr');
            if (headerRow && columnIndex < headerRow.cells.length) {
                headerRow.cells[columnIndex].style.display = isVisible ? '' : 'none';
            }
            
            // Then for all data rows
            document.querySelectorAll('tbody tr').forEach(row => {
                if (row.cells && columnIndex < row.cells.length) {
                    row.cells[columnIndex].style.display = isVisible ? '' : 'none';
                }
            });
        });
    });
    
    // Initialize column visibility based on stored preferences (if any)
    function initializeColumnVisibility() {
        // First time - hide some non-essential columns by default
        const nonEssentialColumns = [7, 8, 9, 10, 11, 12, 13]; // Initial Confrontation, Settlement Date, etc.
        
        nonEssentialColumns.forEach(columnIndex => {
            const checkbox = document.querySelector(`.column-toggle[data-column="${columnIndex}"]`);
            if (checkbox) {
                checkbox.checked = false;
                
                // Update table cell visibility
                const headerRow = document.querySelector('thead tr');
                if (headerRow && columnIndex < headerRow.cells.length) {
                    headerRow.cells[columnIndex].style.display = 'none';
                }
                
                document.querySelectorAll('tbody tr').forEach(row => {
                    if (row.cells && columnIndex < row.cells.length) {
                        row.cells[columnIndex].style.display = 'none';
                    }
                });
            }
        });
    }
    
    // Run initialization
    initializeColumnVisibility();
    
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
        complianceFilter.value = '';
        
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
        const compliance = complianceFilter.value.toLowerCase();
        
        tableRows.forEach(row => {
            if (!row.cells || row.cells.length < 13) return; // Skip rows with incomplete data
            
            const caseId = row.cells[0].textContent.toLowerCase();
            const complainantText = row.cells[1].textContent.toLowerCase();
            const respondentText = row.cells[2].textContent.toLowerCase();
            const title = row.cells[3].textContent.toLowerCase();
            const nature = row.cells[4].textContent.toLowerCase();
            const dateFiledText = row.cells[5].textContent;
            const dateFiled = new Date(dateFiledText);
            const actionTaken = row.cells[6].textContent.toLowerCase();
            const confrontationDate = row.cells[7].textContent.toLowerCase();
            const settlementDate = row.cells[8].textContent.toLowerCase();
            const executionDate = row.cells[9].textContent.toLowerCase();
            const agreement = row.cells[10].textContent.toLowerCase();
            const complianceStatus = row.cells[11].textContent.toLowerCase();
            const remarks = row.cells[12].textContent.toLowerCase();
            
            // Search filter - search across all text columns
            const matchesSearch = searchTerm === '' || 
                caseId.includes(searchTerm) || 
                complainantText.includes(searchTerm) || 
                respondentText.includes(searchTerm) || 
                title.includes(searchTerm) ||
                nature.includes(searchTerm) ||
                actionTaken.includes(searchTerm) ||
                confrontationDate.includes(searchTerm) ||
                settlementDate.includes(searchTerm) ||
                executionDate.includes(searchTerm) ||
                agreement.includes(searchTerm) ||
                complianceStatus.includes(searchTerm) ||
                remarks.includes(searchTerm);
            
            // Advanced filters
            const matchesCaseType = caseType === '' || nature.includes(caseType);
            const matchesComplainant = complainant === '' || complainantText.includes(complainant);
            const matchesRespondent = respondent === '' || respondentText.includes(respondent);
            const matchesDateFrom = !dateFrom || !isNaN(dateFiled.getTime()) && dateFiled >= dateFrom;
            const matchesDateTo = !dateTo || !isNaN(dateFiled.getTime()) && dateFiled <= dateTo;
            const matchesCompliance = compliance === '' || complianceStatus.includes(compliance);
            
            // Combined result
            const isVisible = matchesSearch && matchesCaseType && matchesComplainant && 
                matchesRespondent && matchesDateFrom && matchesDateTo && matchesCompliance;
            
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
=======
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("collapsed");
  }
>>>>>>> 370b32492e9c2486c6c0a7c1eea45a51fea9a47c

</script>

</html>
