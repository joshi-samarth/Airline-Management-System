<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve all data from the previous page
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    $departureTime = $_POST['departureTime'];
    $flightNumber = $_POST['flightNumber'];
    $arrivalTime = $_POST['arrivalTime'];
    $economyPrice = $_POST['economyPrice'];
    $businessPrice = $_POST['businessPrice'];
    $firstclassPrice = $_POST['firstclassPrice'];
    $tableName = $_POST['tableName'];
    // Initialize an array to store selected seats
    $selectedSeats = array();

    // Process selected seats
    if (isset($_POST['selected_seats']) && is_array($_POST['selected_seats'])) {
        $selectedSeats = $_POST['selected_seats'];
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CPE";

$conn = new mysqli($servername, $username, $password, $dbname);

$bookedSeatsQuery = "SELECT seat FROM $tableName";
$bookedSeatsResult = mysqli_query($conn, $bookedSeatsQuery);

$bookedSeats = array();
while ($row = mysqli_fetch_assoc($bookedSeatsResult)) {
    $bookedSeats[] = $row['seat'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .section {
            margin: 20px auto;
            text-align: center;
        }

        /* Style for seat labels */
        label {
            display: inline-block;
            width: 80px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            color: #fff;
            font-size: 14px;
        }

        /* Style for selected seats */
        input[type="checkbox"]:checked+label {
            background-color: green;
            color: white;
            background-image: none;
            border: 1px solid green;
        }

        input[type="checkbox"]:disabled+label {
            background-color: rgb(198, 10, 170);
            color: white;
            border: none;
            cursor: not-allowed;
            background-image: none;
        }


        .section {
            margin-bottom: 20px;
        }

        /* Clearfix for sections */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style for submit button */
        .submit-button {
            display: block;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style for Business Class seat labels */
        input[value^="B"]+label {
            background: linear-gradient(to bottom, #000033, #000066, #000099);
            /* Gradient shades of dark blue */
        }

        /* Style for First Class seat labels */
        input[value^="F"]+label {
            background: linear-gradient(to bottom, #990000, #660000, #330000);
            /* Gradient shades of dark red */
        }

        /* Style for Economy Class seat labels */
        input[value^="E"]+label {
            background: linear-gradient(to bottom, #000000, #333333, #666666);
            /* Gradient shades of black */
        }

        /* Hide checkboxes */
        input[type="checkbox"] {
            display: none;
        }
    </style>
</head>

<body onload="session()">

    <h1>Seat Selection</h1>

    <form action="bookinginformation.php" method="post">
        <!-- Hidden input fields for previous page's data -->
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
        <!-- Input field to send selected seats data -->
        <?php if (!empty($selectedSeats)): ?>
            <?php foreach ($selectedSeats as $seat): ?>
                <input type="hidden" name="selected_seats[]" value="<?php echo $seat; ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="section">
            <h2>Business Class</h2>
            <div class="seat-row">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <?php $seatNumber = "B" . $i; ?>
                    <?php $disabled = in_array($seatNumber, $bookedSeats) ? 'disabled' : ''; ?>
                    <input type="checkbox" name="selected_seats[]" value="<?php echo $seatNumber; ?>"
                        id="checkbox_<?php echo $seatNumber; ?>" <?php echo $disabled; ?>>
                    <label for="checkbox_<?php echo $seatNumber; ?>" class="seat-label">
                        <?php echo $seatNumber; ?>
                    </label>
                <?php endfor; ?>
            </div>
        </div>

        <!-- First Class Section -->
        <div class="section">
            <h2>First Class</h2>
            <div class="seat-row">
                <?php for ($i = 1; $i <= 20; $i++): ?>
                    <?php $seatNumber = "F" . $i; ?>
                    <?php $disabled = in_array($seatNumber, $bookedSeats) ? 'disabled' : ''; ?>
                    <input type="checkbox" name="selected_seats[]" value="<?php echo $seatNumber; ?>"
                        id="checkbox_<?php echo $seatNumber; ?>" <?php echo $disabled; ?>>
                    <label for="checkbox_<?php echo $seatNumber; ?>" class="seat-label">
                        <?php echo $seatNumber; ?>
                    </label>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Economy Section -->
        <div class="section">
            <h2>Economy Class</h2>
            <div class="seat-row">
                <?php for ($i = 1; $i <= 30; $i++): ?>
                    <?php $seatNumber = "E" . $i; ?>
                    <?php $disabled = in_array($seatNumber, $bookedSeats) ? 'disabled' : ''; ?>
                    <input type="checkbox" name="selected_seats[]" value="<?php echo $seatNumber; ?>"
                        id="checkbox_<?php echo $seatNumber; ?>" <?php echo $disabled; ?>>
                    <label for="checkbox_<?php echo $seatNumber; ?>" class="seat-label">
                        <?php echo $seatNumber; ?>
                    </label>
                <?php endfor; ?>
            </div>
        </div>

        <button type="submit" class="submit-button">Submit</button>
    </form>
    <script src="script/loginOrNot.js"></script>
</body>

</html>