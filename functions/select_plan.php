<?php
// Include the connection file
include_once "settings/connection.php";

function getSubscriptionPlans() {
    global $conn;

    // Write a select query on the "family" table
<<<<<<< Updated upstream
    $query = "SELECT * FROM subscription_plans";

    // Execute the query using the connection
    $result = mysqli_query($conn, $query);

    // Check if execution worked
    if (!$result) {
=======
    $querys = "SELECT * FROM subscription_plans";

    // Execute the query using the connection
    $results = mysqli_query($conn, $querys);

    // Check if execution worked
    if (!$results) {
>>>>>>> Stashed changes
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the results
<<<<<<< Updated upstream
    $plan = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the connection
    mysqli_close($conn);

    // Return the plan array
    return $plan;
}
=======
    $plan = mysqli_fetch_all($results, MYSQLI_ASSOC);

    mysqli_free_result($results);
    // Return the plan array
    return $plan;
}
?>
>>>>>>> Stashed changes


