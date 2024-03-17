<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Slots Information</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/styles/slots.css">
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
</head>
<body>
    <div class="grid-container">
        
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="icon">
                        <img src="../assets/images/logo.png" alt="logo">
                    </span> 
                </div>
            </div>

            <ul class="sidebar-list">
                <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                    <li class="sidebar-list-item">
                        <a href="../views/slots.php">
                            <span class="material-icons-outlined">local_parking</span> Slots
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="../views/settings.php">
                            <span class="material-icons-outlined">settings</span> Settings
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['role_id'] == 3): ?>
                    <li class="sidebar-list-item">
                        <a href="../views/dashboard.php">
                            <span class="material-icons-outlined">dashboard</span> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="../views/analytics.php">
                            <span class="material-icons-outlined">analytics</span> Analytics
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="../views/user.php">
                            <span class="material-icons-outlined">person</span> Users
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidebar-list-item">
                    <a href="../login/login.php">
                        <span class="material-icons-outlined">logout</span> Logout
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <h1>Parking Slot Information</h1>
            <div class="slots-container">
                <!-- Parking Slot Examples -->
                <div class="slot available" id="PN001"><p>PN001</p><p>Available</p> </div>
                <div class="slot occupied" id="PN002"><p>PN002</p><p>Occupied</p></div>
                <div class="slot available" id="PN003"><p>PN003</p><p>Available</p></div>
                <div class="slot unavailable" id="PN004"><p>PN004</p><p>Unavailable</p></div>
                <div class="slot available" id="PN005"><p>PN005</p><p>Available</p></div>
                <div class="slot available" id="PN006"><p>PN006</p><p>Available</p></div>
                <div class="slot occupied" id="PN007"><p>PN007</p><p>Occupied</p></div>
                <div class="slot unavailable" id="PN008"><p>PN008</p><p>Unavailable</p></div>
                <div class="slot available" id="PN009"><p>PN009</p><p>Available</p></div>
                <div class="slot available" id="PN010"><p>PN010</p><p>Available</p></div>
                <div class="slot occupied" id="PN011"><p>PN011</p><p>Occupied</p></div>
                <div class="slot unavailable" id="PN012"><p>PN012</p><p>Unavailable</p></div>
                <div class="slot available" id="PN013"><p>PN013</p><p>Available</p></div>
                <div class="slot available" id="PN014"><p>PN014</p><p>Available</p></div>
                <div class="slot occupied" id="PN015"><p>PN015</p><p>Occupied</p></div>
                <div class="slot unavailable" id="PN016"><p>PN016</p><p>Unavailable</p></div>
                <div class="slot available" id="PN017"><p>PN017</p><p>Available</p></div>
                <div class="slot available" id="PN018"><p>PN018</p><p>Available</p></div>
                <div class="slot occupied" id="PN019"><p>PN019</p><p>Occupied</p></div>
                <div class="slot unavailable" id="PN020"><p>PN020</p><p>Unavailable</p></div>
            </div>
        </main>
        <!-- End Main -->

    </div>

    <!-- Scripts -->

    <!-- Custom JS -->
    <script src="assets/scripts/dashboard.js"></script>
</body>
</html>