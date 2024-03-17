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

// IDs of users to retrieve information for
$user_ids = array(1, 2);

// Prepare user IDs for the query
$user_ids_string = implode(', ', $user_ids);

// Query to retrieve user information from the database for specified IDs
$query = "SELECT * FROM userinfo 
          INNER JOIN roles ON userinfo.roleid = roles.roleid 
          INNER JOIN subscription_plans ON userinfo.plan_id = subscription_plans.plan_id 
          WHERE userinfo.roleid IN ($user_ids_string)";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if ($result) {
    // Fetch user information
    $users_info = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users_info[] = $row;
    }
} else {
    // Handle error if query execution fails
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

?>
