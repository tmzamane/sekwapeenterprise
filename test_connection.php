<?php
$servername = "localhost";
$username = "dtmdetly_admin"; // <--- REPLACE THIS with the actual database username from cPanel
$password = "Sekwape@2025!"; // <--- REPLACE THIS with the actual database password from cPanel
$database = "dtmdetly_sekwape_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Successfully connected to the database!";

$conn->close();
?>