<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us -Sekwape Enterprise - Our Story, Team, & Values</title>

    <meta name="description" content="Learn about the journey of Sekwape Enterprise, our team, our dedicated team of experts, and the core values that drive our commitment to exceptional service and client relationships. Discover our streamlined process and company culture.">
    <meta name="keywords" content="About Sekwape Enterprise, Our Story, Team, Dedicated Team, Core Values, Commitment to Excellence, Client Relationships, Streamlined Process, Company Culture ">
    <meta name="author" content="Sekwape Enterprise">

    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
    :root {
        --primary-color: #ad471d;
        --secondary-color: #f0f0f0;
        --text-color: #333;
        --white-color: #fff;
        --light-orange: #faeee6;
        --light-gray: #f0f0f0;
        --white-off: #fffafa;
        --dark-text: #222;
        --font-family: 'Work Sans', sans-serif;
        --default-padding: 20px;
        --default-margin: 20px;
        --heading-font-weight: 800;
        --subheading-font-weight: 500;
        --transition-duration: 0.3s;
        --border-radius: 10px;
        --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        --light-gray-rgb: 240, 240, 240;
        /* Merged from the second :root block */
    }

    * body {
        font-family: var(--font-family);
        margin: 0;
        padding: 0;
        color: var(--text-color);
        line-height: 1.7;
        overflow-x: hidden;
        /* Prevent horizontal scroll for parallax */
        background: linear-gradient(to bottom right, #f4f4f4, #ffffff);
        animation: gradientShift 5s ease-in-out infinite alternate;
        background-size: 200% 200%;
        scroll-behavior: smooth; /* Added smooth scrolling */
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: var(--default-padding);
    }

    .section {
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        background-color: var(--white-color); /* Default background */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .section:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .section.layered-bg {
        background-image: linear-gradient(rgba(240, 240, 240, 0.2), rgba(240, 240, 240, 0.2)); /* Subtle light gray overlay */
    }

    .heading {
        font-size: 44px;
        font-family: "Work Sans", sans serif;
        font-weight: 800;
        padding: 10px 0;
        text-align: center;
    }

    .sub-heading {
        color: #ad471d;
        font-weight: 700;
        text-align: center;
    }

    .paragraph-text {
        text-align: left;
        margin-bottom: var(--default-margin);
        font-size: 1.1em;
        color: var(--text-color);
    }

    .header-section {
        position: relative; /* For overlay positioning */
        overflow: hidden; /* Clip the overlay */
        padding: 100px 0;
        text-align: center;
        color: var(--white-color);
        background-blend-mode: multiply;
        background-color: rgba(0, 0, 0, 0.4);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-attachment: fixed;
        /* Keep the parallax effect */
        background-image: linear-gradient(45deg, #ad471d, black, #f0f0f0, #ad471d, black);
        background-size: 300% 300%;
        animation: gradientAnimation 10s ease infinite;
    }

    .header-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.1); /* Subtle dark overlay */
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .header-section:hover .header-overlay {
        opacity: 1;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .header-section h1 {
        font-size: 3.5em;
        font-weight: var(--heading-font-weight);
        margin-bottom: 20px;
    }

    .header-section p {
        font-size: 1.3em;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.8;
        color: var(--white-off);
    }
     @media ( max-width: 1278px) {
        .header-section h1 {
            line-height:  50px;
            
        }
        .heading {
            line-height: 40px;
            top:50px;
        }

     }
    .journey-path {
        position: relative;
        /* Needed for absolute positioning of the line */
        width: 100% !important;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 20px 0 220px;
        box-sizing: border-box;
        display: flex;
        /* To help center the line vertically */
        align-items: center;
        /* Center the line */
    }

    .timeline-line {
        position: absolute;
        margin: 0 0 18px 0;
        /* Center vertically */
        left: 20px;
        /* Start with some left margin */
        right: 20px;
        /* End with some right margin */
        height: 2px;
        /* Adjust thickness of the line */
        background-color: #ccc;
        /* Color of the line */
        z-index: 0;
        /* Ensure it's behind the buttons (default stacking order) */
        transform: translateY(-50%);
        /* Fine-tune vertical centering */
        width: 0%; /* Start with zero width */
        animation: growTimeline 1.5s ease-out forwards 0.5s; /* Animate after a slight delay */
    }

    @keyframes growTimeline {
        to {
            width: calc(100% - 40px); /* Grow to full width minus margins */
        }
    }

    .second-timeline-line {
        position: absolute;
        margin: 0 0 50px 0;
        /* Center vertically */
        height: 2px;
        /* Adjust thickness of the line */
        background-color: red;
        /* Color of the line */
        z-index: 0;
        /* Ensure it's behind the buttons (default stacking order) */
        transform: translateY(-50%);
        /* Fine-tune vertical centering */
    }

    .journey-milestone {
        text-align: center;
        position: relative !important;
        left: auto !important;
    }

    .milestones-wrapper {
        display: flex;
        flex-direction: row !important;
        /* Force horizontal on larger screens */
        justify-content: space-around;
        align-items: center;
        padding: 0 20px;
        gap: 20px;
        width: 100%;
        box-sizing: border-box;
    }

    .milestone-icon {
        background-image: radial-gradient(circle at 20% 20%, #eee, #bbb),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0.1));
        background-blend-mode: overlay;
        color: var(--dark-text, #222);
        border: 1px solid #aaa;
        border-radius: 20%;
        width: 55px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        margin: 0 auto 10px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2),
            inset 0px 0px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Added box-shadow transition */
        font-size: 12px;
    }

    .milestone-icon:hover {
        transform: scale(1.1);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3), inset 0px 0px 5px rgba(0, 0, 0, 0.1); /* Enhanced shadow on hover */
    }

    .milestone-label {
        font-size: 15.5px;
        color: var(--dark-text);
    }

    .milestone-popup {
        position: absolute;
        background-color: var(--white-color);
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: var(--box-shadow);
        padding: 15px;
        z-index: 10;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
        width: 250px;
        text-align: left;
        top: 110px;
        /* Adjust this value as needed to position below the buttons */
        left: 50%;
        transform: translateX(-50%);
    }

    .milestone-popup.show {
        opacity: 1;
        visibility: visible;
    }

    /* ... other styles remain the same ... */
    .milestone-popup h4 {
        color: var(--primary-color);
        font-size: 1.1em;
        margin-bottom: 5px;
    }

    .milestone-popup p {
        color: var(--text-color);
        font-size: 0.9em;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .milestone-popup .close-button {
        position: absolute;
        top: 5px;
        right: 5px;
        background: none;
        border: none;
        color: #777;
        cursor: pointer;
        font-size: 1em;
    }

    .milestone-popup .close-button:hover {
        color: var(--primary-color);
    }

    @media (max-width: 512px) {
        .milestones-wrapper {
            justify-content: center !important;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .journey-milestone {
            width: calc(30% - 10px);
            margin-bottom: 25px;
            /* Increased margin to accommodate connector */
            padding-bottom: 15px;
            /* Space for the connector */
            position: relative;
            /* For positioning the pseudo-element */
        }

        .journey-milestone::after {
            content: '';
            position: absolute;
            left: 50%;
            top: calc(100% + 2px);
            bottom: -10px;
            /* Adjust the length of the connector */
            width: 2px;
            background-color: #ccc;
            transform: translateX(-50%);
            z-index: -1;
        }

        .journey-milestone:last-child::after {
            display: none;
        }

        .milestone-popup {
            position: absolute;
            background-color: var(--white-color);
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            padding: 15px;
            z-index: 10;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            width: 250px;
            text-align: left;
            top: 250px;
            left: 50%;
            transform: translateX(-50%);
        }
    }

    .belief-tabs {
        display: flex;
        /* Enable Flexbox for the container */
        justify-content: center;
        /* Center the tab buttons horizontally */
        align-items: center;
        /* Vertically align items if needed */
        gap: 40px;
        /* Adjust the spacing between the buttons as needed */
        width: 100%;
        /* Make sure it takes the full width of its parent */
        margin-top: 20px;
        /* Add some space below the "What Guides Us" heading */
    }

    .tab-button {
        display: flex;
        /* Enable Flexbox for the button content */
        flex-direction: column;
        /* Stack icon and text vertically */
        align-items: center;
        /* Center icon and text horizontally within the button */
        text-align: center;
        /* Ensure text itself is centered */
        background: none;
        /* Remove default button background */
        border: none;
        /* Remove default button border */
        padding: 10px;
        /* Add some padding around the content */
        cursor: pointer;
        /* Indicate it's clickable */
    }

    .tab-icon {
        /* Styles for your SVG icons */
        width: 30px;
        /* Adjust icon size as needed */
        height: 30px;
        margin-bottom: 8px;
        /* Add some space between the icon and text */
    }

    .tab-text-fallback {
        /* Styles for your text */
        font-size: 1em;
        /* Adjust font size as needed */
        color: inherit;
        /* Inherit text color from parent */
    }

    .tab-text-fallback {
        font-size: 0.9rem;
        color: var(--text-color-light, #555);
    }


    /* Updated Styles to match Waste Management Section */
    .service-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        position: relative;
        /* For animated divider */
        overflow: hidden;
        /* For animated divider */
    }

    .service-content-wrapper {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
    }

    .service-content {
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .service-image-container {
        flex: 1;
        max-width: 50%;
        overflow: hidden;
        /* For image zoom */
    }

    .service-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
        display: block;
        /* Prevent extra space below image */
        transition: transform 0.5s ease-in-out;
        /* For image zoom */
    }

    .section-subtitle {
        color: #ad471d;
        font-size: 16px;
        font-weight: 500;
    }

    .section-title {
        color: #222;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .section-description {color: #555;
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
        text-align: left;
    }

    .section-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 10px;
        text-align: left;
    }

    .section-list li::before {
        content: "✓";
        color: #ad471d;
        margin-right: 10px;
        font-weight: bold;
    }

    .section-list li {
        font-weight: normal;
    }

    .section-list li>strong {
        font-weight: 600;
        color: #222;
    }

    .section-link {
        display: inline-block;
        color: #fff;
        background-color: #ad471d;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .section-link:hover {
        background-color: #8c3a17;
    }

    .animated-divider {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, transparent, #ad471d, transparent);
        animation: slideIn 3s ease-in-out infinite alternate;
    }

    @keyframes slideIn {
        0% {
            transform: translateX(-100%);
            opacity: 0.5;
        }

        100% {
            transform: translateX(100%);
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .service-content-wrapper {
            flex-direction: column;
            text-align: center;
        }

        .service-image-container {
            max-width: 80%;
            margin: 0 auto 20px;
        }

        .section-title {
            font-size: 22px;
        }

        .section-description,
        .section-list li {
            font-size: 15px;
            text-align: left;
        }
    }

    #example-2 {
        text-align: center;
    }

    #example-2 .tab-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    #example-2 .tab-button {
        background: none;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 1em;
        color: var(--text-color-light, #555);
        border-bottom: 2px solid transparent;
        transition: color 0.3s ease-in-out, border-bottom-color 0.3s ease-in-out;
    }

    #example-2 .tab-button.active {
        color: var(--primary-color, #ad471d);
        border-bottom: 3px solid var(--primary-color, #ad471d); /* Thicker active indicator */
        font-weight: 600; /* Make active text bolder */
    }

    #example-2 .tab-content {
        display: none;
        padding: 20px;
        border: 1px solid var(--light-gray, #ddd);
        border-radius: var(--border-radius, 8px);
        margin-bottom: 20px;
        text-align: left;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    #example-2 .tab-content.active {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .core-values-list {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        text-align: left;
    }

    .core-values-list li {
        padding: 15px;
        border: 1px solid var(--light-gray, #ddd);
        border-radius: var(--border-radius, 8px);
        background-color: var(--white-color, #fff);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.05);
    }

    .core-values-list li h4 {
        color: var(--primary-color, #ad471d);
        margin-top: 0;
        margin-bottom: 10px;
        font-weight: var(--subheading-font-weight, 500);
    }

    .core-values-list li p {
        color: var(--text-color-light, #555);
        line-height: 1.6;
        margin-bottom: 0;
    }

    .employee-profiles {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .employee-profile {
        background-color: var(--white-color, #fff);
        border-radius: var(--border-radius, 8px);
        box-shadow: var(--box-shadow);
        padding: 20px;
        text-align: center;
        transition: box-shadow 0.3s ease-in-out;
    }

    .employee-profile:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* More pronounced shadow on hover */
    }

    .employee-profile img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        transition: transform 0.3s ease-in-out;
    }

    .employee-profile:hover img {
        transform: scale(1.05);
    }

    .employee-profile h3 {
        color: var(--dark-text, #222);
        margin-top: 0;
        margin-bottom: 5px;
        font-weight: var(--heading-font-weight, 600);
        font-size: 1.5em;
    }

    .employee-profile p {
        color: var(--text-color-light, #555);
        margin-bottom: 10px;
        font-size: 0.95em;
    }

    .process-steps-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .process-step {
        background-color: var(--white-color, #fff);
        border-radius: var(--border-radius, 8px);
        box-shadow: var(--box-shadow);
        padding: 25px;
        text-align: left;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
        transition: background-color 0.3s ease-in-out;
    }

    .process-step:hover {
        background-color: var(--white-off); /* Slightly lighter background on hover */
    }

    .process-step-number {
        background-color: var(--primary-color, #ad471d);
        color: var(--white-color, #fff);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 1.2em;
        flex-shrink: 0;
        transform: scale(1);
        transition: transform 0.3s ease-out;
    }

    .process-step:hover .process-step-number {
        transform: scale(1.1);
    }

    .process-step-content {
        flex-grow: 1;
    }

    .process-step-content h4 {
        color: var(--dark-text, #222);
        margin-top: 0;
        margin-bottom: 10px;
        font-weight: var(--subheading-font-weight, 500);
    }

    .process-step-content p {
        color: var(--text-color-light, #555);
        line-height: 1.6;
        margin-bottom: 0;
    }

    .company-culture-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .culture-item {
        background-color: var(--white-color, #fff);
        border-radius: var(--border-radius, 8px);
        box-shadow: var(--box-shadow);
        padding: 20px;
        text-align: center;
    }

    .culture-item h4 {
        color: var(--primary-color, #ad471d);
        margin-top: 0;
        margin-bottom: 10px;
        font-weight: var(--subheading-font-weight, 500);
    }

    .culture-item p {
        color: var(--text-color-light, #555);
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      
        .paragraph-text {
            font-size: 1em;
        }

        .belief-tabs {
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .tab-button {
            width: 80%;
            padding: 15px;
            border-bottom: 1px solid var(--light-gray, #ddd);
            text-align: center;
        }

        .tab-button:last-child {
            border-bottom: none;
        }

        .tab-icon {
            margin-bottom: 5px;
        }

        #example-2 .tab-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        #example-2 .tab-button {
            padding: 15px;
            border-bottom: 1px solid var(--light-gray, #ddd);
            text-align: center;
        }

        #example-2 .tab-button:last-child {
            border-bottom: none;
        }

        .core-values-list {
            grid-template-columns: 1fr;
        }

        .employee-profiles {
            grid-template-columns: 1fr;
        }

        .process-steps-container {
            grid-template-columns: 1fr;
        }

        .process-step {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .process-step-number {
            margin-bottom: 15px;
        }

        .company-culture-grid {
            grid-template-columns: 1fr;
        }
    }


</style>
    <style>
        /* Additional styles that might have been separated */
        .accent-text {
            color: var(--primary-color);
            font-weight: bold;
        }
    </style>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "isPartOf": {
    "@type": "Organization",
    "name": "Sekwape Enterprise",
    "url": "https://sekwapeenterprise.co.za//",
    "logo": "https://https://sekwapeenterprise.co.za//images/logo2.png"
  },
  "name": "About Us - Sekwape Enterprise - Our Story, Team, & Values",
  "description": "Learn about the journey of Sekwape Enterprise, our team, our dedicated team of experts, and the core values that drive our commitment to exceptional service and client relationships. Discover our streamlined process and company culture."
}
</script>
</head>

<body>
    <?php include_once "navbar.php"; ?>

    <header class="header-section">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="800">About Sekwape Enterprise</h1>
            <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">Discover our journey, our values, and the dedicated team behind our commitment to excellence.</p>
        </div>

    </header>

    <main>
        <section class="section" id="example-1">
            <div class="container">
                <div class="journey-landing">
                    <div class="sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">Our Story</div>
                    <div class="heading" data-aos="zoom-in" data-aos-duration="800">Our Journey</div>
                    <p data-aos="fade" data-aos-duration="800" data-aos-delay="200">From our humble beginnings to becoming a trusted leader in the industry, our journey is defined by innovation, dedication, and a relentless pursuit of excellence.</p>
                </div>

                <div class="journey-path" data-aos="fade-up">
                    <div class="timeline-line"></div>
                    <div class="second-timeline-line"></div>

                    <div class="milestones-wrapper">
                        <div class="journey-milestone" style="left: 0;" data-aos="fade-right" data-aos-delay="0">
                            <div class="milestone-icon" data-tippy-content="Founded with a vision">2010</div>
                            <div class="milestone-label">Foundation</div>
                        </div>
                        <div class="journey-milestone" style="left: 25%;" data-aos="fade-left" data-aos-delay="100">
                            <div class="milestone-icon" data-tippy-content="First major partnership">2014</div>
                            <div class="milestone-label">Growth</div>
                        </div>
                        <div class="journey-milestone" style="left: 50%;" data-aos="fade-right" data-aos-delay="200">
                            <div class="milestone-icon" data-tippy-content="Expanded service offerings">2018</div>
                            <div class="milestone-label">Expansion</div>
                        </div>
                        <div class="journey-milestone" style="left: 75%;" data-aos="fade-left" data-aos-delay="300">
                            <div class="milestone-icon" data-tippy-content="Recognized as industry leader">2022</div>
                            <div class="milestone-label">Recognition</div>
                        </div>
                        <div class="journey-milestone" style="left: 100%;" data-aos="fade-right" data-aos-delay="400">
                            <div class="milestone-icon" data-tippy-content="Continuing to innovate and serve">Present</div>
                            <div class="milestone-label">Future</div>
                        </div>
                    </div>
                    <div id="milestone-popup-1" class="milestone-popup">
                        <h4>2010 - Foundation</h4>
                        <p>Sekwape Enterprise was founded with a vision to provide innovative and sustainable solutions.</p>
                        <button class="close-button" onclick="closePopup('milestone-popup-1')">×</button>
                    </div>
                    <div id="milestone-popup-2" class="milestone-popup">
                        <h4>2014 - Growth</h4>
                        <p>We secured our first major partnership, allowing us to expand our reach and impact.</p>
                        <button class="close-button" onclick="closePopup('milestone-popup-2')">×</button>
                    </div>
                    <div id="milestone-popup-3" class="milestone-popup">
                        <h4>2018 - Expansion</h4>
                        <p>We broadened our service offerings to meet the evolving needs of our clients.</p>
                        <button class="close-button" onclick="closePopup('milestone-popup-3')">×</button>
                    </div>
                    <div id="milestone-popup-4" class="milestone-popup">
                        <h4>2022 - Recognition</h4>
                        <p>We were recognized as an industry leader for our commitment to quality and innovation.</p>
                        <button class="close-button" onclick="closePopup('milestone-popup-4')">×</button>
                    </div>
                    <div id="milestone-popup-5" class="milestone-popup">
                        <h4>Present - Future</h4>
                        <p>We continue to innovate and serve our clients with dedication, looking forward to a bright future.</p>
                        <button class="close-button" onclick="closePopup('milestone-popup-5')">×</button>
                    </div>
                </div>
        </section>

        <section class="section" id="example-2">
            <div class="container">
                <div class="sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">Explore Our Beliefs</div>
                <div class="heading" data-aos="zoom-in" data-aos-duration="800">What Guides Us</div>
                <div class="belief-tabs">
                    <button class="tab-button active" onclick="openBelief(event, 'integrity')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-icon">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                        <span class="tab-text-fallback">Integrity</span> </button>
                    <button class="tab-button" onclick="openBelief(event, 'innovation')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-icon">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg>
                        <span class="tab-text-fallback">Innovation</span>
                    </button>
                    <button class="tab-button" onclick="openBelief(event, 'collaboration')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tab-icon">
                            <path d="M16 17c-2.828 2.828-7.07 2.828-9.899 0L9 15l7-7 2 2 1.414 1.414L16 17z"></path>
                            <path d="M8 7c2.828-2.828 7.07-2.828 9.899 0L15 9l-7 7-2-2L6.586 14.586 8 7z"></path>
                        </svg>
                        <span class="tab-text-fallback">Collaboration</span>
                    </button>
                </div>
                <div id="integrity" class="tab-content active" data-aos="fade" data-aos-duration="600" data-aos-delay="100">
                    <h3 class="pillar-title">Integrity Defines Us</h3>
                    <h4 class="pillar-subtitle">Our Unwavering Standard</h4>
                    <p class="pillar-text">We conduct our business with the highest ethical standards, ensuring transparency and trust in all our interactions.</p>
                    <div class="svg-container"><svg class="gradient-svg"></svg></div>
                </div>
                <div id="innovation" class="tab-content" data-aos="fade" data-aos-duration="600" data-aos-delay="100">
                    <h3 class="pillar-title">We Champion Innovation</h3>
                    <h4 class="pillar-subtitle">Driving Progress</h4>
                    <p class="pillar-text">We embrace new ideas and technologies to drive progress and deliver cutting-edge solutions to our clients.</p>
                    <div class="svg-container"><svg class="gradient-svg"></svg></div>
                </div>
                <div id="collaboration" class="tab-content" data-aos="fade" data-aos-duration="600" data-aos-delay="100">
                    <h3 class="pillar-title">We Value Collaboration</h3>
                    <h4 class="pillar-subtitle">Working Together</h4>
                    <p class="pillar-text">We foster a collaborative environment, both internally and with our partners, to achieve mutual success.</p>
                    <div class="svg-container"><svg class="gradient-svg"></svg></div>
                </div>


            </div>
        </section>


        <section class="section" id="example-4">
            <div class="container">
                <div class="welcome-message">
                    <div class="sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">Our People</div>
                    <div class="heading" data-aos="zoom-in" data-aos-duration="800">Meet Our Dedicated Team</div>
                    <p data-aos="fade" data-aos-duration="800" data-aos-delay="200">Our success is driven by the passion and expertise of our incredible team. We are committed to providing exceptional service and building lasting relationships with our clients.</p>
                </div>
                <div class="people-section">
                    <div class="sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="300">Leadership</div>
                    <div class="heading" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">Leadership</div>
                    <div class="employee-profiles">
                        <div class="employee-profile" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="600">
                            <img src="images/teammember3.png" alt="Lebogang - Operations Manager at Sekwape Enterprise">
                            <h3>Lebogang</h3>
                            <p>Operations Manager</p>
                        </div>
                        <div class="employee-profile" data-aos="zoom-in-down" data-aos-duration="800" data-aos-delay="800">
                            <img src="images/teammember.png" alt="Ncedi - Marketing Strategist at Sekwape Enterprise">
                            <h3>Ncedi</h3>
                            <p>Marketing Strategist</p>
                        </div>
                        <div class="employee-profile" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="1000">
                            <img src="images/teammember2.png" alt="Siya - Customer Support Specialist at Sekwape Enterprise">
                            <h3>Sandile</h3>
                            <p>Customer Support Specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="process-section">
            <div class="container">
                <div class="sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">Our Approach</div>
                <div class="heading" data-aos="zoom-in" data-aos-duration="800">Our Streamlined Process</div>
                <div class="process-step" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <div class="process-step-number">1</div>
                    <div class="process-step-content">
                        <h4>Understanding Your Needs</h4>
                        <p>We start by listening to you and understanding your specific requirements and goals.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-down" data-aos-duration="800" data-aos-delay="600">
                    <div class="process-step-number">2</div>
                    <div class="process-step-content">
                        <h4>Strategic Planning</h4>
                        <p>Our expert team develops a tailored strategy to address your needs effectively.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                    <div class="process-step-number">3</div>
                    <div class="process-step-content">
                        <h4>Execution & Implementation</h4>
                        <p>We meticulously execute the plan, ensuring attention to detail and quality at every stage.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-down" data-aos-duration="800" data-aos-delay="1000">
                    <div class="process-step-number">4</div>
                    <div class="process-step-content">
                        <h4>Review & Support</h4>
                        <p>We review the outcomes and provide ongoing support to ensure your continued success.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section culture-section">
            <div class="container">
                <div class="sub-heading culture-sub-heading top-sub-heading" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">Our Values</div>
                <div class="heading culture-heading" data-aos="zoom-in" data-aos-duration="800">Our Company Culture</div>
                <div class="culture-values">
                    <ul class="core-values-list">
                        <li data-aos="fade-up" data-aos-duration="600" data-aos-delay="400"><strong>Customer Focus:</strong> We prioritize our clients' needs above all else.</li>
                        <li data-aos="fade-down" data-aos-duration="600" data-aos-delay="500"><strong>Innovation:</strong> We continuously seek new and better ways to achieve our goals.</li>
                        <li data-aos="fade-up" data-aos-duration="600" data-aos-delay="600"><strong>Teamwork:</strong> We believe in the power of collaboration and mutual support.</li>
                        <li data-aos="fade-down" data-aos-duration="600" data-aos-delay="700"><strong>Excellence:</strong> We are committed to delivering the highest standards in everything we do.</li>
                        <li data-aos="fade-up" data-aos-duration="600" data-aos-delay="800"><strong>Integrity:</strong> We operate with honesty, transparency, and ethical practices.</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <?php include_once "testimonials.php"; ?>
    <?php include_once "partners.php"; ?>
    <?php include_once "footer.php"; ?>
    <script>
        function openBelief(evt, beliefName) {
            var i, tabcontent, tabbuttons;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].className = tabcontent[i].className.replace(" active", "");
            }
            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
            }
            document.getElementById(beliefName).className += " active";
            evt.currentTarget.className += " active";
            // Initialize AOS again to catch newly visible elements
            AOS.init();
        }

        // Initialize AOS on initial page load
        AOS.init();
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
        });

        document.addEventListener('DOMContentLoaded', function() {
            const milestoneIcons = document.querySelectorAll('.milestone-icon');
            const milestonePopups = document.querySelectorAll('.milestone-popup');
            const closeButtons = document.querySelectorAll('.milestone-popup .close-button');

            function closeAllPopups() {
                milestonePopups.forEach(popup => {
                    popup.classList.remove('show');
                });
            }

            milestoneIcons.forEach((icon, index) => {
                icon.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent click on icon from closing all popups immediately
                    closeAllPopups(); // Close any other open popups
                    const popupId = `milestone-popup-${index + 1}`;
                    const selectedPopup = document.getElementById(popupId);
                    if (selectedPopup) {
                        selectedPopup.classList.add('show');
                    }
                });
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent click on close button from triggering other events
                    const popup = this.closest('.milestone-popup');
                    if (popup) {
                        popup.classList.remove('show');
                    }
                });
            });

            // Close popup when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.milestone-popup') && !event.target.closest('.milestone-icon')) {
                    closeAllPopups();
                }
            });
        });

        function closePopup(popupId) {
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.classList.remove('show');
            }
        }
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
    </script>
</body>

</html>