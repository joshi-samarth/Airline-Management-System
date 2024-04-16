<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking Form</title>
    <link rel="stylesheet" href="css/styleForBookingInformation.css">
</head>

<body onload="session()">
    <div class="form-container">
        <form action="displayticket.php" method="post" id="bookingForm">
            <?php

            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $source = $_POST['source'];
                $destination = $_POST['destination'];
                $departureDate = $_POST['departureDate'];
                $departureTime = $_POST['departureTime'];
                $flightNumber = $_POST['flightNumber'];
                $arrivalTime = $_POST['arrivalTime'];
                $economyPrice = $_POST['economyPrice'];
                $businessPrice = $_POST['businessPrice'];
                $firstclassPrice = $_POST['firstclassPrice'];
                $tableName = $_POST['tableName']; // Retrieve table name from previous page
            
                // Initialize an array to store selected seats along with their prices
                $selectedSeatsWithPrices = array();

                // Process selected seats
                if (isset($_POST['selected_seats']) && is_array($_POST['selected_seats'])) {
                    foreach ($_POST['selected_seats'] as $selected_seat) {
                        // Determine the price based on the seat type
                        $price = '';
                        if (strpos($selected_seat, 'B') !== false) {
                            $price = $businessPrice;
                        } elseif (strpos($selected_seat, 'F') !== false) {
                            $price = $firstclassPrice;
                        } elseif (strpos($selected_seat, 'E') !== false) {
                            $price = $economyPrice;
                        }

                        // Add selected seat with its price to the array
                        $selectedSeatsWithPrices[$selected_seat] = $price;
                    }
                }
            }

            // Display forms
            foreach ($selectedSeatsWithPrices as $index => $seat) {
                ?>
                <div class="form-wrapper">
                    <div class="form">
                        <input type="hidden" name="selected_seats[]" value="<?php echo $index; ?>">
                        <label class="sam" for="hi">Seat
                            <?php echo $index; ?> - Price:
                            <?php echo $seat; ?>
                        </label>
                        <div class="input-group">
                            <input class="input" required autocomplete="off" type="text"
                                name="username<?php echo $index; ?>">
                            <label class="label" for="username<?php echo $index; ?>">Enter Full Name</label>
                        </div>

                        <div class="input-group">
                            <input class="input" required autocomplete="off" type="email" name="email<?php echo $index; ?>"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                            <label class="label" for="email<?php echo $index; ?>">Email</label>
                            <span class="error" id="emailError<?php echo $index; ?>"></span>
                        </div>


                        <div class="input-group">
                            <label class="lablegender" for="gender">Gender :</label>
                            <input type="radio" name="gender<?php echo $index; ?>" value="male" required>
                            <label for="male<?php echo $index; ?>">Male</label>
                            <input type="radio" name="gender<?php echo $index; ?>" value="female" required>
                            <label for="female<?php echo $index; ?>">Female</label>
                        </div>

                        <div class="input-group">
                            <input class="input" required autocomplete="off" type="number" name="age<?php echo $index; ?>"
                                required min="1" max="120">
                            <label class="label" for="age<?php echo $index; ?>">Age</label>
                        </div>

                        <div class="input-group">
                            <input class="input" required autocomplete="off" type="tel" name="mobile<?php echo $index; ?>"
                                pattern="[0-9]{10}" required>
                            <label class="label" for="mobile<?php echo $index; ?>">Mobile No</label>
                            <span class="error" id="mobileError<?php echo $index; ?>"></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Flight details hidden inputs -->
            <input type="hidden" name="source" value="<?php echo $source; ?>">
            <input type="hidden" name="destination" value="<?php echo $destination; ?>">
            <input type="hidden" name="departureDate" value="<?php echo $departureDate; ?>">
            <input type="hidden" name="departureTime" value="<?php echo $departureTime; ?>">
            <input type="hidden" name="flightNumber" value="<?php echo $flightNumber; ?>">
            <input type="hidden" name="arrivalTime" value="<?php echo $arrivalTime; ?>">
            <input type="hidden" name="economyPrice" value="<?php echo $economyPrice; ?>">
            <input type="hidden" name="businessPrice" value="<?php echo $businessPrice; ?>">
            <input type="hidden" name="firstclassPrice" value="<?php echo $firstclassPrice; ?>">
            <input type="hidden" name="tableName" value="<?php echo $tableName; ?>">
            <input type="hidden" id="usernameInput" name="username" value="">

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
    <script>
        function session() {
            var username = sessionStorage.getItem('email');
            if (username) {
                document.getElementById('usernameInput').value = username;
            }
            var status = sessionStorage.getItem('bool');
            if (status != "true") {
                window.location.href = 'log-in.php';
            }
        }

    </script>
</body>

</html>