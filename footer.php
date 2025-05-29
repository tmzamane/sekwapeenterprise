<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekwape Enterprise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Your existing CSS for the footer and form-message */
        footer {
            background-color: #333;
            color: #f0f0f0;
            padding: 40px 5%;
            font-family: 'Work Sans', sans-serif;
            font-size: 15.5px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-bottom: 30px;
        }

        .footer-about,
        .footer-services-list,
        .footer-connect {
            text-align: left;
        }

        .footer-about h3,
        .footer-services-list h3,
        .footer-connect h3 {
            color: #AD471D;
            font-size: 1.15em;
            margin-bottom: 15px;
        }

        .footer-about p,
        .footer-connect p {
            font-size: 0.9em;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .footer-contact-details p {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .footer-contact-details i {
            margin-right: 10px;
            color: #AD471D;
        }

        .footer-about a {
            color: #f0f0f0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-about a:hover {
            color: #AD471D;
        }

        .footer-services-list ul {
            list-style: none;
            padding: 0;
        }

        .footer-services-list li {
            margin-bottom: 10px;
        }

        .footer-services-list a {
            color: #f0f0f0;
            text-decoration: none;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
        }

        .footer-services-list a i {
            margin-right: 10px;
            color: #AD471D;
        }

        .footer-services-list a:hover {
            color: #AD471D;
        }

        .footer-newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-newsletter-form input {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Work Sans', sans-serif;
            background-color: #444;
            color: #f0f0f0;
        }

        .footer-newsletter-form button {
            background-color: #AD471D;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Work Sans', sans-serif;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .footer-newsletter-form button:hover {
            background-color: #8C3A18;
        }

        .form-message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9em;
            text-align: center;
            color: #fff;
            /* Default color, adjusted by PHP */
            /* Displayed by PHP logic, no default display: none; */
        }

        .form-message.success {
            background-color: #28a745;
        }

        .form-message.error {
            background-color: #dc3545;
        }

        .footer-social-icons {
            margin-top: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .footer-social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            color: #f0f0f0;
            font-size: 1em;
            transition: color 0.3s ease;
            background-color: transparent;
            border-radius: 5px;
        }

        .footer-social-icons a:hover {
            color: #AD471D;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .footer-copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #555;
            font-size: 0.9em;
            color: #aaa;
        }

        .footer-copyright a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-copyright a:hover {
            color: #AD471D;
        }

        .footer-services-list {
            text-align: center;
        }

        .footer-services-list h3 {
            color: #AD471D;
            font-size: 1.15em;
            margin-bottom: 15px;
        }

        .footer-services-list ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: fit-content;
            margin: 0 auto;
        }

        .footer-services-list li {
            margin-bottom: 10px;
            text-align: left;
        }

        .footer-services-list a {
            color: #f0f0f0;
            text-decoration: none;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
        }

        .footer-services-list a i {
            margin-right: 10px;
            color: #AD471D;
        }

        .footer-services-list a:hover {
            color: #AD471D;
        }
    </style>
</head>

<body>
    <footer id="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>About Sekwape Enterprise</h3>
                <p>We are dedicated to providing innovative and reliable solutions across various sectors. Our commitment to quality and customer satisfaction drives everything we do.</p>
                <div class="footer-contact-details">
                    <p><i class="fas fa-phone"></i> <a href="tel:0661694918">066 1694 918</a> / <a
                            href="tel:0614040654">061 4040 654</a></p>
                    <p><i class="fas fa-envelope"></i> <a
                            href="mailto:sekwapeenterprise@info.co.za">info@sekwapeenterprise.co.za</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> 665175 Bokamoso str, Ext 2 Mahube valley, Mamelodi East -
                        Pretoria</p>
                </div>
            </div>
            <div class="footer-services-list">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="services.php#shuttle-services"><i class="fas fa-bus"></i> Shuttle Services</a></li>
                    <li><a href="services.php#courier-services"><i class="fas fa-truck"></i> Courier Services</a></li>
                    <li><a href="services.php#hygiene-services"><i class="fas fa-broom"></i> Hygiene Services</a></li>
                    <li><a href="services.php#waste-management"><i class="fas fa-trash"></i> Waste Management</a></li>
                    <li><a href="services.php#security-solutions"><i class="fas fa-shield-alt"></i> Security Solutions</a>
                    </li>
                </ul>
            </div>
            <div class="footer-connect">
                <h3>Stay Connected</h3>
                <p>Subscribe to our newsletter and follow us on social media for the latest updates.</p>
                <form class="footer-newsletter-form" action="process_newsletter.php" method="POST">
                    <input type="email" name="email" id="newsletter-email" placeholder="Your Email" required>
                    <button type="submit" class="primary-button">Subscribe</button>
                </form>
                <section id="footer"></section>
                <?php
                // Check if status and message parameters exist in the URL
                if (isset($_GET['status']) && isset($_GET['message'])) {
                    $status = htmlspecialchars($_GET['status']); // Sanitize for safe display
                    $message = htmlspecialchars(urldecode($_GET['message'])); // Sanitize and decode

                    $class = '';
                    if ($status === 'success') {
                        $class = 'success';
                    } elseif ($status === 'error') {
                        $class = 'error';
                    }

                    // Only display the div if there's a message
                    if (!empty($message)) {
                        echo '<div id="form-message" class="form-message ' . $class . '">' . $message . '</div>';
                    }
                }
                ?>

                <div class="footer-social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2025 Sekwape Enterprise. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of
                    Service</a></p>
        </div>
    </footer>
</body>

</html>