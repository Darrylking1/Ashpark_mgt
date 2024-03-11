<?php


// Start session here
session_start();

// Create a function to check for login using user id session created at login
function checkForLogin() {
    // The function checks if user id session exists
    if(!isset($_SESSION['user_id'])) {
        // If it doesn’t exist, redirect to login_view page.
        header("Location: .\login\login_view.php");
        
        // Don’t forget to use the die() function here. Else the instructions will continue execution after redirection.
        die();
    }
}

// Create a function to check for users’ role id session created at login.
function checkUserRole() {
    // The function checks if user role id session exists
    if(!isset($_SESSION['roleid'])) {
        // If it doesn’t exist, return FALSE.
        return false;
    } else {
        // Else return the users’ role id
        return $_SESSION['roleid'];
    }
}
?>