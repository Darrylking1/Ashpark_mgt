<?php
$host = "localhost";
$dbname = "ashpark_mgt";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
}

