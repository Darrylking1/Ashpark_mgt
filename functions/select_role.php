<?php
// Include the connection file
include_once 'settings/connection.php';
function getRoleTypes() {
    
    global $conn;

    // Write a select query on the "roles" table
    $query = "SELECT * FROM roles";

    // Execute the query using the connection
    $result = mysqli_query($conn, $query);

    // Check if execution worked
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the results
    $Roletypes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the connection
    mysqli_close($conn);

    // Return the role types array
    return $Roletypes;
}


