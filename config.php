<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "med-web";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
ini_set('display_errors', 0);
?>










