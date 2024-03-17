<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if not logged in
    header("Location: ../login/login.html");
    exit();
}

// Include database connection file
include_once '../settings/connection.php';

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve form data
$phoneNumber = $_POST['phoneNumber'];
$newPassword = $_POST['password'];
$retypePassword = $_POST['retypePassword'];

// Check if a new password is provided
if (!empty($newPassword)) {
    // Check if the new password matches the retype password
    if ($newPassword !== $retypePassword) {
        // Redirect the user to the settings page with an error message
        header("Location: ../views/settings.php?error=password_mismatch");
        exit();
    }

    // Hash the new password before storing it in the database (for security)
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update user's password in the database
    $query = "UPDATE userinfo SET password='$hashedPassword' WHERE user_id='$user_id'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if (!$result) {
        // Redirect the user to the settings page with an error message
        header("Location: ../views/settings.php?error=database_error");
        exit();
    }
}

// Update user's phone number in the database
$query = "UPDATE userinfo SET tel='$phoneNumber' WHERE user_id='$user_id'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if ($result) {
    // Redirect the user to the settings page with a success message
    header("Location: ../views/settings.php?success=1");
} else {
    // Redirect the user to the settings page with an error message
    header("Location: ../views/settings.php?error=database_error");
}

// Close database connection
mysqli_close($conn);
?>
