<?php
$host = "localhost";
$dbname = "ashpark_mgt.sql";
$username = "root"; 
$password = ""; 

$conn = mysqli_connect($host, $username, $password, $dbname, 3308);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
}

