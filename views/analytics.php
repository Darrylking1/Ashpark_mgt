<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Management Analytics Page</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
    <link rel="stylesheet" href="../assets/styles/analytics.css">
    
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
        <main>
            <div class="charts">
                <div class="chart">
                    <h2>Peak Parking Periods</h2>
                    <canvas id="lineChart" width="600" height="200"></canvas>
                </div>
            </div>
            
        </main>
        <!-- End Main -->
    </div>

    <!-- Custom JS -->
    <script src="../assets/scripts/dashboard.js"></script>
    <script src="../assets/scripts/analytics.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</body>
</html>