<?php
// get_updates.php

// Database connection
$servername = "localhost";
$username = "dtmdetly_admin";
$password = "Sekwape@2025!";
$database = "dtmdetly_sekwape_db";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add this logging
error_log("GET parameters: " . print_r($_GET, true));

$booking_id = isset($_GET['booking_id']) ? mysqli_real_escape_string($conn, $_GET['booking_id']) : null;
$last_update_time = isset($_GET['last_update']) ? mysqli_real_escape_string($conn, $_GET['last_update']) : date('Y-m-d H:i:s', strtotime('-1 minute'));

if (!$booking_id) {
    echo json_encode(['error' => 'Missing booking_id']);
    exit();
}

$timeout = 30;
$start_time = time();

while (time() - $start_time < $timeout) {
    // Check for new updates since the last_update_time
    $sql = "SELECT status, event_timestamp, event_details, latitude, longitude
            FROM tracking_events
            WHERE booking_id = ?
            AND event_timestamp > ?
            ORDER BY event_timestamp ASC";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo json_encode(['error' => 'mysqli_prepare failed: ' . htmlspecialchars(mysqli_error($conn))]);
        $conn->close();
        exit();
    }
    error_log("get_updates.php - booking_id: " . $booking_id . ", last_update_time: " . $last_update_time);
    $stmt->bind_param("ss", $booking_id, $last_update_time);
    $stmt->execute();
    if ($stmt->errno) {
        echo json_encode(['error' => 'Database execute error: ' . $stmt->error]);
        $stmt->close();
        $conn->close();
        exit();
    }
    $result = $stmt->get_result();
    if ($conn->errno) {
        echo json_encode(['error' => 'Database get result error: ' . $stmt->error]);
        $stmt->close();
        $conn->close();
        exit();
    }

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
             if($row['status'] == 'Completed'){
                 echo json_encode(['trip_ended' => true, 'data' => $rows]);
                 $stmt->close();
                 $conn->close();
                 exit();
             }
        }
        echo json_encode($rows);
        $stmt->close();
        $conn->close();
        exit();
    }

    $stmt->close();
    sleep(1);
}

echo json_encode(['status' => 'no_update']);
$conn->close();
exit();
?>
