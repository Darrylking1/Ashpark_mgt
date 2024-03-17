<?php
// Include the connection file
include_once "../settings/connection.php";

// Handle POST request to update user information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $idNumber = $_POST['idNumber'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $roleId = $_POST['role_type']; // Assuming this is the role ID
    $password = $_POST['password'];
    $planId = $_POST['subscription_plan']; // Assuming this is the plan ID

    // Write your UPDATE query
    $updateQuery = "UPDATE users SET firstName=?, lastName=?, idNumber=?, email=?, roleId=?, password=?, planId=?, phoneNumber=? WHERE id=?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $updateQuery)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "ssssi", $firstName, $lastName, $email, $phoneNumber, $userId);

    if (mysqli_stmt_execute($stmt)) {
        // Return success response
        echo json_encode(array("success" => true, "message" => "User information updated successfully"));
    } else {
        // Return error response
        echo json_encode(array("success" => false, "message" => "Failed to update user information"));
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>