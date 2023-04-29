<?php
session_start();
// must be database to test it
// Define your database connection information here
$host = "localhost";
$username = "your-username";
$password = "your-password";
$database = "your-database";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>