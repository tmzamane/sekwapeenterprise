<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed Star Rating</title>
    <style>
        /* --- General Styles --- */
        body {
            font-family: 'Work Sans', sans-serif;
        }

        .heading {
            font-size: 44px;
            font-family: "Work Sans", sans serif;
            font-weight: 900;
            text-align: center;
            padding: 10px 0;
            color: black;
        }

        .sub-heading {
            text-align: center;
            color: #ad471d;
            font-weight: 700;
        }

        .full-w .rating-title {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }

        .rating-instructions {
            color: #666;
            margin-bottom: 10px;
            font-size: 0.9em;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 0.9em;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        /* --- Star Rating Styles --- */
        .rating-container-stars {
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            padding: 10px 0;
            justify-content: center;
        }

        .rating-container-stars input[type="radio"] {
            display: none;
        }

        .rating-container-stars label {
            font-size: 2.5em;
            color: #ccc;
            cursor: pointer;
            padding: 5px;
            transition: color 0.2s;
        }

        .rating-container-stars label:hover,
        .rating-container-stars input[type="radio"]:checked~label {
            color: #AD471D;
        }

        .rating-label-text {
            margin-left: 10px;
            color: #555;
            font-size: 1em;
            font-weight: bold;
        }

        /* --- Submit Button and Message --- */
        .rating-submit-button {
            background-color: #AD471D;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.2s;
            margin-top: 15px;
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .rating-submit-button:hover {
            background-color: #863714;
        }

        .submission-message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 400px) {
            .rating-container-stars label {
                font-size: 2em;
                padding: 3px;
            }

            .rating-label-text {
                font-size: 0.9em;
            }

            .rating-submit-button {
                font-size: 0.9em;
                padding: 8px 12px;
            }
        }
    </style>
</head>

<body>

    <div>
        <div class="sub-heading">Rate Our Service</div>
        <div class="heading">Please provide your rating and details:</div>
        <form action="submit_rating.php" method="post" id="starRatingForm">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email (Optional):</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label>Your Rating:</label>
                <div class="rating-container-stars">
                    <span class="rating-label-text">Excellent</span>
                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                    <span class="rating-label-text">Poor</span>
                </div>
            </div>
            <button type="submit" class="rating-submit-button">Submit Rating</button>
            <div id="submission-status" class="submission-message" style="display: none;"></div>
        </form>
    </div>

    <script>
        const starRatingForm = document.getElementById('starRatingForm');
        const submissionStatus = document.getElementById('submission-status');

        starRatingForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('submit_rating.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    submissionStatus.textContent = data;
                    submissionStatus.style.display = 'block';
                    if (data.toLowerCase().includes('success')) {
                        submissionStatus.className = 'submission-message success';
                        starRatingForm.reset(); // Reset the form
                    } else {
                        submissionStatus.className = 'submission-message error';
                    }
                })
                .catch(error => {
                    submissionStatus.textContent = 'An error occurred while submitting the rating.';
                    submissionStatus.style.display = 'block';
                    submissionStatus.className = 'submission-message error';
                });
        });
    </script>

</body>

</html>