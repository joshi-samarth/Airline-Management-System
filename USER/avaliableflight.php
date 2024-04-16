<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .ag-format-container {
      width: 1142px;
      margin: 0 auto;
    }

    body {
      background-color: #000;
    }

    .ag-courses_box {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: start;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      padding: 50px 0;
    }

    .ag-courses_item {
      -ms-flex-preferred-size: calc(33.33333% - 30px);
      flex-basis: calc(33.33333% - 30px);
      margin: 0 15px 30px;
      overflow: hidden;
      border-radius: 28px;
    }

    .ag-courses-item_link {
      display: block;
      padding: 30px 20px;
      background-color: #121212;
      overflow: hidden;
      position: relative;
    }

    .ag-courses-item_link:hover,
    .ag-courses-item_link:hover .ag-courses-item_date {
      text-decoration: none;
      color: #fff;
    }

    .ag-courses-item_link:hover .ag-courses-item_bg {
      -webkit-transform: scale(10);
      -ms-transform: scale(10);
      transform: scale(10);
    }

    .ag-courses-item_title {
      min-height: 87px;
      margin: 0 0 25px;
      overflow: hidden;
      font-weight: bold;
      font-size: 30px;
      color: #fff;
      z-index: 2;
      position: relative;
    }

    .ag-courses-item_date-box {
      font-size: 18px;
      color: #fff;
      z-index: 2;
      position: relative;
    }

    .ag-courses-item_date {
      font-weight: bold;
      color: #f9b234;

      -webkit-transition: color 0.5s ease;
      -o-transition: color 0.5s ease;
      transition: color 0.5s ease;
    }

    .ag-courses-item_bg {
      height: 128px;
      width: 128px;
      background-color: #f9b234;

      z-index: 1;
      position: absolute;
      top: -75px;
      right: -75px;

      border-radius: 50%;

      -webkit-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
    }

    .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
      background-color: #3ecd5e;
    }

    .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
      background-color: #e44002;
    }

    .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
      background-color: #952aff;
    }

    .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
      background-color: #cd3e94;
    }

    .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
      background-color: #4c49ea;
    }

    @media only screen and (max-width: 979px) {
      .ag-courses_item {
        -ms-flex-preferred-size: calc(50% - 30px);
        flex-basis: calc(50% - 30px);
      }

      .ag-courses-item_title {
        font-size: 24px;
      }
    }

    @media only screen and (max-width: 767px) {
      .ag-format-container {
        width: 96%;
      }
    }

    @media only screen and (max-width: 639px) {
      .ag-courses_item {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
      }

      .ag-courses-item_title {
        min-height: 72px;
        line-height: 1;

        font-size: 24px;
      }

      .ag-courses-item_link {
        padding: 22px 40px;
      }

      .ag-courses-item_date-box {
        font-size: 16px;
      }
    }
  </style>
</head>

<body onload="session()">
  <?php include ('dbconnect.php'); ?>
  <div class="ag-format-container">
    <div class="ag-courses_box">

      <?php

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $source = $_POST['source'];
        $destination = $_POST['destination'];

        $sql = "SELECT * FROM flightinsert WHERE source='$source' AND destination='$destination' AND REPLACE(departureDate, '-', '_') >= CURDATE()";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

            echo "<div class='ag-courses_item'>";
            echo "<div class='ag-courses-item_link'>";
            echo "<div class='ag-courses-item_bg'></div>";
            echo "<div class='ag-courses-item_date-box'>";
            echo "<div class='flight' onclick='selectFlight(" . htmlspecialchars(json_encode($row)) . ")'>";
            echo "<p><strong>Flight Number:</strong> " . $row["flightNumber"] . "</p>";
            echo "<p><strong>Source:</strong> " . $row["source"] . "</p>";
            echo "<p><strong>Destination:</strong> " . $row["destination"] . "</p>";
            echo "<p><strong>Departure Date:</strong> " . $row["departureDate"] . "</p>";
            echo "<p><strong>Departure Time:</strong> " . $row["departureTime"] . "</p>";
            echo "<p><strong>Arrival Time:</strong> " . $row["arrivalTime"] . "</p>";
            echo "<p><strong>Economy Price:</strong> ₹" . $row["economyPrice"] . "</p>";
            echo "<p><strong>Business Price:</strong> ₹" . $row["businessPrice"] . "</p>";
            echo "<p><strong>First Class Price:</strong> ₹" . $row["firstclassPrice"] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

          }
        } else {
          echo "<div class='ag-courses_item'>";
          echo "<div class='ag-courses-item_link'>";
          echo "<div class='ag-courses-item_bg'></div>";
          echo "<div class='ag-courses-item_date-box'>";
          echo "<h1><center>No flights found.</center></h1>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      }
      $conn->close();
      ?>
    </div>
  </div>

  <script src="script/loginOrNot.js"></script>
  <script>
    function selectFlight(flightData) {
      var form = document.createElement('form');
      form.method = 'post';
      form.action = 'table.php'; // Change 'table.php' to your desired destination page

      // Create input fields and add them to the form
      for (var key in flightData) {
        if (flightData.hasOwnProperty(key)) {
          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = key;
          input.value = flightData[key];
          form.appendChild(input);
        }
      }

      // Add the form to the document body and submit it
      document.body.appendChild(form);
      form.submit();
    }
  </script>

</body>

</html>