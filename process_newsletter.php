<?php
// IMPORTANT: No blank lines or spaces before this opening <?php tag

// Path to PHPMailer classes
// Make sure these paths are correct relative to process_newsletter.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Needed for SMTP Debugging

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Set the URL of the page where the form is located.
// This MUST be the actual file name of your main page
// (e.g., 'index.html', 'index.php').
// We DO NOT put #footer here. It's added later.
$redirect_base_page = 'index.php'; // <<< MAKE SURE THIS IS CORRECT FOR YOUR SITE!

// Initialize default response variables
$status = 'error'; // Can be 'success' or 'error'
$message = 'An unexpected error occurred. Please try again.';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

    if (empty($email)) {
        $message = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } else {
        // --- All validation passed, attempt to send email using PHPMailer ---

        $mail = new PHPMailer(true); // Passing true enables exceptions

        try {
            // Server settings (Your provided successful settings)
            $mail->SMTPDebug = 0; // Set to 2 (PHPMailer::SMTP::DEBUG_SERVER) for testing, then 0 for production
            $mail->isSMTP();
            $mail->Host = 'lim112.truehost.cloud';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sekwapeenterprise.co.za';
            $mail->Password = '2025@Sekwape!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('info@sekwapeenterprise.co.za', 'Sekwape Enterprise');
            $mail->addAddress('info@sekwapeenterprise.co.za', 'Sekwape Enterprise'); // Where notifications go
            $mail->addReplyTo($email); // Allow replying to the subscriber

            // Content
            $mail->isHTML(false); // Plain text email
            $mail->Subject = "Newsletter Subscription Request from Website";
            $mail->Body    = "A new user has subscribed to the newsletter:\n\nEmail: " . $email;

            $mail->send();
            $status = 'success';
            $message = "Thank you for subscribing!";
        } catch (Exception $e) {
            $message = "Sorry, we could not process your subscription at this time. Please try again later.";
            // It's good practice to log the error for your own debugging, even if not displayed to the user
            error_log("Newsletter form PHPMailer Error: " . $mail->ErrorInfo);
        }
    }
} else {
    // Direct access to script
    $message = "Direct access to form processor not allowed.";
}

// --- Redirect to the original page with status, message, and the #footer anchor ---

// Build the full redirect URL. The anchor (#footer) is ADDED ONLY ONCE here.
$redirect_url_with_params = $redirect_base_page . "?status=" . $status . "&message=" . urlencode($message) . "#footer";

// Perform the redirect
header("Location: " . $redirect_url_with_params);
exit(); // Crucial to stop script execution after redirect
// IMPORTANT: No closing 
?> tag if this file contains ONLY PHP code.