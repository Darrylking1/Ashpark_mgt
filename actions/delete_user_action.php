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

// Check if the user ID is provided in the POST request
if (isset($_POST['user_id'])) {
    // Get the user ID from the POST data
    $user_id = $_POST['user_id'];

    // Prepare a DELETE query to remove the user from the database
    $query = "DELETE FROM userinfo WHERE user_id = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (mysqli_stmt_execute($stmt)) {
        // User deleted successfully, redirect back to the page
        header("Location: ../views/user.php");
        exit();
    } else {
        // Error occurred while deleting user
        echo "Error: Unable to delete user.";
    }
} else {
    // User ID not provided in the POST request
    echo "Error: User ID not provided.";
}
?>
