<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Management Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
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
                    <a href="../login/logout.php">
                        <span class="material-icons-outlined">logout</span> Logout
                    </a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="main-title">
                <h2>Parking Management Dashboard</h2>
            </div>

            <div class="main-cards">
                <div class="card" id="parkingSlotsCard">
                    <div class="card-inner">
                        <h3>Parking Slots</h3>
                        <span class="material-icons-outlined">local_parking</span>
                    </div>
                    <h1>20</h1>
                </div>

                <div class="card" id="totalUsersCard">
                    <div class="card-inner">
                        <h3>Total Users</h3>
                        <span class="material-icons-outlined">person</span>
                    </div>
                    <h1>1000</h1>
                </div>

                <div class="card" id="parkingAvailability">
                    <div class="card-inner">
                        <h3>Parking Availability</h3>
                        <span class="material-icons-outlined">schedule</span>
                    </div>
                    
                </div>
            </div>
        

            <div class="charts">
                <!-- Add charts here if needed -->
            </div>
        </main>
        <!-- End Main -->
    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/scripts/dashboard.js"></script>
    <script src="../assets/scripts/admin.js"></script>
</body>
</html>