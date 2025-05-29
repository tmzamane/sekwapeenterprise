<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial Section 3 (Improved)</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .testimonial-section.style-3 {
            padding: 60px 20px;
            text-align: center;
            background-color: #f9f9f9;
            position: relative;
            overflow: visible;
        }


        .testimonial-section.style-3 .testimonial-grid {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: stretch;
            margin-top: 30px;
            padding: 0 10px;
            position: relative;
            z-index: 2;
        }

        .testimonial-section.style-3 .testimonial-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            border: none;
            border-left: 4px solid #ad471d;
            width: 300px;
            height: 250px;
            box-sizing: border-box;
            position: relative;
            z-index: 2;
        }

        .testimonial-section.style-3 .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .testimonial-section.style-3 .testimonial-content {
            font-size: 1em;
            line-height: 1.5;
            color: #555;
            margin-bottom: 20px;
            font-style: italic;
            text-align: center;
            font-family: 'Times New Roman', serif;
            font-weight: 700;
        }

        .testimonial-section.style-3 .testimonial-author {
            font-size: 1.1em;
            font-weight: bold;
            color: #222;
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .testimonial-section.style-3 .testimonial-author span {
            display: block;
            font-size: 0.8em;
            font-style: normal;
            color: #666;
            text-align: center;
            margin-top: -5px;
            /* Add negative margin to overlap */
        }

        @media (max-width: 768px) {
            .testimonial-section.style-3 .testimonial-grid {
                flex-direction: column;
                align-items: center;
            }

            .testimonial-section.style-3 .testimonial-card {
                width: 90%;
                max-width: 350px;
                margin-bottom: 20px;
            }
        }

        /* SVG Styling */
        .svg-container {
            position: absolute;
            top: auto;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            overflow: visible;
            pointer-events: none;
            z-index: 1;
            transform: rotate(0deg);
        }

        .collapsing-svg {
            width: 100%;
            height: auto;
            display: block;
        }

        @keyframes collapse {
            from {
                height: 150px;
            }

            to {
                height: 0;
            }
        }

        .collapse-animation {
            animation: collapse 0.8s ease-in-out forwards;
        }
    </style>
</head>

<body>
    <section class="testimonial-section style-3">
        <div class="svg-container">
            <svg class="collapsing-svg" viewBox="0 0 1920 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0C376.333 113.333 542.667 56.6665 960 56.6665C1377.33 56.6665 1543.67 113.333 1920 0V200H0V0Z" fill="#AD471D" />
            </svg>
        </div>
        <div class="sub-heading" data-aos="hit" data-aos-delay="100" data-aos-duration="1000">What Our Clients Say</div>
        <div class="heading" data-aos="buzz" data-aos-delay="200" data-aos-duration="1000">Hear from our satisfied customers</div>
        <div class="testimonial-grid">
            <div class="testimonial-card" data-aos="hit" data-aos-delay="300" data-aos-duration="1000">
                <p class="testimonial-content" data-aos="fade-in" data-aos-delay="300" data-aos-duration="1000">"Their strategic thinking and execution are truly amazing. They helped us achieve significant growth and success. A valuable partner!"</p>
                <p class="testimonial-author" data-aos="fade-in" data-aos-delay="300" data-aos-duration="1000">Lerato Malatsi <span>VP of Sales</span></p>
            </div>
            <div class="testimonial-card" data-aos="buzz" data-aos-delay="400" data-aos-duration="1200">
                <p class="testimonial-content" data-aos="fade-in" data-aos-delay="400" data-aos-duration="1200">"We are impressed with the results. Their team is talented and dedicated to delivering excellence. An amazing experience!"</p>
                <p class="testimonial-author" data-aos="fade-in" data-aos-delay="400" data-aos-duration="1200">Katlego Mokoena <span>Head of Marketing</span></p>
            </div>
            <div class="testimonial-card" data-aos="hit" data-aos-delay="500" data-aos-duration="1400">
                <p class="testimonial-content" data-aos="fade-in" data-aos-delay="500" data-aos-duration="1400">"The level of service and support we received was outstanding. They consistently went the extra mile. Amazing results, amazing team!"</p>
                <p class="testimonial-author" data-aos="fade-in" data-aos-delay="500" data-aos-duration="1400">Brian Wilson <span>Operations Manager</span></p>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Prevents animation from replaying on subsequent scrolls
            offset: 100, // Delays the animation by 100ms
        });
    </script>
</body>

</html>