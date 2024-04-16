<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        // Retrieve username from session storage
        function session() {
            var status = sessionStorage.getItem('bool');
            if (status != "true") {
                window.location.href = 'index.php';
            }
        }

    </script>
    <meta charset="UTF-8">
    <title>samarth</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #333;
            border-radius: 8px;
            background-color: #e4e9f7;
            animation: fadein 0.5s ease-in-out;
        }

        .flight-details-label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            font-size: 18px;

        }

        @keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus {
            border-color: #4caf50;
        }

        input[type="text"]:hover,
        input[type="date"]:hover,
        input[type="time"]:hover {
            border-color: #4caf50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            .container {
                margin: 10px;
                padding: 10px;
            }

            input[type="text"],
            input[type="date"],
            input[type="time"] {
                margin-bottom: 5px;
            }

            table {
                margin-bottom: 5px;
            }

            input[type="submit"] {
                padding: 8px 16px;
            }
        }
    </style>
</head>

<body onload="session()">
    <?php include ('nav.html'); ?>
    <section class="home-section">
        <div class="container">
            <form id="flightForm" action="showmsg.php" method="post">

                <label for="flightNumber">Flight Number:</label>
                <input type="text" id="flightNumber" name="flightNumber" required>

                <label for="source">Source:</label>
                <input type="text" id="source" name="source" required>

                <label for="destination">Destination:</label>
                <input type="text" id="destination" name="destination" required>

                <label for="departureDate">Departure Date:</label>
                <input type="date" id="departureDate" name="departureDate" required>

                <label for="departureTime">Departure Time:</label>
                <input type="time" id="departureTime" name="departureTime" required>

                <label for="arrivalTime">Arrival Time:</label>
                <input type="time" id="arrivalTime" name="arrivalTime" required>

                <table>
                    <tr>
                        <th>Ticket Class</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>Economy Class</td>
                        <td><input type="text" id="economyPrice" name="economyPrice" placeholder="Enter price"></td>
                    </tr>
                    <tr>
                        <td>Business Class</td>
                        <td><input type="text" id="businessPrice" name="businessPrice" placeholder="Enter price">
                        </td>
                    </tr>
                    <tr>
                        <td>First Class</td>
                        <td><input type="text" id="firstclassPrice" name="firstclassPrice" placeholder="Enter price">
                        </td>
                    </tr>
                </table>

                <input type="submit" value="Submit">
            </form>
        </div>

</body>

</html>

</section>

</body>

</html>