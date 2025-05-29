<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rates</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Existing styles (from your previous code) */
        #rates-options {
            width: 95%;
            height: 55px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
            top: 12px;
        }

        #rates-options:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        #rates-option-content {
            margin-top: 35px;
            text-align: center;
        }

        div {
            text-align: center;
        }

        h2 {
            color: #AD471D;
        }

        .rates {
            background-color: #f0f0f0;
            padding: 50px 0;
            width: 100%;
            box-sizing: border-box;
            border: 0;
        }

        #rates {
            scroll-margin: 180px;
        }

        .location-label {
            font-weight: bold;
            color: black;
        }

        /* Styles for tables */
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            /* Clip rounded corners of the table */
        }

        table thead th {
            background-color: #f2f2f2;
            color: #333;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table td,
        table th {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        table tbody tr:last-child td {
            border-bottom: none;
            /* Remove border from the last row */
        }

        /* Responsive adjustments for tables */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                width: 100%;
            }

            table thead,
            table tbody tr {
                display: table-row;
            }

            table td,
            table th {
                display: table-cell;
                width: auto;
                min-width: 100px;
                /* Ensure columns have some minimum width */
            }

            table thead {
                display: none;
                /* Hide thead on small screens to save space */
            }

            table tr {
                margin-bottom: 10px;
                display: block;
                border-bottom: 1px solid #ddd;
            }

            table td:before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                color: #666;
            }

            table td:before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                color: #666;
            }
        }

        /* AOS Effects (Fade In/Out, Buzz, Hit) */
        [data-aos="fade-in"] {
            opacity: 0;
            transition-property: opacity;
        }

        [data-aos="fade-in"].aos-animate {
            opacity: 1;
        }

        [data-aos="fade-out"] {
            opacity: 1;
            transition-property: opacity;
        }

        [data-aos="fade-out"].aos-animate {
            opacity: 0;
        }

        [data-aos="buzz"] {
            transform: translateZ(0);
            transition-property: transform;
            transition-duration: 0.15s;
            transition-timing-function: ease-out;
        }

        [data-aos="buzz"].aos-animate {
            transform: translateX(8px) rotate(2deg) translateZ(0);
        }

        [data-aos="hit"] {
            opacity: 0;
            transform: scale(0.8);
            transition-property: opacity, transform;
        }

        [data-aos="hit"].aos-animate {
            opacity: 1;
            transform: scale(1);
        }
    </style>
</head>

<body>
    <div id="rates" class="rates">
        <h2 id="our-rates" data-aos="fade-down" data-aos-duration="1000">
            <span style="color: #AD471D; font-weight: bold;">Rates</span>
        </h2>
        <p data-aos="fade-up" data-aos-duration="1000">Select a location to view the rates for different services.</p>
        <label for="rates-options" class="location-label" data-aos="fade-in" data-aos-duration="1000">Choose Location:</label>
        <select id="rates-options" onchange="handleRatesOptionChange(this.value)" data-aos="fade-in" data-aos-duration="1000">
            <option value="">Select a location</option>
            <option value="limpopo">Limpopo</option>
            <option value="cape-town">Cape Town</option>
            <option value="jhb">Johannesburg</option>
        </select>
        <div id="rates-option-content"></div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function handleRatesOptionChange(option) {
            const ratesOptionContent = document.getElementById("rates-option-content");
            ratesOptionContent.innerHTML = "";

            if (option === "limpopo") {
                ratesOptionContent.innerHTML = `
                    <div data-aos="fade-in" data-aos-duration="1000">
                        <h3>Shuttle Rates from Limpopo</h3>
                        <p><strong>Please note:</strong> The rates below are single rates per trip.</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Number of Passengers</th>
                                    <th>0-45 Km</th>
                                    <th>41-80 Km</th>
                                    <th>81-120 Km</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Number of Passengers">1-3 Pax (Sedan)</td>
                                    <td data-label="0-45 Km">R 550.00</td>
                                    <td data-label="41-80 Km">R 650.00</td>
                                    <td data-label="81-120 Km">R 900.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">4-9 Pax (Kombi/H1)</td>
                                    <td data-label="0-45 Km">R 900.00</td>
                                    <td data-label="41-80 Km">R 1300.00</td>
                                    <td data-label="81-120 Km">R 1700.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">10-14 Pax (Quantum)</td>
                                    <td data-label="0-45 Km">R 1500.00</td>
                                    <td data-label="41-80 Km">R 2000.00</td>
                                    <td data-label="81-120 Km">R 2500.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">22-60 Pax (Semi Luxury)</td>
                                    <td data-label="0-45 Km">R 9000.00</td>
                                    <td data-label="41-80 Km">R 14000.00</td>
                                    <td data-label="81-120 Km">R 19000.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Number of Passengers">22-60 Pax (Luxury)</td>
                                    <td data-label="0-45 Km">R 11500.00</td>
                                    <td data-label="41-80 Km">R 1600.00</td>
                                    <td data-label="81-120 Km">R 2100.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">10-22 Pax Seater</td>
                                    <td data-label="0-45 Km">R 2100.00</td>
                                    <td data-label="41-80 Km">R 2700.00</td>
                                    <td data-label="81-120 Km">R 3200.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `;
            } else if (option === "cape-town") {
                ratesOptionContent.innerHTML = `
                    <div data-aos="fade-in" data-aos-duration="1000">
                        <h3>Shuttle Rates from Cape Town</h3>
                        <p><strong>Please note:</strong> The rates below are single rates per trip.</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Zone</th>
                                    <th>Kilometres</th>
                                    <th>1-3 Pax</th>
                                    <th>4-7 Pax</th>
                                    <th>8-22 Pax</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Zone">1</td>
                                    <td data-label="Kilometres">0-20 KM</td>
                                    <td data-label="1-3 Pax">R390.00</td>
                                    <td data-label="4-7 Pax">R690.00</td>
                                    <td data-label="8-22 Pax">R1290.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">2</td>
                                    <td data-label="Kilometres">20-30 KM</td>
                                    <td data-label="1-3 Pax">R440.00</td>
                                    <td data-label="4-7 Pax">R750.00</td>
                                    <td data-label="8-22 Pax">R1350.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">3</td>
                                    <td data-label="Kilometres">31-40 KM</td>
                                    <td data-label="1-3 Pax">R500.00</td>
                                    <td data-label="4-7 Pax">R1200.00</td>
                                    <td data-label="8-22 Pax">R1600.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">4</td>
                                    <td data-label="Kilometres">41-50 KM</td>
                                    <td data-label="1-3 Pax">R550.00</td>
                                    <td data-label="4-7 Pax">R2000.00</td>
                                    <td data-label="8-22 Pax">R2400.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">5</td>
                                    <td data-label="Kilometres">51-60 KM</td>
                                    <td data-label="1-3 Pax">R600.00</td>
                                    <td data-label="4-7 Pax">R2400.00</td>
                                    <td data-label="8-22 Pax">R3150.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">6</td>
                                    <td data-label="Kilometres">61-70 KM</td>
                                    <td data-label="1-3 Pax">R750.00</td>
                                    <td data-label="4-7 Pax">R2750.00</td>
                                    <td data-label="8-22 Pax">R3350.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">7</td>
                                    <td data-label="Kilometres">71-80 KM</td>
                                    <td data-label="1-3 Pax">R850.00</td>
                                    <td data-label="4-7 Pax">R2900.00</td>
                                    <td data-label="8-22 Pax">R3550.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Zone">8</td>
                                    <td data-label="Kilometres">81-90 KM</td>
                                    <td data-label="1-3 Pax">R950.00</td>
                                    <td data-label="4-7 Pax">R3100.00</td>
                                    <td data-label="8-22 Pax">R4000.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">9</td>
                                    <td data-label="Kilometres">91-100 KM</td>
                                    <td data-label="1-3 Pax">R1100.00</td>
                                    <td data-label="4-7 Pax">R3500.00</td>
                                    <td data-label="8-22 Pax">R4500.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">10</td>
                                    <td data-label="Kilometres">101-120 KM</td>
                                    <td data-label="1-3 Pax">R1200.00</td>
                                    <td data-label="4-7 Pax">R3950.00</td>
                                    <td data-label="8-22 Pax">R4900.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">11</td>
                                    <td data-label="Kilometres">121-150 KM</td>
                                    <td data-label="1-3 Pax">R1400.00</td>
                                    <td data-label="4-7 Pax">R4100.00</td>
                                    <td data-label="8-22 Pax">R4950.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">12</td>
                                    <td data-label="Kilometres">151-170 KM</td>
                                    <td data-label="1-3 Pax">R1600.00</td>
                                    <td data-label="4-7 Pax">R4300.00</td>
                                    <td data-label="8-22 Pax">R5390.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">13</td>
                                    <td data-label="Kilometres">171-200 KM</td>
                                    <td data-label="1-3 Pax">R2100.00</td>
                                    <td data-label="4-7 Pax">R4500.00</td>
                                    <td data-label="8-22 Pax">R5950.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">14</td>
                                    <td data-label="Kilometres">201-250 KM</td>
                                    <td data-label="1-3 Pax">R2800.00</td>
                                    <td data-label="4-7 Pax">R4950.00</td>
                                    <td data-label="8-22 Pax">R6100.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">15</td>
                                    <td data-label="Kilometres">251-300 KM</td>
                                    <td data-label="1-3 Pax">R3600.00</td>
                                    <td data-label="4-7 Pax">R5100.00</td>
                                    <td data-label="8-22 Pax">R6500.00</td>
                                </tr>
                                    <tr>
                                    <td data-label="Zone">16</td>
                                    <td data-label="Kilometres">301-350 KM</td>
                                    <td data-label="1-3 Pax">R 4600.00</td>
                                    <td data-label="4-7 Pax">R600.00</td>
                                    <td data-label="8-22 Pax">R6955.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `;
            } else if (option === "jhb") {
                ratesOptionContent.innerHTML = `
                    <div data-aos="fade-in" data-aos-duration="1000">
                        <h3>Shuttle Rates from Johannesburg</h3>
                        <p><strong>Please note:</strong> The rates below are single rates per trip.</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Number of Passengers</th>
                                    <th>0-45 Km</th>
                                    <th>0-82 Km</th>
                                    <th>0-100 Km</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Number of Passengers">1-3 Pax (Sedan)</td>
                                    <td data-label="0-45 Km">R 650.00</td>
                                    <td data-label="0-82 Km">R 950.00</td>
                                    <td data-label="0-100 Km">R 1400.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">4-9 Pax (Kombi/H1)</td>
                                    <td data-label="0-45 Km">R 1300.00</td>
                                    <td data-label="0-82 Km">R 2500.00</td>
                                    <td data-label="0-100 Km">R 3500.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">10-14 Pax (Quantum)</td>
                                    <td data-label="0-45 Km">R 2600.00</td>
                                    <td data-label="0-82 Km">R 3550.00</td>
                                    <td data-label="0-100 Km">R 4850.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">22-60 Pax (Semi Luxury)</td>
                                    <td data-label="0-45 Km">R 10000.00</td>
                                    <td data-label="0-82 Km">R 15000.00</td>
                                    <td data-label="0-100 Km">R 20000.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">22-60 Pax (Luxy)</td>
                                    <td data-label="0-45 Km">R 12000.00</td>
                                    <td data-label="0-82 Km">R 12600.00</td>
                                    <td data-label="0-100 Km">R 13200.00</td>
                                </tr>
                                <tr>
                                    <td data-label="Number of Passengers">10-22 Pax Seater</td>
                                    <td data-label="0-45 Km">R 5000.00</td>
                                    <td data-label="0-82 Km">R 1000.00</td>
                                    <td data-label="0-100 Km">R 15000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `;
            } else if (option === "") {
                ratesOptionContent.innerHTML = "";
            } else {
                ratesOptionContent.innerHTML = "<h4 data-aos='fade-in' data-aos-duration='1000'>Please select a location</h4>";
            }
        }
    </script>
</body>

</html>