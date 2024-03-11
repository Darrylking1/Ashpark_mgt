<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AshPark Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="row vh-100 g-0">
        <!-- Left Side -->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image: url(assets/images/background-img.jpg);"></div>
        </div>
        <!-- Left Side -->

        <!-- Right Side -->
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <div class="right-container">
                        <!-- Logo -->
                        <a href="#" class="d-flex justify-content-center mb-4">
                            <img src="assets/images/logo.png" alt="" width="60">
                        </a>
                        <!-- Logo -->

                        <div class="text-center mb-5">
                            <h3 class="fw-bold">Register Now</h3>
                            <p class="text-secondary">Create your account</p>
                        </div>

                        <!-- Form -->
                        <form action="#">
                        <form action='./actions/register_action.php' method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-user'></i>
                                </span>
<<<<<<< Updated upstream
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="First Name">
=======
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="First Name" name="firstName">
>>>>>>> Stashed changes
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-user'></i>
                                </span>
<<<<<<< Updated upstream
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="Last Name">
=======
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="Last Name" name="lastName">
>>>>>>> Stashed changes
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-id-card'></i>
                                </span>
<<<<<<< Updated upstream
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="ID Number">
=======
                                <input type="text" class="form-control form-control-lg fs-6" placeholder="ID Number" name="idNumber">
>>>>>>> Stashed changes
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-phone'></i>
                                </span>
                                <input type="tel" class="form-control form-control-lg fs-6" placeholder="Phone Number" name="phoneNumber">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-envelope'></i>
                                </span>
<<<<<<< Updated upstream
                                <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" value="gfgs">
=======
                                <input type="email" class="form-control form-control-lg fs-6" placeholder="Email" name= "email">
>>>>>>> Stashed changes
                            </div>
                            


                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-car'></i>
                                </span>
                                <?php include_once './functions/select_role.php';?>
                                <?php $Roletypes = getRoleTypes();?>
<<<<<<< Updated upstream
                                <select class="form-select form-select-lg fs-6" aria-label="Role type">
=======
                                <select class="form-select form-select-lg fs-6" aria-label="role_type" name="role_type">
>>>>>>> Stashed changes
                                        <?php foreach ($Roletypes as $roles): ?>
                                             <option value="<?php echo $roles['roleid']; ?>"><?php echo $roles['role_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>

<<<<<<< Updated upstream
=======
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-car'></i>
                                </span>
                                <?php include_once './functions/select_plan.php';?>
                                <?php include_once "settings/connection.php";?>
                                <?php $plan = getSubscriptionPlans($conn);?>
                                <select class="form-select form-select-lg fs-6" aria-label="subscription_plan" name="subscription_plan">
                                        <?php foreach ($plan as $plans): ?>
                                             <option value="<?php echo $plans['plan_id']; ?>"><?php echo $plans['plan_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>

>>>>>>> Stashed changes
                            

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-lock-alt'></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" placeholder="Password" name="password">
                            </div>

<<<<<<< Updated upstream
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-car'></i>
                                </span>
                                <?php include_once './functions/select_plan.php';?>
                                <?php $plan = getSubscriptionPlans();?>
                                <select class="form-select form-select-lg fs-6" aria-label="Subscription plan">
                                        <?php foreach ($plan as $plans): ?>
                                             <option value="<?php echo $plans['plan_id']; ?>"><?php echo $plans['plan_name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
=======

>>>>>>> Stashed changes
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bx-lock-alt'></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" placeholder="Retype Password">
                            </div>
                            <button class="btn btn-primary btn-lg w-100">Sign Up</button>
                        </form>
                        <!-- Form -->

                        <div class="text-center mt-4">
                            <small>Already have an account? <a href="login.html" class="fw-bold">Log In</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Side -->
    </div>
    <?php
    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
