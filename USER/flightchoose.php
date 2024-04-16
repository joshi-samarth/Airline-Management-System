<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flight Search</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-image: url("images/OIP.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }

    .book-container {
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      margin-top: 50px;
      transition: 0.5s;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 350px;
      background-color: rgba(255, 255, 255, 0.4);
      /*  transparent background */
      border: 2px solid #000000;
      /* black border */
      border-radius: 15px;
    }

    h2 {
      margin-top: 0;
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .btn {
      display: inline-block;
      margin: 10px;
      padding: 8px 16px;
      text-decoration: none;
      color: #ffffff;
      background-color: #ff9143;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #27ae60;
    }

    #flightsList {
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    .no-flights {
      color: #555;
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body onload="session()">
  <?php include ('dbconnect.php'); ?>
  <div class="book-container">
    <h2>Flight Search</h2>
    <form method="post" action="avaliableflight.php">
      <div class="form-group">
        <label for="source">Source:</label>
        <select id="source" name="source">
          <!-- Options will be populated dynamically -->
          <?php

          $sql = "SELECT DISTINCT source FROM flightinsert";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["source"] . "'>" . $row["source"] . "</option>";
            }
          }
          $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="destination">Destination:</label>
        <select id="destination" name="destination">
          <?php
          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT DISTINCT destination FROM flightinsert";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["destination"] . "'>" . $row["destination"] . "</option>";
            }
          }
          $conn->close();
          ?>
        </select>
      </div>
      <button type="submit" class="btn">Search Flights</button>
    </form>
    <div id="flightsList"></div>
  </div>
  <script src="script/loginOrNot.js"></script>
  <script>
    function searchFlights() {
      var source = document.getElementById('source').value;
      var destination = document.getElementById('destination').value;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'avaliableflight.php?source=' + source + '&destination=' + destination, true);//search.php

      xhr.onload = function () {
        if (xhr.status == 200) {
          document.getElementById('flightsList').innerHTML = xhr.responseText;
        } else {
          console.error('Request failed. Error code: ' + xhr.status);
        }
      };

      xhr.send();
    }
  </script>
</body>

</html>