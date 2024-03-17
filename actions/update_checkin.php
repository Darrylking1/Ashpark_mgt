<?php
// Start or resume the session
session_start();

include_once "../settings/connection.php";

// Assuming you have established a database connection already

// Check if the request method is POST and if the required parameters are set
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve JSON data from the request body
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    
    // Check if JSON data is valid and contains required parameters
    if ($data !== null && isset($data["slots"], $data["action"])) {
        // Retrieve data
        $slots = $data["slots"];
        $action = $data["action"];
        
        // Get current timestamp for check-in or check-out time
        $timestamp = date("Y-m-d H:i:s");
        
        // Establish database connection
        $pdo = new PDO("mysql:host=localhost;dbname=ashpark_mgt", "root", "");
        
        // Prepare and execute SQL query based on the action
        if ($action === "park") {
            $status = 'Unavailable'; // Set status to 'Unavailable' when parking
            // Prepare and execute SQL query to update check-in time, slot, and status
            $query = "UPDATE parking SET check_in_time = ?, status = ? WHERE slots = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$timestamp, $status, $slots]);
        } elseif ($action === "unpark") {
            // Update status to 'Available' when unpacking
            $status = 'Available';
            // Prepare and execute SQL query to update check-out time and status
            $query = "UPDATE parking SET check_out_time = ?, status = ? WHERE slots = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$timestamp, $status, $slots]);
        }
        
        // Check if update was successful
        if ($statement->rowCount() > 0) {
            http_response_code(200);
            echo "Update successful.";
        } else {
            http_response_code(500); // Internal Server Error
            echo "Error occurred while updating database.";
        }
    } else {
        http_response_code(400); // Bad Request
        echo "Invalid request format or missing parameters.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Only POST method is allowed.";
}
?>
