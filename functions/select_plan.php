<?php
// Include the connection file
include_once "settings/connection.php";

function getSubscriptionPlans() {
    global $conn;

    // Write a select query on the "family" table
    $query = "SELECT * FROM subscription_plans";

    // Execute the query using the connection
    $result = mysqli_query($conn, $query);

    // Check if execution worked
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the results
    $plan = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the connection
    mysqli_close($conn);

    // Return the plan array
    return $plan;
}


