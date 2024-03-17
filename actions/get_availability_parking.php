<?php
// Include database connection settings
include_once '../settings/connection.php';

try {
    // Establish database connection using PDO
    $pdo = new PDO("mysql:host=localhost;dbname=ashpark_mgt", "root", "");

    // Query to fetch parking availability data
    $query = "SELECT check_in_time, check_out_time, status FROM parking ORDER BY check_in_time";
    $statement = $pdo->query($query);

    // Check if the query was successful
    if ($statement) {
        // Fetch data and format it into JSON
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $jsonData = json_encode($data);

        // Set response headers and send JSON data
        header('Content-Type: application/json');
        echo $jsonData;
    } else {
        // If the query fails, throw an exception
        throw new Exception("Failed to fetch parking availability data");
    }
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo "PDO Exception: " . $e->getMessage();
} catch (Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage();
}
?>
