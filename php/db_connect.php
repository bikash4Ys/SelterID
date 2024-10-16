<?php
// Database connection variables
$servername = "localhost"; // Server name (localhost for local Apache)
$username = "root"; // Your MySQL username (usually "root" for localhost)
$password = ""; // Your MySQL password (leave blank for localhost if not set)
$dbname = "evacuation_system"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
