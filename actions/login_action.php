<?php
// Start session
session_start();

// Include the connection file
include_once '../settings/connection.php';

// Check if login button was clicked
if (isset($_POST['login_button'])) {
    // Collect form data
    $ID_number = $_POST['ID_number'];
    $password = $_POST['password'];

    // Write a query to SELECT a record from the userinfo table using the ID_number
    $query = "SELECT * FROM userinfo WHERE ID_number = ?";
    
    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }
    
    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "s", $ID_number);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any row was returned
    if (mysqli_num_rows($result) == 0) {
        // No record found, provide appropriate response
        echo "User not registered or incorrect username.";
        exit();
    }

    // Fetch the record
    $row = mysqli_fetch_assoc($result);

    // Verify password user provided against database record using password_verify()
    if (password_verify($password, $row['password'])) {
        // Passwords match, continue with the processing
        // Create session for user id and role id and firstname
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role_id'] = $row['roleid'];
        $_SESSION['firstname'] = $row['firstname'];
        
        // Redirect to home page
        header("Location: ../views/index.php");
        exit();
    } else {
        // Passwords don't match, provide appropriate response
        echo "Incorrect password.";
        exit();
    }
} else {
    // Login button was not clicked, stop processing
    echo "Login button not clicked.";
    exit();
}
?>
