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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add your custom CSS here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        .success-message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            /* Increased font size */
            color: #4CAF50;
            animation: fadeIn 1s ease-in-out;
            /* Added animation */
        }

        .add-again-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
            display: block;
            margin: 0 auto;
            text-align: center;
        }

        .add-again-btn:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body onload="session()">
    <?php include ('nav.html'); ?>
    <?php include ('dbconnect.php'); ?>
    <section class="home-section">
        <div class="container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                // Retrieve form data
                $flightNumber = $_POST["flightNumber"];
                $source = $_POST["source"];
                $destination = $_POST["destination"];
                $departureDate = $_POST["departureDate"];
                $departureTime = $_POST["departureTime"];
                $arrivalTime = $_POST["arrivalTime"];
                $economyPrice = $_POST["economyPrice"];
                $businessPrice = $_POST["businessPrice"];
                $firstclassPrice = $_POST["firstclassPrice"];

                $sql = "INSERT INTO flightinsert (flightNumber, source, destination, departureDate, departureTime, arrivalTime, economyPrice, businessPrice, firstclassPrice) VALUES ('$flightNumber', '$source', '$destination', '$departureDate', '$departureTime', '$arrivalTime', '$economyPrice', '$businessPrice', '$firstclassPrice')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='success-message'>New record created successfully</div>";
                    echo "<button class='add-again-btn' onclick=\"window.location.href='addflight.php';\">Add Again</button>"; // Fixed onclick attribute
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>
        </div>
    </section>
</body>

</html>