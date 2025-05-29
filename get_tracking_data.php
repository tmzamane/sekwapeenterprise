<?php
// get_tracking_data.php

// Database connection details
$servername = "localhost";
$username = "dtmdetly_admin";
$password = "Sekwape@2025!";
$database = "dtmdetly_sekwape_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['booking_id']) && is_numeric($_GET['booking_id'])) {
    $booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);

    $sql = "SELECT latitude, longitude FROM tracking_events WHERE booking_id = ? ORDER BY event_timestamp DESC LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        http_response_code(500); // Internal Server Error
        echo json_encode(["error" => "mysqli_prepare failed: " . htmlspecialchars(mysqli_error($conn))]);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $booking_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        header('Content-Type: application/json');
        echo json_encode($row); // Output the latest latitude and longitude as JSON
    } else {
        header('Content-Type: application/json');
        echo json_encode(null); // No tracking data found for this booking
    }

    mysqli_stmt_close($stmt);
} else {
    http_response_code(400); // Bad Request
    header('Content-Type: application/json');
    echo json_encode(["error" => "Invalid booking ID."]);
}

mysqli_close($conn);
?>