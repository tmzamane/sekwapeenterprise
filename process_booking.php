<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Include PHPMailer files (adjust paths if necessary)
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Database connection details
$servername = "localhost";
$username = "dtmdetly_admin";
$password = "Sekwape@2025!";
$database = "dtmdetly_sekwape_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Use die() to stop execution on fatal error
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get data from POST.  Do NOT use mysqli_real_escape_string directly on $_POST.
    $post_data = array();
    foreach ($_POST as $key => $value) {
        $post_data[$key] = mysqli_real_escape_string($conn, $value);
    }

    $booking_type = $post_data["booking_type"];
    $client_name = $post_data["client_name"];
    $client_email = $post_data["client_email"];
    $client_phone = $post_data["client_phone"];
    $booking_details = json_encode($post_data); // Store the entire $_POST array as JSON

    // Determine which fields to include based on the booking type.
    $columns = array('booking_type', 'client_name', 'client_email', 'client_phone', 'booking_data', 'booking_timestamp');
    $values = array($booking_type, $client_name, $client_email, $client_phone, $booking_details, 'NOW()');

    if ($booking_type === 'simple') {
        if (isset($post_data['pickup'])) {
            $columns[] = 'pickup';
            $values[] = $post_data['pickup'];
        }
        if (isset($post_data['dropoff'])) {
            $columns[] = 'dropoff';
            $values[] = $post_data['dropoff'];
        }
        if (isset($post_data['date'])) {
            $columns[] = 'date';
            $values[] = $post_data['date'];
        }
        if (isset($post_data['time'])) {
            $columns[] = 'time';
            $values[] = $post_data['time'];
        }
    } elseif ($booking_type === 'package') {
        if (isset($post_data['package_type'])) {
            $columns[] = 'package_type';
            $values[] = $post_data['package_type'];
        }
        if (isset($post_data['date'])) {
            $columns[] = 'date';
            $values[] = $post_data['date'];
        }
        if (isset($post_data['time'])) {
            $columns[] = 'time';
            $values[] = $post_data['time'];
        }
    } elseif ($booking_type === 'recurring') {
        if (isset($post_data['frequency'])) {
            $columns[] = 'frequency';
            $values[] = $post_data['frequency'];
        }
        if (isset($post_data['date'])) {
            $columns[] = 'date';
            $values[] = $post_data['date'];
        }
        if (isset($post_data['time'])) {
            $columns[] = 'time';
            $values[] = $post_data['time'];
        }
    } elseif ($booking_type === 'multi-stop') {
        if (isset($post_data['pickup'])) {
            $columns[] = 'pickup';
            $values[] = $post_data['pickup'];
        }
        if (isset($post_data['dropoff1'])) {
            $columns[] = 'dropoff1';
            $values[] = $post_data['dropoff1'];
        }
        if (isset($post_data['dropoff2'])) {
            $columns[] = 'dropoff2';
            $values[] = $post_data['dropoff2'];
        }
        if (isset($post_data['date'])) {
            $columns[] = 'date';
            $values[] = $post_data['date'];
        }
        if (isset($post_data['time'])) {
            $columns[] = 'time';
            $values[] = $post_data['time'];
        }
    } elseif ($booking_type === 'courier') {
        if (isset($post_data['pickup'])) {
            $columns[] = 'pickup';
            $values[] = $post_data['pickup'];
        }
        if (isset($post_data['dropoff'])) {
            $columns[] = 'dropoff';
            $values[] = $post_data['dropoff'];
        }
        if (isset($post_data['package_type'])) {
            $columns[] = 'package_type';
            $values[] = $post_data['package_type'];
        }
        if (isset($post_data['date'])) {
            $columns[] = 'date';
            $values[] = $post_data['date'];
        }
        if (isset($post_data['time'])) {
            $columns[] = 'time';
            $values[] = $post_data['time'];
        }
    }

    $placeholders = implode(',', array_fill(0, count($columns), '?'));
    $column_names = implode(',', $columns);
    $sql = "INSERT INTO bookings ($column_names) VALUES ($placeholders)";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("mysqli_prepare failed: " . htmlspecialchars(mysqli_error($conn)));
    }

    // Build the type string dynamically
    $types = '';
    $bind_params_values = array();
    foreach ($values as $index => $value) {
        if ($value === 'NOW()') {
            $types .= 's';
            $bind_params_values[] = date('Y-m-d H:i:s');
        } elseif (is_int($value)) {
            $types .= 'i';
            $bind_params_values[] = $value;
        } elseif (is_float($value)) {
            $types .= 'd';
            $bind_params_values[] = $value;
        } else {
            $types .= 's';
            $bind_params_values[] = $value;
        }
    }

    // Check if the number of types matches the number of values
    if (strlen($types) != count($bind_params_values)) {
        die("Type string length does not match the number of values to bind. Types: " . $types . ", Values: " . count($bind_params_values) .
            "<br>Columns: " . implode(",", $columns) . "<br>Values: " . implode(",", $values));
    }

    $bind_params = array();
    $bind_params[] = &$types;

    for ($i = 0; $i < count($bind_params_values); $i++) {
        $bind_params[] = &$bind_params_values[$i];
    }

    if (count($bind_params_values) > 0) {
        call_user_func_array(array($stmt, 'bind_param'), $bind_params);
    }

    // Execute the query and handle success/failure
    if (mysqli_stmt_execute($stmt)) {
        $booking_id = mysqli_insert_id($conn);

        // Insert the initial tracking event
        $initial_status = "Order Placed";  // Or "Booking Confirmed", or whatever is appropriate
        $event_details = "Booking placed by customer."; // Add details
        $latitude = NULL;  // Or the starting latitude, if you have it
        $longitude = NULL; // Or the starting longitude, if you have it

        $tracking_sql = "INSERT INTO tracking_events (booking_id, status, event_details, latitude, longitude) VALUES (?, ?, ?, ?, ?)";
        $tracking_stmt = mysqli_prepare($conn, $tracking_sql);
        mysqli_stmt_bind_param($tracking_stmt, "issss", $booking_id, $initial_status, $event_details, $latitude, $longitude);
        mysqli_stmt_execute($tracking_stmt);
        mysqli_stmt_close($tracking_stmt);

        // Email sending starts here
        $to = $client_email;
        $subject = "Your Booking with Sekwape Enterprise is Successful!";
        $banking_details = "Your Banking Details:\nAccount Name: [Your Account Name]\nBank: [Your Bank]\nAccount Number: [Your Account Number]\nBranch Code: [Your Branch Code]";
        $tracking_link = "https://www.sekwapeenterprise.co.za/track_shuttle.php?booking_id=" . $booking_id;

        $message = "Dear " . $client_name . ",\n\nYour booking has been successfully received!\n\nBooking Details:\n";
        $booking_data_array = json_decode($booking_details, true);
        if (is_array($booking_data_array)) {
            foreach ($booking_data_array as $key => $value) {
                if ($key != 'booking_data') {
                    $message .= ucfirst(str_replace("_", " ", $key)) . ": " . $value . "\n";
                }
            }
        }

        $message .= "\n" . $banking_details . "\n\nYou can track the progress of your shuttle here: " . $tracking_link . "\n\nThank you for choosing Sekwape Enterprise!" . "\n\nPlease tell us about your experience and rate us here : https://www.sekwapeenterprise.co.za/ratings.php";

        // Use PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0; // 0 for production,  REMOVED DEBUGGING
            $mail->isSMTP();
            $mail->Host = 'lim112.truehost.cloud';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sekwapeenterprise.co.za';
            $mail->Password = '2025@Sekwape!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('info@sekwapeenterprise.co.za', 'Sekwape Enterprise');
            $mail->addAddress($to, $client_name);
            $mail->addCC('info@sekwapeenterprise.co.za', 'Thabang');

            //Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            // Output styled HTML for success
            echo '<div style="display: flex; justify-content: center; align-items: center; min-height: 200px;">
                      <div style="background-color: #e6f4e5; color: #388e3c; padding: 20px; border-radius: 8px; border: 1px solid #81c784; text-align: center;">
                          <h2 style="color: #388e3c; font-size: 24px; font-weight: bold;">Booking Successful!</h2>
                          <p style="font-size: 16px;">Booking details saved and confirmation email sent.</p>
                      </div>
                  </div>';
        } catch (Exception $e) {
            // Output styled HTML for email error
            echo '<div style="display: flex; justify-content: center; align-items: center; min-height: 200px;">
                      <div style="background-color: #fbe9e7; color: #d32f2f; padding: 20px; border-radius: 8px; border: 1px solid #e57373; text-align: center;">
                          <h2 style="color: #d32f2f; font-size: 24px; font-weight: bold;">Email Error!</h2>
                          <p style="font-size: 16px;">Error sending email: ' . htmlspecialchars($e->getMessage()) . '</p>
                      </div>
                  </div>';
        }
    } else {
        // Output styled HTML for invalid request
        echo '<div style="display: flex; justify-content: center; align-items: center; min-height: 200px;">
                  <div style="background-color: #fbe9e7; color: #d32f2f; padding: 20px; border-radius: 8px; border: 1px solid #e57373; text-align: center;">
                      <h2 style="color: #d32f2f; font-size: 24px; font-weight: bold;">Error!</h2>
                      <p style="font-size: 16px;">Error saving booking: ' . mysqli_error($conn) . '</p>
                  </div>
              </div>';
    }

    mysqli_stmt_close($stmt);
} else {
    // ... (your existing error handling code for non-POST requests)
}

mysqli_close($conn);
?>