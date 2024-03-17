<?php
    include_once "../actions/get_user_info_action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/styles/settings.css">
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
        <main>
            <div class="settings-container">
                <h1>Settings</h1>
                <!-- Form -->
                <form action="../actions/update_user_info_action.php" method="POST" id="settings-form">
                    <div class="input-group mb-3">
                        <label for="firstName">First Name</label>
                        <span class="input-group-text">
                            <i class='bx bx-user'></i>
                        </span>
                        <input type="text" class="form-control form-control-lg fs-6" placeholder="First Name" name="firstName" id="firstName" value="<?php echo $user_info['firstname']; ?>" readonly>
                        <div id="firstName-error" class="text-danger"></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="lastName">Last Name</label>
                        <span class="input-group-text">
                            <i class='bx bx-user'></i>
                        </span>
                        <input type="text" class="form-control form-control-lg fs-6" placeholder="Last Name" name="lastName" id="lastName" value="<?php echo $user_info['lastname']; ?>" readonly>
                        <div id="lastName-error" class="text-danger"></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="idNumber">ID Number</label>
                        <span class="input-group-text">
                            <i class='bx bx-id-card'></i>
                        </span>
                        <input type="text" class="form-control form-control-lg fs-6" placeholder="ID Number" name="idNumber" id="idNumber" value="<?php echo $user_info['ID_number']; ?>" readonly>
                        <div id="idNumber-error" class="text-danger"></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="phoneNumber">Phone Number</label>
                        <span class="input-group-text">
                            <i class='bx bx-phone'></i>
                        </span>
                        <input type="tel" class="form-control form-control-lg fs-6" placeholder="Phone Number" name="phoneNumber" id="phoneNumber" value="<?php echo $user_info['tel']; ?>" readonly>
                        <div id="phoneNumber-error" class="text-danger"></div>
                        <button type="button" onclick="editField('phoneNumber')">Edit</button>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email">Email</label>
                        <span class="input-group-text">
                            <i class='bx bx-envelope'></i>
                        </span>
                        <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" name="email" id="email" value="<?php echo $user_info['email']; ?>" readonly>
                        <div id="email-error" class="text-danger"></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="role_type">Role</label>
                        <span class="input-group-text">
                            <i class='bx bx-car'></i>
                        </span>
                        <input type="text" class="form-control form-control-lg fs-6" aria-label="role_type" name="role_type" value="<?php echo $user_info['role_name']; ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <label for="subscription_plan">Subscription Plan</label>
                        <span class="input-group-text">
                            <i class='bx bx-car'></i>
                        </span>
                        <input type="text" class="form-control form-control-lg fs-6" aria-label="subscription_plan" name="subscription_plan" value="<?php echo $user_info['plan_name']; ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password">Change Password</label>
                        <span class="input-group-text">
                            <i class='bx bx-lock-alt'></i>
                        </span>
                        <input type="password" class="form-control form-control-lg fs-6" placeholder="New Password" name="password" id="password">
                        <div id="password-error" class="text-danger"></div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="retypePassword">Retype Password</label>
                        <span class="input-group-text">
                            <i class='bx bx-lock-alt'></i>
                        </span>
                        <input type="password" class="form-control form-control-lg fs-6" placeholder="Retype Password" name="retypePassword" id="retypePassword">
                        <div id="retypePassword-error" class="text-danger"></div>
                    </div>
                    <button class="btn btn-primary btn-lg w-100">Save Changes</button>
                </form>
                <!-- Form -->
                <div id="message" class="message"></div>
            </div>
        </main>
        <!-- End Main -->
    </div>

    <!-- Custom JS -->
    <script src="../assets/scripts/settings.js"></script>

</body>
</html>