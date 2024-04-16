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
    .main {
      position: absolute;
      width: 100%;
      min-height: 100vh;
      background: white;
      transition: 0.5s;
    }

    .main.active {
      width: calc(100% - 80px);
      left: 80px;
    }

    .action-btn {
      padding: 8px 16px;
      background-color: #f44336;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
      font-size: 14px;
    }

    .action-btn:hover {
      background-color: #d32f2f;
    }

    .cardBox {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 30px;
    }

    .cardBox .card {
      position: relative;
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    }

    .cardBox .card .numbers {
      position: relative;
      font-weight: 500;
      font-size: 2.5rem;
      color: blue;
    }

    .cardBox .card .cardName {
      color: var(--black2);
      font-size: 1.1rem;
      margin-top: 5px;
    }

    .cardBox .card .iconBx {
      font-size: 3.5rem;
      color: black;
    }

    .cardBox .card:hover {
      background: blue;
    }

    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx {
      color: white;
    }

    .topbar {
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 10px;
    }

    .search {
      position: relative;
      width: 400px;
      margin: 0 10px;
    }

    .search label {
      position: relative;
      width: 100%;
    }

    .search label input {
      width: 100%;
      height: 40px;
      border-radius: 40px;
      padding: 5px 20px;
      padding-left: 35px;
      font-size: 18px;
      outline: none;
      border: 1px solid black;
    }

    .search label ion-icon {
      position: absolute;
      top: 0;
      left: 10px;
      font-size: 1.2rem;
    }

    .user {
      position: relative;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }

    .user img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .details {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: 2fr 1fr;
      grid-gap: 30px;
      /* margin-top: 10px; */
    }

    .details .recentOrders {
      position: relative;
      display: grid;
      min-height: 500px;
      background: var(--white);
      padding: 20px;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      border-radius: 20px;
    }

    .details .cardHeader {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .cardHeader h2 {
      font-weight: 600;
      color: blue;
    }

    .cardHeader .btn {
      position: relative;
      padding: 5px 10px;
      background: blue;
      text-decoration: none;
      color: white;
      border-radius: 6px;
    }

    .details table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .details table thead td {
      font-weight: 600;
    }

    .details .recentOrders table tr {
      color: black;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .recentOrders table tr:last-child {
      border-bottom: none;
    }

    .details .recentOrders table tbody tr:hover {
      background: blue;
      color: white;
    }

    .details .recentOrders table tr td {
      padding: 10px;
    }

    .details .recentOrders table tr td:last-child {
      text-align: end;
    }

    .details .recentOrders table tr td:nth-child(2) {
      text-align: end;
    }

    .details .recentOrders table tr td:nth-child(3) {
      text-align: center;
    }

    .status.delivered {
      padding: 2px 4px;
      background: #8de02c;
      color: white;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
    }

    .status.pending {
      padding: 2px 4px;
      background: #e9b10a;
      color: white;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
    }

    .status.return {
      padding: 2px 4px;
      background: #f00;
      color: white;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
    }

    .status.inProgress {
      padding: 2px 4px;
      background: #1795ce;
      color: white;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
    }

    @media (max-width: 991px) {
      .navigation {
        left: -300px;
      }

      .navigation.active {
        width: 300px;
        left: 0;
      }

      .main {
        width: 100%;
        left: 0;
      }

      .main.active {
        left: 300px;
      }

      .cardBox {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .details {
        grid-template-columns: 1fr;
      }

      .recentOrders {
        overflow-x: auto;
      }

      .status.inProgress {
        white-space: nowrap;
      }
    }

    @media (max-width: 480px) {
      .cardBox {
        grid-template-columns: repeat(1, 1fr);
      }

      .cardHeader h2 {
        font-size: 20px;
      }

      .user {
        min-width: 40px;
      }

      .navigation {
        width: 100%;
        left: -100%;
        z-index: 1000;
      }

      .navigation.active {
        width: 100%;
        left: 0;
      }

      .toggle {
        z-index: 10001;
      }

      .main.active .toggle {
        color: #fff;
        position: fixed;
        right: 0;
        left: initial;
      }
    }
  </style>
</head>

<body onload="session()">
  <?php include ('nav.html'); ?>
  <?php include ('dbconnect.php'); ?>

  <section class="home-section">
    <div class="main" id="dashboard-content">
      <div class="topbar">

        <div class="search">
          <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>

      </div>
      <div class="cardBox">

      </div>
      <div class="details">
        <div class="recentOrders">
          <div class="cardHeader">
            <h2>Flights</h2>
          </div>
          <?php

          // Fetching all data from the database
          $query = "SELECT * FROM flightinsert";
          $result = mysqli_query($conn, $query);

          // Check if there are any rows returned
          if (mysqli_num_rows($result) > 0) {
            echo '<table>
        <thead>
          <tr>
            <td>Flight Number</td>
            <td>Source</td>
            <td>Destination</td>
            <td>Departure Date</td>
            <td>Departure time</td>
            <td>Arrival Time</td>
            <td>Business Price</td>
            <td>First Price</td>
            <td>Economy Price</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                <td>' . $row['flightNumber'] . '</td>
                <td>' . $row['source'] . '</td>
                <td>' . $row['destination'] . '</td>
                <td>' . $row['departureDate'] . '</td>
                <td>' . $row['departureTime'] . '</td>
                <td>' . $row['arrivalTime'] . '</td>
                <td>' . $row['businessPrice'] . '</td>
                <td>' . $row['firstclassPrice'] . '</td>
                <td>' . $row['economyPrice'] . '</td>
                <td><button class="action-btn" onclick="performAction(\'' . htmlspecialchars($row['flightNumber']) . '\', \'' . htmlspecialchars($row['source']) . '\', \'' . htmlspecialchars($row['destination']) . '\', \'' . htmlspecialchars($row['departureTime']) . '\')">Delete</button></td>
            </tr>';
            }
            echo '</tbody></table>';
          } else {
            echo "No data found";
          }

          // Close the connection
          mysqli_close($conn);
          ?>

        </div>
      </div>
    </div>
    <form id="postDataForm" action="deleteprocess.php" method="post">
      <input type="hidden" id="tableDataInput" name="tableData">
    </form>
  </section>
  <script>


    document.addEventListener("DOMContentLoaded", function () {
      // Get the input element
      var searchInput = document.querySelector('.search input');

      // Add event listener for input event
      searchInput.addEventListener('input', function () {
        var searchTerm = this.value.trim().toLowerCase();
        var rows = document.querySelectorAll('.details .recentOrders table tbody tr');

        rows.forEach(function (row) {
          var flightNumber = row.cells[0].textContent.trim().toLowerCase();
          var source = row.cells[1].textContent.trim().toLowerCase();
          var destination = row.cells[2].textContent.trim().toLowerCase();

          // Check if any of the cell content matches the search term
          if (flightNumber.includes(searchTerm) || source.includes(searchTerm) || destination.includes(searchTerm)) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    });

    function performAction(flightNumber, source, destination, departureTime) {
      // Create a form element
      var form = document.createElement('form');
      form.setAttribute('method', 'post');
      form.setAttribute('action', 'deleteprocess.php');

      // Create hidden input fields for each parameter
      var flightNumberInput = document.createElement('input');
      flightNumberInput.setAttribute('type', 'hidden');
      flightNumberInput.setAttribute('name', 'flightNumber');
      flightNumberInput.setAttribute('value', flightNumber);

      var sourceInput = document.createElement('input');
      sourceInput.setAttribute('type', 'hidden');
      sourceInput.setAttribute('name', 'source');
      sourceInput.setAttribute('value', source);

      var destinationInput = document.createElement('input');
      destinationInput.setAttribute('type', 'hidden');
      destinationInput.setAttribute('name', 'destination');
      destinationInput.setAttribute('value', destination);

      var departureTimeInput = document.createElement('input');
      departureTimeInput.setAttribute('type', 'hidden');
      departureTimeInput.setAttribute('name', 'departureTime');
      departureTimeInput.setAttribute('value', departureTime);

      // Append the input fields to the form
      form.appendChild(flightNumberInput);
      form.appendChild(sourceInput);
      form.appendChild(destinationInput);
      form.appendChild(departureTimeInput);

      // Append the form to the document body and submit it
      document.body.appendChild(form);
      form.submit();
    }



  </script>
</body>

</html>