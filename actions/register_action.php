<?php
// Include the connection file
include_once "../settings/connection.php";

// Include SweetAlert library
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $idNumber = $_POST['idNumber'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $roleId = $_POST['role_type']; // Assuming this is the role ID
    $password = $_POST['password'];
    $planId = $_POST['subscription_plan']; // Assuming this is the plan ID

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if user with the same email already exists
    $checkQuery = "SELECT * FROM userinfo WHERE email = ?";
    $checkStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($checkStmt, $checkQuery)) {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($checkStmt, "s", $email);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        // User already exists, display error message using SweetAlert
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Registration Error',
                    text: 'User already registered!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        header("Location: ../login/register.php?error=user_exists");
        exit();
    }

    // Write your INSERT query
    $insertQuery = "INSERT INTO userinfo (firstname, lastname, ID_number, tel, email, roleid, password, plan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $insertQuery)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $lastName, $idNumber, $phoneNumber, $email, $roleId, $hashedPassword, $planId);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful',
                    text: 'You have successfully registered!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        // Redirect to login page if execution is successful
        header("Location: ../login/login.php");
        exit();
    } else {
        // Redirect back to the registration page with an error message
        header("Location: ../login/register.php?error=registration_failed");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>