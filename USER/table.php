<?php

include 'dbconnect.php';

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

    // Create table name based on flight details with spaces replaced by underscores
    $tableName = $flightNumber . "_" . $source . "_" . $destination . "_" . str_replace('-', '_', $departureDate) . "_" . str_replace(':', '_', $departureTime);

    // Create the table dynamically
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255),
        flightNumber VARCHAR(255),
        name VARCHAR(255),
        gender VARCHAR(10),
        email VARCHAR(255),
        age INT,
        mobile VARCHAR(20),
        seat VARCHAR(10),
        price DECIMAL(10,2),
        source VARCHAR(3),
        destination VARCHAR(3),
        departureDate DATE,
        departureTime TIME,
        arrivalTime TIME,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


    if ($conn->query($sql) === TRUE) {

        echo "<form id='postForm' action='seat.php' method='post'>";
        foreach ($_POST as $key => $value) {
            echo "<input type='hidden' name='$key' value='$value'>";
        }
        echo "<input type='hidden' name='tableName' value='$tableName'>";
        echo "</form>";
        echo "<script>document.getElementById('postForm').submit();</script>";
        exit;
    } else {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "<p>No form data submitted.</p>";
}
$conn->close();
?>