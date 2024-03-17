<?php
include_once "../actions/get_all_user_info_action.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
    <link rel="stylesheet" href="../assets/styles/user.css">
    
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
            <div class = "tabular-wrapper">
                <h3 class = "main-title"> Users data</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Users Id</th>
                                <th>Subscription plan</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                <?php foreach ($users_info as $user): ?>
                                    <tr>
                                        <td><?php echo $user['firstname']; ?></td>
                                        <td><?php echo $user['firstname']; ?></td>
                                        <td><?php echo $user['ID_number']; ?></td>
                                        <td><?php echo $user['plan_name']; ?></td>
                                        <td><?php echo $user['role_name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['tel']; ?></td>
                                        <td>
                                            <form action="../actions/delete_user_action.php" method="POST">
                                                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </main>
        <!-- End Main -->
    </div>

    <!-- Custom JS -->
    <script src="assets/scripts/dashboard.js"></script>
</body>
</html>