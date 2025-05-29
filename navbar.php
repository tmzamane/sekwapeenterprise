<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Animated Navbar</title>
    <style>
        body {
            overflow-x: hidden;
        }

        /* Topbar Styles */
        .top-header {
            background-color: #AD471D;
            color: white;
            padding: 0.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 12;
        }

        .top-header.top-header-hidden {
            transform: translateY(-100%);
        }

        .top-header a {
            color: white;
            text-decoration: none;
            width: 25px;
            height: 25px;
        }

        .top-header a:hover {
            color: #AD471D;
            text-decoration: none;
            background-color: #ffffff;
            border-radius: 5px;
            width: 25px;
            height: 25px;
        }

        .top-header.top-bar-black {
            background-color: black !important;
            color: white !important;
        }

        .top-header.top-bar-black a {
            color: white !important;
            width: 25px;
            height: 25px;
        }

        .top-header.top-bar-black a:hover {
            color: #AD471D !important;
        }


        .top-header.top-bar-black-with-divider {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            /* Light grey divider */
        }

        /* Dropdown Link Hover Effects (already present, but let's emphasize) */
        .dropdown-content a:hover {
            /* Keep black background */
            color: #AD471D !important;
            /* Keep primary text color */
        }

        /* Hamburger Icon Hover Effect (subtle) */
        .nav-toggle-button:hover div {
            background-color: #AD471D;
            /* Change the lines to your primary color on hover */
        }

        /* Navbar styles */
        .main-navbar {
            height: 6rem;
            width: 100vw;
            background-color: white;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            z-index: 10;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
            position: fixed;
            top: 38px;
            /* Adjust top to account for topbar height */
            left: 0;
        }

        .navbar-hidden {
            transform: translateY(-135%);
            transition: transform 0.3s ease-in-out;
            position: fixed;
            top: 38px;
            /* Ensure it's positioned correctly when hidden */
            left: 0;
            width: 100%;
            /* Ensure it spans the full width */
        }

        .navbar-black-on-scroll {
            background-color: black;
            top: 38px;
            /* Adjust top to account for topbar height */
        }

        .navbar-black-on-scroll .nav-menu-links li a {
            color: white;
        }

        .navbar-black-on-scroll .nav-menu-links li a:hover {
            color: #AD471D;
        }

        .navbar-black-on-scroll .nav-toggle-button div {
            background: white;
        }

        .navbar-black-on-scroll .dropdown-content {
            background-color: black !important;
        }

        .navbar-black-on-scroll .dropdown-content a {
            color: white !important;
        }

        .navbar-black-on-scroll .dropdown-content a:hover {
            color: #AD471D !important;
        }

        /* Styling logo */
        .logo-container {
            padding: 1vh 1vw;
            text-align: center;
        }

        .logo-container img {
            height: 45px;
            width: 125px;
        }

        /* Styling Links */
        .nav-menu-links {
            display: flex;
            list-style: none;
            width: 88vw;
            padding: 0 0.7vw;
            justify-content: space-evenly;
            align-items: center;
            text-transform: uppercase;
        }

        .nav-menu-links li a {
            text-decoration: none;
            margin: 0 0.7vw;
            color: #000000;
            font-weight: 550;
            text-transform: none;
        }

        .nav-menu-links li a:hover {
            text-decoration: none;
            margin: 0 0.7vw;
            color: #AD471D;
            font-weight: 550;
            text-transform: none;
        }

        .nav-menu-links li {
            position: relative;
        }

        .nav-menu-links li a::before {
            content: "";
            display: block;
            height: 3px;
            width: 0%;
            position: absolute;
            transition: all ease-in-out 250ms;
            margin: 0 0 0 10%;
        }

        /* Styling Hamburger Icon */
        .nav-toggle-button {
            display: none;
            cursor: pointer;
            padding: 10px;
            position: relative;
            z-index: 2;
        }

        .nav-toggle-button div {
            width: 30px;
            height: 3px;
            background: #000000;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .nav-toggle-button::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 200px;
            height: auto;
            max-height: 500px;
            overflow-y: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            top: 100%;
            left: -1rem;
            margin-top: 0rem;
            padding-top: 0rem;
            pointer-events: auto;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            /* Add transition */
        }

        .dropdown-content a {
            color: black;
            padding: 5px 5px;
            text-decoration: none;
            display: block;
            white-space: nowrap;
            /* Added background transition */
        }

        .dropdown-content a:hover {
            color: #AD471D !important;
            /* #AD471D hover text color */
        }

        .dropdown:hover .dropdown-content {
            display: block;
            pointer-events: auto;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .dropdown-toggle i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
            transform: rotate(0deg);
        }

        /* Stying for small screens */
        @media screen and (max-width: 800px) {
            .nav-menu-links.open .dropdown-open~.nav-menu-item {
                /* Hide the menu items below the open dropdown */
                display: none;
            }

            .nav-menu-links.open .dropdown-open .dropdown-content {
                display: block !important;
                /* Ensure dropdown is visible */
                position: relative;
                /* Position relative to its parent <li> */
                top: 0;
                /* Reset top positioning */
                left: 0;
                /* Reset left positioning */
                width: 100%;
                background-color: inherit;
                /* Inherit background from .nav-menu-links */
                border-radius: 0;
                box-shadow: none;
                margin-top: 0;
                padding-top: 0;
                z-index: 11;
            }

            .nav-menu-links.open .dropdown-open .dropdown-content a {
                color: inherit;
                /* Inherit text color */
                padding: 0.5rem 1rem;
                display: block;
                width: 100%;
                text-align: left;
                transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
            }

            .main-navbar {
                position: fixed;
                z-index: 10;
                top: 38px;

                /* Adjust top to account for topbar height */
            }

            .nav-toggle-button {
                display: block;
                position: absolute;
                right: 5%;
                top: 55%;
                transform: translate(-5%, -50%);
                z-index: 2;
            }

            .nav-menu-links {
                position: fixed;
                background: white;
                height: calc(100vh - 38px);
                /* Adjust height to account for topbar */
                width: 100%;
                flex-direction: column;
                clip-path: circle(50px at 90% -20%);
                -webkit-clip-path: circle(50px at 90% -10%);
                transition: all 1s ease-out;
                pointer-events: none;
                top: 38px;
                /* Adjust top to account for topbar height */
                align-items: flex-start;
            }


            .nav-menu-links.open {
                clip-path: circle(1000px at 50% 50%);
                -webkit-clip-path: circle(1000px at 50% 50%);
                pointer-events: all;
                background-color: black;
                /* Set background to black when open */
            }

            .nav-menu-item {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.3s ease, transform 0.3s ease;
            }

            .nav-menu-links.open .nav-menu-item {
                opacity: 1;
                transform: translateY(0);

            }

            .nav-menu-item:nth-child(1) {
                transition-delay: 0.2s;
            }

            .nav-menu-item:nth-child(2) {
                transition-delay: 0.4s;
            }

            .nav-menu-item:nth-child(3) {
                transition-delay: 0.6s;
            }

            .nav-menu-item:nth-child(4) {
                transition-delay: 0.7s;
            }

            .nav-menu-item:nth-child(5) {
                transition-delay: 0.8s;
            }

            .nav-menu-item:nth-child(6) {
                transition-delay: 0.9s;
                margin: 0;
            }

            .nav-menu-item:nth-child(7) {
                transition-delay: 1s;
                margin: 0;
            }


            .nav-menu-links li a:hover::before {
                width: 100%;
            }


            @media screen and (max-width: 800px) {
                .nav-menu-links.open .nav-menu-item a {
                    color: inherit;
                    /* Inherit text color */
                    padding: 0.5rem 1rem;
                    display: block;
                    width: 100%;
                    text-align: left;
                    transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
                }

                .nav-menu-links.open .nav-menu-item a:hover {
                    color: #AD471D !important;
                }

                .nav-menu-links.open .dropdown-open .dropdown-content {
                    display: block !important;
                    /* Ensure dropdown is visible */
                    position: relative;
                    /* Position relative to its parent <li> */
                    top: 0;
                    /* Reset top positioning */
                    left: 0;
                    /* Reset left positioning */
                    width: 100%;
                    background-color: inherit;
                    /* Inherit background from .nav-menu-links */
                    border-radius: 0;
                    box-shadow: none;
                    margin-top: 0;
                    padding-top: 0;
                    z-index: 11;
                }

                .nav-menu-links.open .dropdown-content {
                    display: block;
                    /* Ensure it's visible when the main menu is open */
                }

                .nav-menu-links li:last-child a {
                    /* Or your specific booking button selector */
                    border: 2px solid #AD471D;
                    padding: 0.5em 1em;
                    border-radius: 5px;
                    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4);
                    /* More pronounced shadow */
                    transition: box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out, color 0.3s ease-in-out;
                    /* Added transition for shadow */
                }

                .nav-menu-links li:last-child a:hover {
                    background-color: #AD471D;
                    color: white;
                    box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.5);
                    /* Even stronger shadow on hover */
                }

                .dropdown-content.dropdown-black {
                    background-color: black !important;
                }

                .dropdown-content.dropdown-black a {
                    color: white !important;
                }

                .dropdown-content.dropdown-black a:hover {
                    background-color: black !important;
                    color: #AD471D !important;
                }

                .dropdown-content a {
                    color: #ffffff;
                    padding: 0.5rem 1rem;
                    display: block;
                    width: 100%;
                    text-align: left;
                    transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
                }

                .dropdown-content a:hover {
                    color: #AD471D !important;
                }

                .dropdown:hover .dropdown-content {
                    display: none !important;
                    /* Prevent hover behavior in mobile view */
                }

                .nav-menu-links.open .dropdown:hover .dropdown-content {
                    display: block !important;
                    /* Show dropdown when parent is hovered and main menu is open */
                }

                .dropdown-toggle {
                    color: #ffffff;
                    display: flex;
                    /* Ensure icon is aligned */
                    width: 100%;
                    /* Make the toggle full width */
                    padding: 0.5rem 0;
                    /* Add some padding */
                    justify-content: space-between;
                    /* Space out text and icon */
                    align-items: center;
                }

                .dropdown-toggle i {
                    margin-left: auto;
                    /* Push icon to the right */
                }

            }

        }

        @media screen and (max-width: 504px) {
            .main-navbar {
                position: fixed;
                z-index: 10;
                top: 38px;
                margin: 22px 0;
                /* Adjust top to account for topbar height */
            }
        }

        /* Animating Hamburger Icon on Click */
        .toggle .line1 {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle .line2 {
            transition: all 0.7s ease;
            width: 0;
        }

        .toggle .line3 {
            transform: rotate(45deg) translate(-5px, -6px);
        }
        .sekwape-whatsapp-link-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .sekwape-whatsapp-icon {
            width: 40px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .sekwape-whatsapp-link-container.hidden {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
    </style>
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 font-inter">
    <header>
        <div class="top-header bg-[#AD471D] text-white py-2 px-4 flex justify-between items-center flex-wrap">
            <div class="social-icons flex space-x-4">
                <a href="#" target="blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/info_sekwape" target="blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/sekwapeenterprise/" target="blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/sekwape-enterprise-ba06a5361" target="blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="contact-info flex space-x-6 flex-wrap justify-center">
                <span class="text-sm"><i class="fas fa-envelope mr-2"></i>info@sekwapeenterprise.co.za</span>
                <span class="text-sm"><i class="fas fa-phone mr-2"></i>066 1694 918 / 012 8850 188</span>
            </div>
                   <div class="sekwape-whatsapp-link-container">
            <a href="https://wa.me/+2761694918" target="_blank">
                <img src="images/whatsappImage.png" alt="WhatsApp Chat" class="sekwape-whatsapp-icon">
            </a>
        </div>
        </div>
    </header>
    <nav class="main-navbar">
        <div class="logo-container">
            <a href="index.php"><img src="images/logo2.png" alt="Logo Image" id="navbarLogo"></a>
        </div>
        <div class="nav-toggle-button">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-menu-links">
            <li class="nav-menu-item"><a href="index.php">Home</a></li>
            <li class="nav-menu-item"><a href="about_us.php">About Us</a></li>
            <li class="nav-menu-item dropdown">
                <a href="#" class="dropdown-toggle">Services <i class="fas fa-chevron-down"></i></a>
                <div class="dropdown-content">
                    <a href="shuttle-services.php">Shuttle Services</a>
                    <a href="courier-services.php">Courier Services</a>
                    <a href="waste-management-services.php">Waste Management</a>
                    <a href="hygiene-services.php">Hygiene Services</a>
                    <a href="security-solutions-services.php">Security Solutions</a>
                </div>
            </li>
            <li class="nav-menu-item"><a href="index.php#rates">View Rates</a></li>
            <li class="nav-menu-item"><a href="quote.php">Quote</a></li>
            <li class="nav-menu-item"><a href="contact_us.php">Contact Us</a></li>
            <li class="nav-menu-item"><a href="index.php#booking-section">Bookings</a></li>
        </ul>
    </nav>
    <section class="black-background" style="height: 11vh;"></section>
    <script>
        const navToggleButton = document.querySelector(".nav-toggle-button");
        const navMenuLinks = document.querySelector(".nav-menu-links");
        const navMenuItems = document.querySelectorAll(".nav-menu-item");
        const dropdownToggle = document.querySelector(".dropdown-toggle");
        const dropdownContent = document.querySelector(".dropdown-content");
        const navbar = document.querySelector('.main-navbar');
        const blackBackgroundSection = document.querySelector('.black-background');
        const topHeader = document.querySelector('.top-header'); // Get the topbar element
        const navbarLogo = document.getElementById('navbarLogo'); // Get the logo image

        navToggleButton.addEventListener('click', () => {
            navMenuLinks.classList.toggle("open");
            navMenuItems.forEach(item => {
                item.classList.toggle("fade");
            });
            navToggleButton.classList.toggle("toggle");
            // Update styles for open state when navbar is black
            if (navbar.classList.contains('navbar-black-on-scroll')) {
                navMenuLinks.style.backgroundColor = 'black';
                navMenuLinks.querySelectorAll('a').forEach(link => {
                    link.style.color = 'white';
                });
            } else {
                navMenuLinks.style.backgroundColor = 'white';
                navMenuLinks.querySelectorAll('a').forEach(link => {
                    link.style.color = 'black';
                });
            }
        });

         document.addEventListener('DOMContentLoaded', function() {
            const whatsappLinkContainer = document.querySelector('.sekwape-whatsapp-link-container');
            let timeoutId;

            function hideOnScroll() {
                whatsappLinkContainer.classList.add('hidden');
            }

            function showAfterScrollStop() {
                whatsappLinkContainer.classList.remove('hidden');
            }

            window.addEventListener('scroll', function() {
                hideOnScroll();

                // Clear any previous timeout
                clearTimeout(timeoutId);

                // Set a new timeout to show the button after scrolling stops for a bit
                timeoutId = setTimeout(showAfterScrollStop, 300); // Adjust the delay (in milliseconds) as needed
            });
        });

        // Close dropdown when clicking outside, excluding clicks within the dropdown content
        document.addEventListener('click', (e) => {
            const dropdowns = document.querySelectorAll('.dropdown-content');
            let target = e.target;
            let isDropdownClick = false;

            // Check if the clicked element is within any dropdown or its toggle
            dropdowns.forEach(dropdown => {
                if (dropdown.contains(target) || (dropdownToggle && dropdownToggle.contains(target))) {
                    isDropdownClick = true;
                }
            });

            if (!isDropdownClick) {
                dropdowns.forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
                if (dropdownToggle) {
                    dropdownToggle.querySelector('i').style.transform = 'rotate(0deg)';
                }
            }
        });

        // Prevent dropdown from closing when clicking inside the dropdown content
        if (dropdownContent) {
            dropdownContent.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        // Rotate dropdown arrow on click
        const dropdownParentLi = dropdownToggle ? dropdownToggle.closest('.nav-menu-item') : null; // Get the parent <li>

        if (dropdownToggle) {
            dropdownToggle.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior if it's an <a> tag
                const icon = dropdownToggle.querySelector('i');
                icon.style.transform = icon.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                if (dropdownParentLi) {
                    dropdownParentLi.classList.toggle('dropdown-open'); // Toggle a class on the parent <li>
                }
            });
        }

        window.addEventListener('scroll', () => {
            const blackBackgroundBottom = blackBackgroundSection.offsetTop + blackBackgroundSection.offsetHeight;
            const scrollPosition = window.scrollY;

            if (scrollPosition >= blackBackgroundBottom) {
                navbar.classList.remove('navbar-hidden');
                navbar.classList.add('navbar-black-on-scroll');
                if (topHeader) {
                    topHeader.classList.remove('top-header-hidden');
                    topHeader.classList.add('top-bar-black');
                    topHeader.classList.add('top-bar-black-with-divider'); // Add divider class
                }
                if (navbarLogo) {
                    navbarLogo.src = 'images/logo1.png'; // Change logo
                }
                if (dropdownContent) {
                    dropdownContent.classList.add('dropdown-black'); // Add black dropdown class
                }
                // If hamburger menu is open and navbar is black, ensure its styles are black and white
                if (navMenuLinks.classList.contains('open')) {
                    navMenuLinks.style.backgroundColor = 'black';
                    navMenuLinks.querySelectorAll('a').forEach(link => {
                        link.style.color = 'white';
                    });
                }
            } else {
                if (scrollPosition === 0) {
                    navbar.classList.remove('navbar-hidden');
                    navbar.classList.remove('navbar-black-on-scroll');
                    if (topHeader) {
                        topHeader.classList.remove('top-header-hidden');
                        topHeader.classList.remove('top-bar-black');
                        topHeader.classList.remove('top-bar-black-with-divider'); // Remove divider class
                    }
                    if (navbarLogo) {
                        navbarLogo.src = 'images/logo2.png'; // Revert logo
                    }
                    if (dropdownContent) {
                        dropdownContent.classList.remove('dropdown-black'); // Remove black dropdown class
                    }
                    // If hamburger menu is open and navbar is white, ensure its styles are white and black
                    if (navMenuLinks.classList.contains('open')) {
                        navMenuLinks.style.backgroundColor = 'white';
                        navMenuLinks.querySelectorAll('a').forEach(link => {
                            link.style.color = 'black';
                        });
                    }
                } else {
                    navbar.classList.add('navbar-hidden');
                    navbar.classList.remove('navbar-black-on-scroll');
                    if (topHeader) {
                        topHeader.classList.add('top-header-hidden');
                        topHeader.classList.remove('top-bar-black');
                        topHeader.classList.remove('top-bar-black-with-divider'); // Remove divider class
                    }
                    if (navbarLogo) {
                        navbarLogo.src = 'images/logo2.png'; // Revert logo
                    }
                    if (dropdownContent) {
                        dropdownContent.classList.remove('dropdown-black'); // Remove black dropdown class
                    }
                    // If hamburger menu is open and navbar is hidden, ensure its styles are white and black (default)
                    if (navMenuLinks.classList.contains('open')) {
                        navMenuLinks.style.backgroundColor = 'white';
                        navMenuLinks.querySelectorAll('a').forEach(link => {
                            link.style.color = 'black';
                        });
                    }
                }
            }
        });
    </script>
</body>

</html>