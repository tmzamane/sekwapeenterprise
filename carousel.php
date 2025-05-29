<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        h1 {
            font-size: 44px;
            font-family: 'Work Sans', sans-serif;
            font-weight: 800;
            text-align: left;
            padding: 10px 0;
            margin: 0;
            line-height: normal;
        }

        .carousel {
            overflow: hidden;
            width: 100%;
            position: relative;
            margin: 20px 0;
            font-family: 'Work sans', sans-serif;
            display: flex;
            flex-direction: column;
            /* Stack content and controls */
            align-items: center;
            /* Center controls horizontally */
        }

        .carousel-slide {
            display: none;
            width: 100%;
            position: relative;
            opacity: 0;
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            transform: translateX(100%);
            flex-direction: column;
            height: auto;
        }

        .carousel-slide.active {
            display: flex;
            opacity: 1;
            transform: translateX(0);
        }

        .carousel-slide img {
            width: 100%;
            height: 38vh;
            object-fit: cover;
            /* Or 'contain' */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            flex-grow: 0;
        }

        .carousel-content {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            text-align: left;
            background-color: white;
            z-index: 1;
        }

        .carousel-content h1 {
            font-family: "Work Sans", sans-serif;
            color: #000;
            font-size: 2em;
            margin-bottom: 8px;
        }

        .carousel-content p {
            font-family: 'Poppins', sans-serif;
            color: #333;
            font-size: 0.95em;
            margin-bottom: 15px;
        }

        .bookings-button {
            background-color: #AD471D;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9em;
            margin: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }

        .bookings-button:hover {
            background-color: #803000;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .carousel-controls {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            /* Space between content and buttons */
            z-index: 10;
        }

        .carousel-controls button {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .carousel-controls button:hover {
            opacity: 1;
        }

        .bottom-controls {
            display: none;
            /* Hide the duplicate bottom controls */
        }

        /* Mobile View Adjustments */
        @media (max-width: 767px) {
            .carousel {
                margin: 15px 0;
            }



            .carousel-content {
                padding: 10px;
            }

            .carousel-content h1 {
                font-size: 1.8em;
                margin-bottom: 5px;
            }

            .carousel-content p {
                font-size: 0.9em;
                margin-bottom: 10px;
            }

            .bookings-button {
                padding: 8px 15px;
                font-size: 0.85em;
            }

            .carousel-controls {
                display: flex;
                /* Show controls below */
                margin-top: 10px;
            }
        }

        /* Tablet View Adjustments */
        @media (min-width: 768px) and (max-width: 1024px) {
            .carousel {
                margin: 20px 0;
            }


            .carousel-content {
                padding: 15px;
            }

            .carousel-content h1 {
                font-size: 2.2em;
                margin-bottom: 8px;
            }

            .carousel-content p {
                font-size: 1em;
                margin-bottom: 12px;
            }

            .carousel-controls {
                display: flex;
                /* Show controls below */
                margin-top: 12px;
            }
        }

        /* Desktop View Adjustments */
        @media (min-width: 1025px) {
            .carousel {
                height: auto;
                margin: 50px 0;
                flex-direction: column;
                /* Stack content and controls */
            }

            .carousel-slide {
                flex-direction: row;
                align-items: stretch;
                height: auto;
            }

            .carousel-slide img {
                width: 50%;
                height: 70vh;
                object-fit: cover;
            }

            .carousel-content {
                width: 50%;
                padding: 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                background-color: white;
            }

            .carousel-controls {
                display: flex;
                /* Show controls below */
                margin-top: 20px;
            }

            .bookings-button {
                padding: 12px 25px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <header class="hero">
        <div class="carousel">
            <div class="carousel-slide active">
                <img src="images/pexels-tima-miroshnichenko-6169056.jpg" alt="Welcome to Sekwape Enterprise">
                <div class="carousel-content">
                    <h1>Simplify operations with one partner.</h1>
                    <p>Sekwapwe Enterprise offers a comprehensive suite of services including transportation, courier, waste management, hygiene, and security. We are committed to enhancing your efficiency and reducing your workload with our integrated solutions.</p>
                    <a href="shuttle-services.php" class="primary-button">Learn More About Our Services</a>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="images/shuttle.png" alt="Shuttle Services">
                <div class="carousel-content">
                    <h1>Shuttle Services</h1>
                    <p>Experience reliable and comfortable transportation with our shuttle services. We cater to individuals and groups, offering timely and efficient travel solutions across Limpopo, Cape Town, and Lebombo. We offer a range of vehicles, including sedans, kombis, and luxury coaches. Book your ride today!</p>
                    <a href="index.php#rates" class="primary-button">View Shuttle Rates</a>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="images/courier-services.jpg" alt="Courier Services">
                <div class="carousel-content">
                    <h1>Courier Services</h1>
                    <p>Our courier services ensure fast and secure delivery of your packages and documents. We handle everything with care and precision, providing reliable delivery solutions tailored to your needs. Trust us for timely deliveries!</p>
                    <a href="quote.php" class="primary-button">Get a Courier Quote</a>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="images/waste-management.jpg" alt="Waste Management">
                <div class="carousel-content">
                    <h1>Waste Management</h1>
                    <p>Maintain a clean and sustainable environment with our waste management services. We offer efficient waste disposal and recycling solutions, helping you reduce your environmental footprint. Contact us for a cleaner tomorrow!</p>
                    <a href="waste-management-services.php" class="primary-button">Learn About Waste Management</a>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="images/hygiene-services.jpg" alt="Hygiene Services">
                <div class="carousel-content">
                    <h1>Hygiene Services</h1>
                    <p>Ensure a healthy and safe environment with our comprehensive hygiene services. We provide thorough cleaning and sanitation solutions for commercial and residential spaces. Experience the difference with our professional services!</p>
                    <a href="hygiene-services.php" class="primary-button">Explore Hygiene Services</a>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="images/security.jpg" alt="Security Services">
                <div class="carousel-content">
                    <h1>Security Services</h1>
                    <p>Protect your assets and ensure safety with our professional security solutions. We offer reliable and vigilant security services tailored to your specific needs. Trust us to provide peace of mind with our expert security team.</p>
                    <a href="quote.php" class="primary-button">Get Security Solutions</a>
                </div>
            </div>
            <div class="carousel-controls">
                <button id="prevButton" class="primary-button">Previous</button>
                <button id="pauseButton" class="primary-button">Pause</button>
                <button id="playButton" class="primary-button">Play</button>
                <button id="nextButton" class="primary-button">Next</button>
            </div>
        </div>
    </header>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.carousel-slide');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            const pauseButton = document.getElementById('pauseButton');
            const playButton = document.getElementById('playButton');
            let currentSlide = 0;
            let intervalId;
            let isPaused = false;

            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            function startCarousel() {
                if (!isPaused) {
                    intervalId = setInterval(nextSlide, 5000);
                }
            }

            function pauseCarousel() {
                clearInterval(intervalId);
                isPaused = true;
                pauseButton.classList.add('paused');
                playButton.classList.remove('paused');
            }

            function resumeCarousel() {
                isPaused = false;
                startCarousel();
                playButton.classList.remove('paused');
                pauseButton.classList.remove('paused');
            }

            showSlide(currentSlide);
            startCarousel();

            if (prevButton) {
                prevButton.addEventListener('click', prevSlide);
            }

            if (nextButton) {
                nextButton.addEventListener('click', nextSlide);
            }

            if (pauseButton) {
                pauseButton.addEventListener('click', pauseCarousel);
            }

            if (playButton) {
                playButton.addEventListener('click', resumeCarousel);
            }
        });
    </script>
</body>

</html>