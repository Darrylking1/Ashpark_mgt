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

// Query to retrieve user information from the database
$query = "SELECT userinfo.*, roles.role_name, subscription_plans.plan_name FROM userinfo 
          INNER JOIN roles ON userinfo.roleid = roles.roleid 
          INNER JOIN subscription_plans ON userinfo.plan_id = subscription_plans.plan_id 
          WHERE userinfo.user_id = '$user_id'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if ($result) {
    // Fetch user information
    $user_info = mysqli_fetch_assoc($result);
} else {
    // Handle error if query execution fails
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>