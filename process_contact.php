<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    $to = "info@sekwapeenterprise.co.za";
    $email_subject = "Contact Form Submission from Sekwape Enterprise: $subject";
    $email_body = "You have received a new message from the Sekwape Enterprise contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n\n" .
                  "Subject: $subject\n\n" .
                  "Message:\n$message\n";
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Attempt to send the email (we'll assume it's successful for now)
    mail($to, $email_subject, $email_body, $headers);

    // Redirect back to the contact page with the success status
header("Location: contact.php?status=success#contact-form-section");
exit();    

} else {
    // If someone tries to access process_contact.php directly
    header("Location: contact_us.php");
    exit();
}
?>