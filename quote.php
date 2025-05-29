<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files (adjust paths if necessary)
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['service']) && isset($_POST['email'])) {
        $service = $_POST['service'];
        $email = $_POST['email'];
        $other_details = isset($_POST['other_details']) ? $_POST['other_details'] : '';
        $service_details = isset($_POST['service_details']) ? $_POST['service_details'] : '';

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; // 0 for production
            $mail->isSMTP();
            $mail->Host = 'lim112.truehost.cloud';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@sekwapeenterprise.co.za';
            $mail->Password = '2025@Sekwape!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('info@sekwapeenterprise.co.za', 'Sekwape Enterprise');
            $mail->addAddress('info@sekwapeenterprise.co.za', 'Sekwape Entreprise/Quote');
            $mail->addCC('info@sekwapeenterprise.co.za', 'Thabang');
            $mail->isHTML(true);
            $mail->Subject = 'New Quote Request from Website';

            $body = "A new quote request has been submitted:<br><br>";
            $body .= "<b>Service:</b> " . htmlspecialchars($service) . "<br>";
            if (!empty($_POST['shuttle_service'])) {
                $body .= "<b>Shuttle Service Type:</b> " . htmlspecialchars($_POST['shuttle_service']) . "<br>";
            }
            if (!empty($_POST['courier_service'])) {
                $body .= "<b>Courier Service Type:</b> " . htmlspecialchars($_POST['courier_service']) . "<br>";
            }
            if (!empty($_POST['waste_management_service'])) {
                $body .= "<b>Waste Management Service Type:</b> " . htmlspecialchars($_POST['waste_management_service']) . "<br>";
            }
            if (!empty($_POST['hygiene_service'])) {
                $body .= "<b>Hygiene Service Type:</b> " . htmlspecialchars($_POST['hygiene_service']) . "<br>";
            }
            if (!empty($_POST['security_service'])) {
                $body .= "<b>Security Service Type:</b> " . htmlspecialchars($_POST['security_service']) . "<br>";
            }
            $body .= "<b>Email:</b> " . htmlspecialchars($email) . "<br>";
            if (!empty($other_details)) {
                $body .= "<b>Other Details:</b> " . htmlspecialchars($other_details) . "<br>";
            }

            $mail->Body = $body;
            $mail->AltBody = "New quote request:\n\nService: " . $service . "\nService Details: " . $service_details . "\nEmail: " . $email . "\nOther Details: " . $other_details;

            $mail->send();
            $success_message = 'Your request has been sent successfully!';
        } catch (Exception $e) {
            $error_message = 'There was an error sending your request. Please try again.';
            // Optionally, log the full error for debugging on the server
            error_log('PHPMailer Error: ' . $e->getMessage());
        }
    } else {
        $error_message = 'Please select a service and enter your email.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote</title>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
            line-height: 1.7;
        }

        #request-quote {
            text-align: left;
            padding: 80px;
            border-radius: 15px;
            margin: 60px auto;
            max-width: 800px;
            background-color: transparent;
            box-shadow: none;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
            width: 100%;
        }

        .form-group label {
            display: block;
            font-size: 15px;
            color: #444;
            margin: 12px 0 12px 0;
            font-weight: 600;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            width: calc(100% - 20px);
            padding: 18px;
            font-size: 15.5px;
            border: none;
            border-radius: 10px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            margin: 0;
            display: block;
            background-color: #ffffff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            font-family: 'Work Sans', sans-serif;
        }

        .form-group select:focus,
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-bottom: 3px solid #AD471D;
            box-shadow: 0 9px 21px rgba(0, 0, 0, 0.25);
            transform: translateY(-3px);
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        #other-details {
            display: none;
        }

        #request-quote-button {
            font-family: 'Work Sans', sans-serif;
            background-color: #AD471D;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        #request-quote-button:hover {
            background: linear-gradient(to right, #7e350f, #b23c00);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .message {
            margin-top: 40px;
            font-size: 20px;
            text-align: center;
            font-weight: 600;
        }

        .hidden {
            display: none;
        }

        .quote-success-message {
            color: #28a745;
        }

        .quote-error-message {
            color: #dc3545;
        }

        @media (max-width: 768px) {
            #request-quote {
                padding: 60px;
                margin: 30px auto;
                width: 95%;
            }

            .form-group select,
            .form-group input {
                width: 100%;
            }

            #request-quote h2 {
                font-size: 38px;
            }

            #request-quote p {
                font-size: 18px;
            }
        }

        .heading {
            font-size: 44px;
            font-family: "Work Sans", sans serif;
            font-weight: 900;
            line-height: 50px;
            color: #222;
            margin: 15px 0 35px 0;
        }

        .sub-heading {
            color: #ad471d;
            font-weight: 700;
        }

        .service-options-group {
            display: none;
        }
    </style>
</head>

<body>
    <?php include_once "navbar.php"; ?>
    <section id="quote">
        <div id="request-quote" data-aos="fade-up" data-aos-duration="1000">
            <div class="sub-heading" data-aos="fade-up">Need a Custom Quote?</h2>
                <h2 class="heading" data-aos="fade-up" data-aos-delay="100">Get a personalized quote by filling out the form below.</h2>
                <p data-aos="fade-up" data-aos-duration="1000">Tell us more about your needs. Select the service you're interested
                    in, and we'll get back to you with a personalized quote.</p>

                <form id="quote-form" method="post">
                    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">
                        <label for="quote-service-select">Select Service:</label>
                        <select id="quote-service-select" name="service" onchange="toggleServiceOptions(this.value)">
                            <option value="">Select a service</option>
                            <option value="shuttle">Shuttle Services</option>
                            <option value="courier">Courier Services</option>
                            <option value="waste-management">Waste Management</option>
                            <option value="hygiene">Hygiene Services</option>
                            <option value="security">Security Solutions</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group service-options-group" id="shuttle-options-group" data-aos="fade-in" data-aos-duration="1000">
                        <label for="quote-shuttle-select">Select Shuttle Service:</label>
                        <select id="quote-shuttle-select" name="shuttle_service">
                            <option value="">Select a shuttle service</option>
                            <option value="shuttle-airport">Airport Shuttle</option>
                            <option value="shuttle-corporate">Corporate Shuttle</option>
                            <option value="shuttle-events">Event Shuttle</option>
                            <option value="shuttle-private">Private Shuttle</option>
                        </select>
                    </div>

                    <div class="form-group service-options-group" id="courier-options-group" data-aos="fade-in" data-aos-duration="1000">
                        <label for="quote-courier-select">Select Courier Service:</label>
                        <select id="quote-courier-select" name="courier_service">
                            <option value="">Select a courier service</option>
                            <option value="courier-local">Local Courier</option>
                            <option value="courier-long-distance">Long Distance Courier</option>
                            <option value="courier-express">Express Courier</option>
                            <option value="courier-specialized">Specialized Courier</option>
                        </select>
                    </div>

                    <div class="form-group service-options-group" id="waste-management-options-group" data-aos="fade-in"
                        data-aos-duration="1000">
                        <label for="quote-waste-management-select">Select Waste Management Service:</label>
                        <select id="quote-waste-management-select" name="waste_management_service">
                            <option value="">Select a waste management service</option>
                            <option value="waste-residential">Residential Waste</option>
                            <option value="waste-commercial">Commercial Waste</option>
                            <option value="waste-recycling">Recycling Services</option>
                            <option value="waste-hazardous">Hazardous Waste</option>
                        </select>
                    </div>

                    <div class="form-group service-options-group" id="hygiene-options-group" data-aos="fade-in" data-aos-duration="1000">
                        <label for="quote-hygiene-select">Select Hygiene Service:</label>
                        <select id="quote-hygiene-select" name="hygiene_service">
                            <option value="">Select a hygiene service</option>
                            <option value="hygiene-office">Office Hygiene</option>
                            <option value="hygiene-industrial">Industrial Hygiene</option>
                            <option value="hygiene-events">Event Hygiene</option>
                            <option value="hygiene-specialized">Specialized Hygiene</option>
                        </select>
                    </div>

                    <div class="form-group service-options-group" id="security-options-group" data-aos="fade-in"
                        data-aos-duration="1000">
                        <label for="quote-security-select">Select Security Service:</label>
                        <select id="quote-security-select" name="security_service">
                            <option value="">Select a security service</option>
                            <option value="security-guarding">Guarding Services</option>
                            <option value="security-access-control">Access Control</option>
                            <option value="security-surveillance">Surveillance Systems</option>
                            <option value="security-alarm-systems">Alarm Systems</option>
                        </select>
                    </div>

                    <div class="form-group" data-aos="fade-in" data-aos-duration="1000">
                        <label for="quote-email-input">Your Email Address:</label>
                        <input type="email" id="quote-email-input" name="email" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group" id="other-details" data-aos="fade-in" data-aos-duration="1000" style="display: none;">
                        <label for="quote-other-details">Please specify your needs:</label>
                        <textarea id="quote-other-details" name="other_details"
                            placeholder="Enter details about your request"></textarea>
                    </div>

                    <button id="request-quote-button" type="submit" data-aos="zoom-in" data-aos-duration="1000">Request a
                        Quote</button>
                </form>

                <?php if ($success_message): ?>
                    <p class="message quote-success-message"><?php echo htmlspecialchars($success_message); ?></p>
                <?php endif; ?>

                <?php if ($error_message): ?>
                    <p class="message quote-error-message"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>

            </div>

    </section>
    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function toggleServiceOptions(service) {
            const shuttleOptionsGroup = document.getElementById('shuttle-options-group');
            const courierOptionsGroup = document.getElementById('courier-options-group');
            const wasteManagementOptionsGroup = document.getElementById('waste-management-options-group');
            const hygieneOptionsGroup = document.getElementById('hygiene-options-group');
            const securityOptionsGroup = document.getElementById('security-options-group');
            const otherDetails = document.getElementById('other-details');

            shuttleOptionsGroup.style.display = 'none';
            courierOptionsGroup.style.display = 'none';
            wasteManagementOptionsGroup.style.display = 'none';
            hygieneOptionsGroup.style.display = 'none';
            securityOptionsGroup.style.display = 'none';
            otherDetails.style.display = 'none';

            if (service === 'shuttle') {
                shuttleOptionsGroup.style.display = 'block';
            } else if (service === 'courier') {
                courierOptionsGroup.style.display = 'block';
            } else if (service === 'waste-management') {
                wasteManagementOptionsGroup.style.display = 'block';
            } else if (service === 'hygiene') {
                hygieneOptionsGroup.style.display = 'block';
            } else if (service === 'security') {
                securityOptionsGroup.style.display = 'block';
            } else if (service === 'other') {
                otherDetails.style.display = 'block';
            }
        }
    </script>
</body>

</html>