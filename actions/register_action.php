<?php
// Include the connection file
include_once "../settings/connection.php";

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

    // Write your INSERT query
    $query = "INSERT INTO userinfo (firstname, lastname, ID_number, tel, email, roleid, password, plan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "ssssssss", $firstName, $lastName, $idNumber, $phoneNumber, $email, $roleId, $hashedPassword, $planId);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page if execution is successful
        header("Location: ../login.html");
        exit();
    } else {
        // Redirect back to the registration page with an error message
        header("Location: register.html?error=registration_failed");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>
