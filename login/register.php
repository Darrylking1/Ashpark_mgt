<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AshPark Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../assets/scripts/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="row vh-100 g-0">
        <!-- Left Side -->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image: url(../assets/images/background-img.jpg);"></div>
        </div>
        <!-- Left Side -->

        <!-- Right Side -->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <div class="right-container">
                        <!-- Logo -->
                        <a href="#" class="d-flex justify-content-center mb-4">
                            <img src="../assets/images/logo.png" alt="" width="60">
                        </a>
                        <!-- Logo -->

                        <div class="text-center mb-5">
                            <h3 class="fw-bold">Register Now</h3>
                            <p class="text-secondary">Create your account</p>
                        </div>

                        <!-- Form -->
                        <form action='../actions/register_action.php' method="POST" name="registrationForm" onsubmit="return validateForm()">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-user'></i>
                                </span>
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="First Name" name="firstName" id="firstName" required>
                                <div id="firstName-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-user'></i>
                                </span>
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="Last Name" name="lastName" id="lastName" required>
                                <div id="lastName-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="ID Number" name="idNumber" id="idNumber" required>
                                <div id="idNumber-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-phone'></i>
                                </span>
                                <input type="tel" class="form-control form-control-lg fs-6" placeholder="Phone Number" name="phoneNumber" id="phoneNumber" required>
                                <div id="phoneNumber-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-envelope'></i>
                                </span>
                                <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" name="email" id="email" required>
                                <div id="email-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-car'></i>
                                </span>
                                <?php include_once '../functions/select_role.php';?>
                                <?php $Roletypes = getRoleTypes();?>
                                <select class="form-select form-select-lg fs-6" aria-label="role_type" name="role_type">
                                        <?php foreach ($Roletypes as $roles): ?>
                                             <option value="<?php echo $roles['roleid']; ?>"><?php echo $roles['role_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-car'></i>
                                </span>
                                <?php include_once '../functions/select_plan.php';?>
                                <?php $plan = getSubscriptionPlans();?>
                                <select class="form-select form-select-lg fs-6" aria-label="subscription_plan" name="subscription_plan">
                                        <?php foreach ($plan as $plans): ?>
                                             <option value="<?php echo $plans['plan_id']; ?>"><?php echo $plans['plan_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-lock-alt'></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" placeholder="Password" name="password" id="password" required>
                                <div id="password-error" class="text-danger"></div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-lock-alt'></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" placeholder="Retype Password" name="retypePassword" id="retypePassword" required>
                                <div id="retypePassword-error" class="text-danger"></div>
                            </div>
                            <button class="btn btn-primary btn-lg w-100">Sign Up</button>
                        </form>
                        <!-- Form -->

                        <div class="text-center mt-4">
                            <small>Already have an account? <a href="login.php" class="fw-bold">Log In</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Side -->
    </div>
</body>
</html>