<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["rating"])) {
        $rating = filter_var($_POST["rating"], FILTER_SANITIZE_NUMBER_INT);
        $name = isset($_POST["name"]) ? filter_var($_POST["name"], FILTER_SANITIZE_STRING) : "Anonymous";
        $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";

        $to = "info@sekwapeenteprise.co.za";
        $subject = "New Service Rating Submission";
        $body = "A new service rating has been submitted:\n\n";
        $body .= "Rating: " . $rating . " stars\n";
        $body .= "Name: " . $name . "\n";
        if ($email) {
            $body .= "Email: " . $email . "\n";
        }
        $body .= "\nSubmitted from: " . $_SERVER['SERVER_NAME'];

        $headers = "From: info@sekwapeenteprise.co.za" . $_SERVER['SERVER_NAME'];
        $headers = filter_var($headers, FILTER_SANITIZE_EMAIL);
        if (!filter_var($headers, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid sender email in headers.";
            exit;
        }

        if (mail($to, $subject, $body, $headers)) {
            echo "Success: Your rating has been submitted successfully!";
        } else {
            echo "Error: There was a problem submitting your rating. Please try again later.";
        }
    } else {
        echo "Error: No rating data received.";
    }
} else {
    echo "Error: This script can only be accessed via a POST request.";
}
