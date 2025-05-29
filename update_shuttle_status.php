<?php
// update_shuttle_status.php

// ... (database connection code)
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

if (isset($_POST['booking_id']) && is_numeric($_POST['booking_id']) &&
    isset($_POST['status'])) {

    $booking_id = mysqli_real_escape_string($conn, $_POST['booking_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $event_details = isset($_POST['event_details']) ? mysqli_real_escape_string($conn, $_POST['event_details']) : NULL;
    error_log("Latitude received: " . $_POST['latitude']);
error_log("Longitude received: " . $_POST['longitude']);
$latitude = isset($_POST['latitude']) ? mysqli_real_escape_string($conn, $_POST['latitude']) : NULL;
$longitude = isset($_POST['longitude']) ? mysqli_real_escape_string($conn, $_POST['longitude']) : NULL;

    $sql = "INSERT INTO tracking_events (booking_id, status, event_details, latitude, longitude) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die("mysqli_prepare failed: " . htmlspecialchars(mysqli_error($conn)));
    }

    mysqli_stmt_bind_param($stmt, "issss", $booking_id, $status, $event_details, $latitude, $longitude);

    if (mysqli_stmt_execute($stmt)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request.  booking_id and status are required.";
}
mysqli_close($conn);
?>