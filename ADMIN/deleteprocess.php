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
            color: #a83109;
            animation: fadeIn 1s ease-in-out;
            /* Added animation */
        }

        .add-again-btn {
            background-color: #c40707;
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
            background-color: #6b0c00;
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
            // Check if the form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve the data sent from the form
                $flightNumber = isset($_POST['flightNumber']) ? $_POST['flightNumber'] : '';
                $source = isset($_POST['source']) ? $_POST['source'] : '';
                $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
                $departureTime = isset($_POST['departureTime']) ? $_POST['departureTime'] : '';

                // SQL to delete a record
                $sql = "DELETE FROM flightinsert WHERE flightNumber='$flightNumber' AND source='$source' AND destination='$destination' AND departureTime='$departureTime'";

                if ($conn->query($sql) === TRUE) {
                    // Flight deleted successfully
                    echo "<div class='success-message'>Flight with Flight Number $flightNumber, Source $source, Destination $destination, Departure Time $departureTime deleted successfully.</div>";
                    echo "<button class='add-again-btn' onclick=\"window.location.href='deleteflight.php' ;\">Show Again</button>";
                } else {
                    // Error deleting flight
                    echo "Error deleting flight: " . $conn->error;
                }

                // Close connection
                $conn->close();
            }
            ?>


        </div>
    </section>
</body>

</html>