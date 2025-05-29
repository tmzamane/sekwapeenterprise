<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .modern-marquee-pause .marquee-container.pause-on-hover {
            overflow: hidden;
            white-space: nowrap;
            padding: 30px 10px;
            /* Increased padding */
            margin-top: 20px;
            /* Optional background */
        }

        .modern-marquee-pause .marquee-content {
            display: inline-block;
            padding-left: 100%;
            /* Start off-screen */
            animation: marquee-pause 15s linear infinite;

        }

        .modern-marquee-pause .marquee-container.pause-on-hover:hover .marquee-content {
            animation-play-state: paused;
        }

        .modern-marquee-pause .partner-logo {
            display: inline-block;
            margin-right: 50px;
            /* Increased spacing */
            opacity: 0.7;
            transition: opacity 0.3s ease-in-out;

        }

        .modern-marquee-pause .partner-logo:hover {
            opacity: 1;
        }

        .modern-marquee-pause .partner-logo img {
            height: 60px;
            /* Increased logo height */
            vertical-align: middle;
        }

        @keyframes marquee-pause {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>
    <div class="partners-section modern-marquee-pause">
        <div class="sub-heading">Empowering Each Other</div>
        <div class="heading">Our Trusted Partners</div>
        <div class="marquee-container pause-on-hover">
            <div class="marquee-content">
                <div class="partner-logo"><img src="images/nexus.png" alt="Nexus"></div>
                <div class="partner-logo"><img src="images/olebelo.png" alt="Olebelo"></div>
                <div class="partner-logo"><img src="images/reynolds.png" alt="Reynolds"></div>
                <div class="partner-logo"><img src="images/tourvest.png" alt="Tourvest"></div>
                <div class="partner-logo"><img src="images/undoc.png" alt="Undoc"></div>
                <div class="partner-logo"><img src="images/nexus.png" alt="Nexus"></div>
                <div class="partner-logo"><img src="images/olebelo.png" alt="Olebelo"></div>
                <div class="partner-logo"><img src="images/reynolds.png" alt="Reynolds"></div>
                <div class="partner-logo"><img src="images/tourvest.png" alt="Tourvest"></div>
                <div class="partner-logo"><img src="images/undoc.png" alt="Undoc"></div>
                <div class="partner-logo"><img src="images/nexus.png" alt="Nexus"></div>
                <div class="partner-logo"><img src="images/olebelo.png" alt="Olebelo"></div>
                <div class="partner-logo"><img src="images/reynolds.png" alt="Reynolds"></div>
                <div class="partner-logo"><img src="images/tourvest.png" alt="Tourvest"></div>
                <div class="partner-logo"><img src="images/undoc.png" alt="Undoc"></div>
            </div>
        </div>
    </div>
</body>


</html>