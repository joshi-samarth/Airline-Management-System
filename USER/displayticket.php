<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Confirmation Page</title>
    <style id="boarding-pass-styles">
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            margin: 0;
            background: radial-gradient(ellipse farthest-corner at center top, #ffffff, #ffffff);
            color: #363c44;
            font-size: 14px;
            font-family: "Roboto", sans-serif;
            padding: auto;
        }

        .boarding-pass {
            position: relative;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            height: 382px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            text-transform: uppercase;
            margin-bottom: 20px;

        }

        .boarding-pass small {
            display: block;
            font-size: 11px;
            color: #A2A9B3;
            margin-bottom: 2px;
        }

        .boarding-pass strong {
            font-size: 15px;
            display: block;

        }

        .boarding-pass header {
            background: linear-gradient(to bottom, #36475f, #2c394f);
            padding: 12px 20px;
            height: 53px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .boarding-pass header .flight {
            color: #fff;
        }

        .boarding-pass header .flight .flight-label {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        .boarding-pass header .flight {
            color: #fff;
        }

        .boarding-pass header .flight small {
            font-size: 18px;
            color: #ffffff;
            text-align: left;
            margin-bottom: 0px;
        }

        .boarding-pass header .flight strong {
            font-size: 18px;
            text-align: right;
            margin-top: 0px;
        }

        .boarding-pass .cities {
            position: relative;
        }

        .boarding-pass .cities::after {
            content: "";
            display: table;
            clear: both;
        }

        .boarding-pass .cities .city {
            padding: 20px 18px;
            float: left;
        }

        .boarding-pass .cities .city:nth-child(2) {
            float: right;
        }

        .boarding-pass .cities .city strong {
            font-size: 40px;
            font-weight: 300;
            line-height: 1;
        }

        .boarding-pass .cities .city small {
            margin-bottom: 0px;
            margin-left: 3px;
        }

        .boarding-pass .cities .airplane {
            position: absolute;
            width: 30px;
            height: 25px;
            top: 57%;
            left: 30%;
            opacity: 0;
            transform: translate(-50%, -50%);
            -webkit-animation: move 3s infinite;
            animation: move 3s infinite;
        }

        @-webkit-keyframes move {
            40% {
                left: 50%;
                opacity: 1;
            }

            100% {
                left: 70%;
                opacity: 0;
            }
        }

        @keyframes move {
            40% {
                left: 50%;
                opacity: 1;
            }

            100% {
                left: 70%;
                opacity: 0;
            }
        }

        .boarding-pass .infos {
            display: flex;
            border-top: 1px solid #99D298;
        }

        .boarding-pass .infos .places {
            width: 55%;
            padding: 10px 0;
        }

        .boarding-pass .infos .times {
            width: 45%;
            padding: 10px 0;
        }

        .boarding-pass .infos .places::after,
        .boarding-pass .infos .times::after {
            content: "";
            display: table;
            clear: both;
        }

        .boarding-pass .infos .times strong {
            transform: scale(0.9);
            transform-origin: left bottom;
        }

        .boarding-pass .infos .places {
            background: #ECECEC;
            border-right: 1px solid #99D298;
        }

        .boarding-pass .infos .places small {
            color: #97A1AD;
        }

        .boarding-pass .infos .places strong {
            color: #239422;
        }

        .boarding-pass .infos .box {
            padding: 10px 20px 10px;
            width: 47%;
            float: left;
        }

        .boarding-pass .infos .box small {
            font-size: 10px;
        }

        .boarding-pass .strap {
            clear: both;
            position: relative;
            border-top: 1px solid #99D298;
        }

        .boarding-pass .strap::after {
            content: "";
            display: table;
            clear: both;
        }

        .boarding-pass .strap .box {
            padding: 23px 0 20px 20px;
        }

        .boarding-pass .strap .box div {
            margin-bottom: 15px;
        }

        .boarding-pass .strap .box div small {
            font-size: 10px;
        }

        .boarding-pass .strap .box div strong {
            font-size: 13px;
        }

        .boarding-pass .strap .box sup {
            font-size: 8px;
            position: relative;
            top: -5px;
        }

        .boarding-pass .strap .qrcode {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
        }

        .print-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 90px auto 20px;
            /* Adjust the top margin (90px) and bottom margin (20px) as needed */
            width: fit-content;
            /* Optional: Set width to fit content */
        }


        @media print {

            /* Hide unnecessary elements */
            .print-button {
                display: none;
            }

            /* Adjust margins for better printing */
            body {
                margin: 0;
                padding: 0;
            }

            /* Avoid boarding passes breaking across pages */
            .boarding-pass {
                page-break-inside: avoid;
                margin-bottom: 40px;
                /* Add space between boarding passes */
            }

            /* Add background color for header */
            .boarding-pass header {
                background-color: #36475f;
                /* Add your desired background color */
            }
        }
    </style>
</head>

<body onload="session()">
    <?php include ('dbconnect.php'); ?>
    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $src = $_POST['source'];
        $sr = substr($src, 0, 3);
        $des = $_POST['destination'];
        $de = substr($des, 0, 3);
        $dd = $_POST['departureDate'];
        $dt = $_POST['departureTime'];
        $fn = $_POST['flightNumber'];
        $at = $_POST['arrivalTime'];
        $ep = $_POST['economyPrice'];
        $bp = $_POST['businessPrice'];
        $fp = $_POST['firstclassPrice'];
        $table = $_POST['tableName'];
        $username = $_POST['username'];

        $boarding = date('H:i', strtotime('-30 minutes', strtotime($dt)));

        $departure_time = $dt;
        $arrival_time = $at;

        // Convert departure and arrival times to DateTime objects
        $departure = DateTime::createFromFormat('H:i:s', $departure_time);
        $arrival = DateTime::createFromFormat('H:i:s', $arrival_time);

        // Check if arrival time is earlier than departure time
        if ($arrival < $departure) {
            // Modify arrival time to be on the next day
            $arrival->modify('+1 day');
        }

        // Calculate the duration
        $duration = $departure->diff($arrival);

        // Format and print the duration
        $duration = $duration->format('%H:%I');

        // Retrieve all form data
        $formData = $_POST;

        // Loop through each selected seat and generate a boarding pass
        foreach ($formData['selected_seats'] as $seat) {
            echo "<div class='boarding-pass'>";
            echo "<header>";
            echo "<div class='flight'>";
            echo "<small>flight Number</small>";
            echo "<strong>$fn</strong>";
            echo "</div>";
            echo "</header>";
            echo "<section class='cities'>";
            echo "<div class='city'>";
            echo "<small>$src</small>";
            echo "<strong>$sr</strong>";
            echo "</div>";
            echo "<div class='city'>";
            echo "<small>$des</small>";
            echo "<strong>$de</strong>";
            echo "</div>";
            echo "<svg class='airplane'>";
            echo "<use xlink:href='#airplane'></use>";
            echo "</svg>";
            echo "</section>";
            echo "<section class='infos'>";
            echo "<div class='places'>";
            echo "<div class='box'>";
            echo "<small>Terminal</small>";
            echo "<strong><em>W</em></strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Gate</small>";
            echo "<strong><em>C3</em></strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Seat</small>";
            echo "<strong>$seat</strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Class</small>";
            $c = substr($seat, 0, 1);
            if ($c == 'B') {
                $c = 'Business';
            } elseif ($c == 'F') {
                $c = 'First';
            } else {
                $c = 'Economy';
            }
            echo "<strong>$c</strong>";
            echo "</div>";
            echo "</div>";
            echo "<div class='times'>";
            echo "<div class='box'>";
            echo "<small>Boarding</small>";
            echo "<strong>$boarding</strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Departure</small>";
            echo "<strong>$dt</strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Duration</small>";
            echo "<strong>$duration</strong>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<small>Arrival</small>";
            echo "<strong>$at</strong>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
            echo "<section class='strap'>";
            echo "<div class='box'>";
            echo "<div class='passenger'>";
            echo "<small>passenger</small>";
            echo "<strong>{$formData['username' . $seat]}</strong>";
            echo "</div>";
            echo "<div class='date'>";
            echo "<small>Date</small>";
            echo "<strong>$dd</strong>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
            echo "</div>";

            $name = mysqli_real_escape_string($conn, $_POST['username' . $seat]);
            $gender = mysqli_real_escape_string($conn, $_POST['gender' . $seat]);
            $email = mysqli_real_escape_string($conn, $_POST['email' . $seat]);
            $age = mysqli_real_escape_string($conn, $_POST['age' . $seat]);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile' . $seat]);
            $selectedSeat = mysqli_real_escape_string($conn, $seat);

            $price = 0;
            $seatType = substr($selectedSeat, 0, 1);
            switch ($seatType) {
                case 'B':
                    $price = $bp;
                    break;
                case 'F':
                    $price = $fp;
                    break;
                case 'E':
                    $price = $ep;
                    break;
                default:
                    $price = 0;
                    break;
            }

            $sql = "INSERT INTO $table (username, flightNumber, name, gender, email, age, mobile, seat, price, source, destination, departureDate, departureTime, arrivalTime, timestamp) VALUES ('$username', '$fn', '$name', '$gender', '$email', '$age', '$mobile', '$selectedSeat', '$price', '$src', '$des', '$dd', '$dt', '$at', NOW())";
            $sql1 = "INSERT INTO totalbookings (username, flightNumber, name, gender, email, age, mobile, seat, price, source, destination, departureDate, departureTime, arrivalTime, timestamp) VALUES ('$username', '$fn', '$name', '$gender', '$email', '$age', '$mobile', '$selectedSeat', '$price', '$src', '$des', '$dd', '$dt', '$at', NOW())";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            if ($conn->query($sql1) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }

        }
        $conn->close();
    } else {
        // If form data is not submitted, display an error message
        echo "<p>Error: Form data not submitted.</p>";
    }
    ?>
    <button class="print-button" onclick="printBoardingPass()">Print Boarding Pass</button>
    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">

        <symbol id="airplane" viewBox="243.5 245.183 25 21.633">
            <g>
                <!-- Here's where you set the fill color to blue -->
                <path fill="#336699" d="M251.966,266.816h1.242l6.11-8.784l5.711,0.2c2.995-0.102,3.472-2.027,3.472-2.308
                              c0-0.281-0.63-2.184-3.472-2.157l-5.711,0.2l-6.11-8.785h-1.242l1.67,8.983l-6.535,0.229l-2.281-3.28h-0.561v3.566
                              c-0.437,0.257-0.738,0.724-0.757,1.266c-0.02,0.583,0.288,1.101,0.757,1.376v3.563h0.561l2.281-3.279l6.535,0.229L251.966,266.816z
                              " />
            </g>
        </symbol>

    </svg>
    <script src="script/loginOrNot.js"></script>
    <script>
        function printBoardingPass() {
            var boardingPasses = document.querySelectorAll('.boarding-pass');
            var printContents = '';
            var styles = document.getElementById('boarding-pass-styles').innerHTML;

            // Loop through each boarding pass and concatenate their outer HTML content
            boardingPasses.forEach(function (pass) {
                printContents += pass.outerHTML;
            });

            // Open a new window and print the concatenated HTML content
            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<!DOCTYPE html><html><head><title>Print Boarding Pass</title><style>' + styles + '</style></head><body>' + printContents + '</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

</body>

</html>