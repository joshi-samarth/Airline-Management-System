<?php
session_start();
$user_id = $_SESSION['user_id'];
include 'dbconnect.php';
// Query to get the count of flights
$sql_flight_count = "SELECT COUNT(*) AS flight_count FROM flightinsert";
$result_flight_count = mysqli_query($conn, $sql_flight_count);

// Query to get the total earning
$sql_total_earning = "SELECT SUM(price) AS total_earning FROM totalbookings";
$result_total_earning = mysqli_query($conn, $sql_total_earning);

// Query to get the count of customers
$sql_customer_count = "SELECT COUNT(*) AS customer_count FROM user";
$result_customer_count = mysqli_query($conn, $sql_customer_count);

// Query to get the count of admins
$sql_admin_count = "SELECT COUNT(*) AS admin_count FROM totalbookings";
$result_admin_count = mysqli_query($conn, $sql_admin_count);

// Fetching results and handling errors
if ($result_flight_count && $result_total_earning && $result_customer_count && $result_admin_count) {
  // Fetching flight count
  $row_flight_count = mysqli_fetch_assoc($result_flight_count);
  $numberOfFlights = $row_flight_count['flight_count'];

  // Fetching total earning
  $row_total_earning = mysqli_fetch_assoc($result_total_earning);
  $totalEarning = $row_total_earning['total_earning'];

  // Fetching customer count
  $row_customer_count = mysqli_fetch_assoc($result_customer_count);
  $numberOfCustomers = $row_customer_count['customer_count'];

  // Fetching admin count
  $row_admin_count = mysqli_fetch_assoc($result_admin_count);
  $numberOfAdmins = $row_admin_count['admin_count'];

  function formatEarnings($earning)
  {
    if ($earning >= 1000000) {
      // Convert to million format
      $earning = number_format($earning / 1000000, 2, '.', ',') . " m";
    } elseif ($earning >= 1000) {
      // Convert to 'k' format
      $earning = number_format($earning / 1000, 0, '.', ',') . "k";
    } else {
      // Keep the original value
      $earning = number_format($earning, 0, '.', ',');
    }
    return $earning;
  }

  // Format earnings
  $totalEarning = formatEarnings($totalEarning);

  // Freeing result sets
  mysqli_free_result($result_flight_count);
  mysqli_free_result($result_total_earning);
  mysqli_free_result($result_customer_count);
  mysqli_free_result($result_admin_count);

  // Closing connection
  mysqli_close($conn);
} else {
  // Handle the case where any query fails
  $numberOfFlights = "Error fetching flight count";
  $totalEarning = "Error fetching total earning";
  $numberOfCustomers = "Error fetching customer count";
  $numberOfAdmins = "Error fetching admin count";
}
?>


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

    .recentCustomers {
      position: relative;
      display: grid;
      min-height: 500px;
      padding: 20px;
      background: var(--white);
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      border-radius: 20px;
    }

    .recentCustomers .imgBx {
      position: relative;
      width: 40px;
      height: 40px;
      border-radius: 50px;
      overflow: hidden;
    }

    .recentCustomers .imgBx img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .recentCustomers table tr td {
      padding: 12px 10px;
    }

    .recentCustomers table tr td h4 {
      font-size: 16px;
      font-weight: 500;
      line-height: 1.2rem;
    }

    .recentCustomers table tr td h4 span {
      font-size: 14px;
      color: black;
    }

    .recentCustomers table tr:hover {
      background: blue;
      color: white;
    }

    .recentCustomers table tr:hover td h4 span {
      color: white;
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

  <section class="home-section">
    <div class="main" id="dashboard-content">
      <div class="topbar">

        <div class="search">
          <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>

        <div class="user">
          <?php
          include 'dbconnect.php';

          $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
          if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
          }
          if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
          } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
          }
          mysqli_close($conn);
          ?>
        </div>

      </div>
      <div class="cardBox">
        <div class="card">
          <div>
            <div class="numbers">
              <?php echo $numberOfAdmins; ?>
            </div>
            <div class="cardName">Number of Bookings</div>
          </div>

          <div class="iconBx">
            <ion-icon name="airplane-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">
              <?php echo $numberOfFlights; ?>
            </div>
            <div class="cardName">Total Flights</div>
          </div>

          <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">
              <?php echo $numberOfCustomers; ?>
            </div>
            <div class="cardName">Number of register users</div>
          </div>

          <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>

            <div class="numbers">
              <?php echo $totalEarning; ?>
            </div>
            <div class="cardName">Earning</div>
          </div>

          <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
          </div>
        </div>
      </div>
      <div class="details">
        <div class="recentOrders">
          <div class="cardHeader">
            <h2>Number Of flights</h2>
            <!-- <a href="#" class="btn">View All</a> -->
          </div>
          <?php
          include 'dbconnect.php';

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
          </tr>';
            }
            echo '</tbody></table>';
          } else {
            echo "No data found";
          }


          mysqli_close($conn);
          ?>

        </div>
        <?php
        include 'dbconnect.php';

        $sql = "SELECT name, image FROM user_form";
        $result = $conn->query($sql);

        ?>

        <div class="recentCustomers">
          <div class="cardHeader">
            <h2>Number of Admin</h2>
          </div>

          <table>
            <?php

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td width="60px">
                    <?php
                    // Check if the current row has an image
                    if ($row['image'] == '') {
                      echo "<div class='imgBx'><img src='images/default-avatar.png'></div>";
                    } else {
                      echo "<div class='imgBx'><img src='uploaded_img/{$row['image']}'></div>";
                    }
                    ?>
                  </td>
                  <td>
                    <h4>
                      <?php echo $row['name']; ?>
                    </h4>
                  </td>
                </tr>
                <?php
              }
            } else {
              echo "<tr><td colspan='2'>0 results</td></tr>";
            }
            ?>
          </table>

        </div>

        <?php
        $conn->close();
        ?>


      </div>


    </div>

  </section>

</body>

</html>