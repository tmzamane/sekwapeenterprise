<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ride</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/bookings.css">
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
        }

        .sub-heading {
            scroll-margin: 150px;
        }

        .booking-section {
            background-color: #f0f0f0;
            width: 100%;
            box-sizing: border-box;
            border: 0;
        }
    </style>
</head>

<body>
    <section id="booking-form" class="aos-section">
        <div class="booking-section">
            <div class="sub-heading" id="booking-section" data-aos="fade-down" data-aos-duration="600">Your Trusted Partner in Transport</div>
            <div class="heading" data-aos="fade-down" data-aos-delay="200" data-aos-duration="600">Book Your Appointment Online</div>
            <h2 data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">Book a Ride</h2>
            <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">Please select the type of booking you would like to make from the options below. Fill in the required details to proceed with your booking.</p>

            <div class="booking-options" data-aos="fade-in" data-aos-delay="500" data-aos-duration="600">
                <label for="booking-options">Choose Booking Type:</label>
                <select id="booking-options" onchange="handleBookingOptionChange(this.value)">
                    <option value="">Select an option</option>
                    <option value="simple-booking">Simple Booking</option>
                    <option value="package-based-booking">Package-based-booking</option>
                    <option value="recurring-booking">Recurring Booking</option>
                    <option value="multi-stop-booking">Multi-Stop Booking</option>
                    <option value="courier-booking">Courier Booking</option>
                </select>
                <div id="booking-option-content"></div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        const bookingOptionContent = document.getElementById("booking-option-content");

        function handleBookingOptionChange(option) {
            bookingOptionContent.innerHTML = "";

            switch (option) {
                case "simple-booking":
                    renderSimpleBookingForm();
                    break;
                case "package-based-booking":
                    renderPackageBookingForm();
                    break;
                case "recurring-booking":
                    renderRecurringBookingForm();
                    break;
                case "multi-stop-booking":
                    renderMultiStopBookingForm();
                    break;
                case "courier-booking":
                    renderCourierBookingForm();
                    break;
                default:
                    break;
            }
        }

        function renderSimpleBookingForm() {
            bookingOptionContent.innerHTML = `
                <form id="simple-booking-form" data-aos="fade-in" data-aos-duration="400" action="process_booking.php" method="post" onsubmit="return validateAndSubmitForm(this, 'simple');">
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="client-name">Your Name:</label>
                        <div class="error-message" id="client-name-error"></div>
                        <input type="text" id="client-name" name="client_name" class="input-field" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="client-email">Your Email:</label>
                        <div class="error-message" id="client-email-error"></div>
                        <input type="email" id="client-email" name="client_email" class="input-field" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">Your Phone:</label>
                        <div class="error-message" id="client-phone-error"></div>
                        <input type="tel" id="client-phone" name="client_phone" class="input-field" placeholder="Enter your phone number" required>
                    </div>
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="simple-pickup">Pickup Location:</label>
                        <div class="error-message" id="simple-pickup-error"></div>
                        <input type="text" id="simple-pickup" name="pickup" class="input-field" placeholder="Enter pickup location">
                    </div>
                    <div class="form-group">
                        <label for="simple-dropoff">Dropoff Location:</label>
                        <div class="error-message" id="simple-dropoff-error"></div>
                        <input type="text" id="simple-dropoff" name="dropoff" class="input-field" placeholder="Enter dropoff location">
                    </div>
                    <div class="form-group">
                        <label for="simple-date">Date:</label>
                        <div class="error-message" id="simple-date-error"></div>
                        <input type="date" id="simple-date" name="date" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="simple-time">Time:</label>
                        <div class="error-message" id="simple-time-error"></div>
                        <input type="time" id="simple-time" name="time" class="input-field">
                    </div>
                    <button type="submit">Book Now</button>
                </form>
            `;
            AOS.refresh();
        }

        function renderPackageBookingForm() {
            bookingOptionContent.innerHTML = `
                <form id="package-booking-form" data-aos="fade-in" data-aos-duration="400" action="process_booking.php" method="post" onsubmit="return validateAndSubmitForm(this, 'package');">
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="client-name">Your Name:</label>
                        <div class="error-message" id="client-name-error"></div>
                        <input type="text" id="client-name" name="client_name" class="input-field" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="client-email">Your Email:</label>
                        <div class="error-message" id="client-email-error"></div>
                        <input type="email" id="client-email" name="client_email" class="input-field" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">Your Phone:</label>
                        <div class="error-message" id="client-phone-error"></div>
                        <input type="tel" id="client-phone" name="client_phone" class="input-field" placeholder="Enter your phone number" required>
                    </div>
                    <input type="hidden" name="booking_type" value="package">
                    <div class="form-group">
                        <label for="package-type">Package Type:</label>
                        <div class="error-message" id="package-type-error"></div>
                        <select id="package-type" name="package-type" class="input-field">
                            <option value="">Select Package Type</option>
                            <option value="small">Small Package</option>
                            <option value="medium">Medium Package</option>
                            <option value="large">Large Package</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="package-date">Date:</label>
                        <div class="error-message" id="package-date-error"></div>
                        <input type="date" id="package-date" name="date" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="package-time">Time:</label>
                        <div class="error-message" id="package-time-error"></div>
                        <input type="time" id="package-time" name="time" class="input-field">
                    </div>
                    <button type="submit">Book Now</button>
                </form>
            `;
            AOS.refresh();
        }

        function renderRecurringBookingForm() {
            bookingOptionContent.innerHTML = `
                <form id="recurring-booking-form" data-aos="fade-in" data-aos-duration="400" action="process_booking.php" method="post" onsubmit="return validateAndSubmitForm(this, 'recurring');">
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="client-name">Your Name:</label>
                        <div class="error-message" id="client-name-error"></div>
                        <input type="text" id="client-name" name="client_name" class="input-field" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="client-email">Your Email:</label>
                        <div class="error-message" id="client-email-error"></div>
                        <input type="email" id="client-email" name="client_email" class="input-field" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">Your Phone:</label>
                        <div class="error-message" id="client-phone-error"></div>
                        <input type="tel" id="client-phone" name="client_phone" class="input-field" placeholder="Enter your phone number" required>
                    </div>
                    <input type="hidden" name="booking_type" value="recurring">
                    <div class="form-group">
                        <label for="recurring-frequency">Frequency:</label>
                        <div class="error-message" id="recurring-frequency-error"></div>
                        <select id="recurring-frequency" name="frequency" class="input-field">
                            <option value="">Select Frequency</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recurring-date">Date:</label>
                        <div class="error-message" id="recurring-date-error"></div>
                        <input type="date" id="recurring-date" name="date" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="recurring-time">Time:</label>
                        <div class="error-message" id="recurring-time-error"></div>
                        <input type="time" id="recurring-time" name="time" class="input-field">
                    </div>
                    <button type="submit">Book Now</button>
                </form>
            `;
            AOS.refresh();
        }

        function renderMultiStopBookingForm() {
            bookingOptionContent.innerHTML = `
                <form id="multi-stop-booking-form" data-aos="fade-in" data-aos-duration="400" action="process_booking.php" method="post" onsubmit="return validateAndSubmitForm(this, 'multi-stop');">
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="client-name">Your Name:</label>
                        <div class="error-message" id="client-name-error"></div>
                        <input type="text" id="client-name" name="client_name" class="input-field" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="client-email">Your Email:</label>
                        <div class="error-message" id="client-email-error"></div>
                        <input type="email" id="client-email" name="client_email" class="input-field" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">Your Phone:</label>
                        <div class="error-message" id="client-phone-error"></div>
                        <input type="tel" id="client-phone" name="client_phone" class="input-field" placeholder="Enter your phone number" required>
                    </div>
                    <input type="hidden" name="booking_type" value="multi-stop">
                    <div class="form-group">
                        <label for="multi-pickup">Pickup Location:</label>
                        <div class="error-message" id="multi-pickup-error"></div>
                        <input type="text" id="multi-pickup" name="pickup" class="input-field" placeholder="Enter pickup location">
                    </div>
                    <div class="form-group">
                        <label for="multi-dropoff1">Dropoff Location 1:</label>
                        <div class="error-message" id="multi-dropoff1-error"></div>
                        <input type="text" id="multi-dropoff1" name="dropoff1" class="input-field" placeholder="Enter dropoff location 1">
                    </div>
                    <div class="form-group">
                        <label for="multi-dropoff2">Dropoff Location 2:</label>
                        <div class="error-message" id="multi-dropoff2-error"></div>
                        <input type="text" id="multi-dropoff2" name="dropoff2" class="input-field" placeholder="Enter dropoff location 2">
                    </div>
                    <div class="form-group">
                        <label for="multi-date">Date:</label>
                        <div class="error-message" id="multi-date-error"></div>
                        <input type="date" id="multi-date" name="date" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="multi-time">Time:</label>
                        <div class="error-message" id="multi-time-error"></div>
                        <input type="time" id="multi-time" name="time" class="input-field">
                    </div>
                    <button type="submit">Book Now</button>
                </form>
            `;
            AOS.refresh();
        }

        function renderCourierBookingForm() {
            bookingOptionContent.innerHTML = `
                <form id="courier-booking-form" data-aos="fade-in" data-aos-duration="400" action="process_booking.php" method="post" onsubmit="return validateAndSubmitForm(this, 'courier');">
                    <input type="hidden" name="booking_type" value="simple">
                    <div class="form-group">
                        <label for="client-name">Your Name:</label>
                        <div class="error-message" id="client-name-error"></div>
                        <input type="text" id="client-name" name="client_name" class="input-field" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="client-email">Your Email:</label>
                        <div class="error-message" id="client-email-error"></div>
                        <input type="email" id="client-email" name="client_email" class="input-field" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="client-phone">Your Phone:</label>
                        <div class="error-message" id="client-phone-error"></div>
                        <input type="tel" id="client-phone" name="client_phone" class="input-field" placeholder="Enter your phone number" required>
                    </div>
                    <input type="hidden" name="booking_type" value="courier">
                    <div class="form-group">
                        <label for="courier-pickup">Pickup Location:</label>
                        <div class="error-message" id="courier-pickup-error"></div>
                        <input type="text" id="courier-pickup" name="pickup" class="input-field" placeholder="Enter pickup location">
                    </div>
                    <div class="form-group">
                    <label for="courier-dropoff">Dropoff Location:</label>
                        <div class="error-message" id="courier-dropoff-error"></div>
                        <input type="text" id="courier-dropoff" name="dropoff" class="input-field" placeholder="Enter dropoff location">
                    </div>
                    <div class="form-group">
                        <label for="courier-package-type">Package Type:</label>
                        <div class="error-message" id="courier-package-type-error"></div>
                        <select id="courier-package-type" name="package-type" class="input-field">
                            <option value="">Select Package Type</option>
                            <option value="document">Document</option>
                            <option value="package">Package</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="courier-date">Date:</label>
                        <div class="error-message" id="courier-date-error"></div>
                        <input type="date" id="courier-date" name="date" class="input-field">
                    </div>
                    <div class="form-group">
                        <label for="courier-time">Time:</label>
                        <div class="error-message" id="courier-time-error"></div>
                        <input type="time" id="courier-time" name="time" class="input-field">
                    </div>
                    <button type="submit">Book Now</button>
                </form>
            `;
            AOS.refresh();
        }

        function validateAndSubmitForm(form, bookingType) {
            form.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');

            let isValid = true;
            let pickup, dropoff, date, time, frequency, packageType, dropoff1, dropoff2;
            const name = form.querySelector('#client-name').value;
            const email = form.querySelector('#client-email').value;
            const phone = form.querySelector('#client-phone').value;

            if (!name) {
                form.querySelector('#client-name-error').textContent = "Your name is required.";
                isValid = false;
            }
            if (!email) {
                form.querySelector('#client-email-error').textContent = "Your email is required.";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                form.querySelector('#client-email-error').textContent = "Invalid email format.";
                isValid = false;
            }
            if (!phone) {
                form.querySelector('#client-phone-error').textContent = "Your phone number is required.";
                isValid = false;
            } else if (!/^\d{10,}$/.test(phone)) {
                form.querySelector('#client-phone-error').textContent = "Invalid phone number format.";
                isValid = false;
            }


            switch (bookingType) {
                case 'simple':
                    pickup = form.querySelector('#simple-pickup').value;
                    dropoff = form.querySelector('#simple-dropoff').value;
                    date = form.querySelector('#simple-date').value;
                    time = form.querySelector('#simple-time').value;
                    isValid = isValid && validateSimpleBooking(form, pickup, dropoff, date, time);
                    break;
                case 'package':
                    packageType = form.querySelector('#package-type').value;
                    date = form.querySelector('#package-date').value;
                    time = form.querySelector('#package-time').value;
                    isValid = isValid && validatePackageBooking(form, packageType, date, time);
                    break;
                case 'recurring':
                    frequency = form.querySelector('#recurring-frequency').value;
                    date = form.querySelector('#recurring-date').value;
                    time = form.querySelector('#recurring-time').value;
                    isValid = isValid && validateRecurringBooking(form, frequency, date, time);
                    break;
                case 'multi-stop':
                    pickup = form.querySelector('#multi-pickup').value;
                    dropoff1 = form.querySelector('#multi-dropoff1').value;
                    dropoff2 = form.querySelector('#multi-dropoff2').value;
                    date = form.querySelector('#multi-date').value;
                    time = form.querySelector('#multi-time').value;
                    isValid = isValid && validateMultiStopBooking(form, pickup, dropoff1, dropoff2, date, time);
                    break;
                case 'courier':
                    pickup = form.querySelector('#courier-pickup').value;
                    dropoff = form.querySelector('#courier-dropoff').value;
                    packageType = form.querySelector('#courier-package-type').value;
                    date = form.querySelector('#courier-date').value;
                    time = form.querySelector('#courier-time').value;
                    isValid = isValid && validateCourierBooking(form, pickup, dropoff, packageType, date, time);
                    break;
                default:
                    isValid = false;
            }

            if (isValid) {
                return true; // Allow form submission
            } else {
                return false; // Prevent form submission
            }
        }

        function validateSimpleBooking(form, pickup, dropoff, date, time) {
            let isValid = true;
            if (!pickup) {
                form.querySelector('#simple-pickup-error').textContent = "Pickup location is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(pickup)) {
                form.querySelector('#simple-pickup-error').textContent = "Pickup location must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!dropoff) {
                form.querySelector('#simple-dropoff-error').textContent = "Dropoff location is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(dropoff)) {
                form.querySelector('#simple-dropoff-error').textContent = "Dropoff location must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!date) {
                form.querySelector('#simple-date-error').textContent = "Date is required.";
                isValid = false;
            }
            if (!time) {
                form.querySelector('#simple-time-error').textContent = "Time is required.";
                isValid = false;
            }
            return isValid;
        }

        function validatePackageBooking(form, packageType, date, time) {
            let isValid = true;
            if (!packageType) {
                form.querySelector('#package-type-error').textContent = "Package type is required.";
                isValid = false;
            }
            if (!date) {
                form.querySelector('#package-date-error').textContent = "Date is required.";
                isValid = false;
            }
            if (!time) {
                form.querySelector('#package-time-error').textContent = "Time is required.";
                isValid = false;
            }
            return isValid;
        }

        function validateRecurringBooking(form, frequency, date, time) {
            let isValid = true;
            if (!frequency) {
                form.querySelector('#recurring-frequency-error').textContent = "Frequency is required.";
                isValid = false;
            }
            if (!date) {
                form.querySelector('#recurring-date-error').textContent = "Date is required.";
                isValid = false;
            }
            if (!time) {
                form.querySelector('#recurring-time-error').textContent = "Time is required.";
                isValid = false;
            }
            return isValid;
        }

        function validateMultiStopBooking(form, pickup, dropoff1, dropoff2, date, time) {
            let isValid = true;
            if (!pickup) {
                form.querySelector('#multi-pickup-error').textContent = "Pickup location is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(pickup)) {
                form.querySelector('#multi-pickup-error').textContent = "Pickup location must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!dropoff1) {
                form.querySelector('#multi-dropoff1-error').textContent = "Dropoff location 1 is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(dropoff1)) {
                form.querySelector('#multi-dropoff1-error').textContent = "Dropoff location 1 must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!dropoff2) {
                form.querySelector('#multi-dropoff2-error').textContent = "Dropoff location 2 is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(dropoff2)) {
                form.querySelector('#multi-dropoff2-error').textContent = "Dropoff location 2 must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!date) {
                form.querySelector('#multi-date-error').textContent = "Date is required.";
                isValid = false;
            }
            if (!time) {
                form.querySelector('#multi-time-error').textContent = "Time is required.";
                isValid = false;
            }
            return isValid;
        }

        function validateCourierBooking(form, pickup, dropoff, packageType, date, time) {
            let isValid = true;
            if (!pickup) {
                form.querySelector('#courier-pickup-error').textContent = "Pickup location is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(pickup)) {
                form.querySelector('#courier-pickup-error').textContent = "Pickup location must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!dropoff) {
                form.querySelector('#courier-dropoff-error').textContent = "Dropoff location is required.";
                isValid = false;
            } else if (!/^(?=.*[0-9])(?=.*[a-zA-Z]).{3,}$/.test(dropoff)) {
                form.querySelector('#courier-dropoff-error').textContent = "Dropoff location must contain a mix of letters and numbers and be at least 3 characters long.";
                isValid = false;
            }
            if (!packageType) {
                form.querySelector('#courier-package-type-error').textContent = "Package type is required.";
                isValid = false;
            }
            if (!date) {
                form.querySelector('#courier-date-error').textContent = "Date is required.";
                isValid = false;
            }
            if (!time) {
                form.querySelector('#courier-time-error').textContent = "Time is required.";
                isValid = false;
            }
            return isValid;
        }
    </script>
    <?php include_once "rates.php"; ?>
</body>

</html>