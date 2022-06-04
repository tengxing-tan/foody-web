<!DOCTYPE html>
<?php

/**
 * SESSION
 */
session_start();
// $_SESSION['restaurantID'] = $_POST['restaurantID'];
$_SESSION['restaurantID'] = 1;
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foody | UMP Food Delivery System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="styles/restaurant_owner.css">
  <link rel="stylesheet" href="styles/order_list.css">
  <!-- javascript -->
  <script src="scripts/RestaurantOwner.js" charset="utf-8"></script>
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body onload="activeNav('1')">
  <header>
    <?php include 'assets/reusable/header.php'; ?>
  </header>

  <!-- content -->
  <div id="content-wrapper">
    <?php include 'assets/reusable/navbar.php'; ?>

    <!-- main content (right side) -->
    <div id="main-content">
      <div class="two-pages-container">
        <div class="left-page">
          <div class="summary-highlight">
            <h3>Pending Order</h3>
            <p class="big-number">3190</p>
          </div>

          <div class="order-details-card">
            <div class="order-title">
              <span class="order-id">O001</span>
              <span class="order-date">2022-05-31 17:00:00</span>
            </div>

            <div class="order-details">
              <p>Nasi Goreng Kampung x1</p>
              <p>Nasi Goreng Ayam Merah x1</p>
              <p>Mee Goreng x1</p>
              <p>Teh ais x1</p>
            </div>

            <form class="order-action" method="post" action="#">
              <button type="button" class="order-button cancel-order-button">Cancel</button>
              <button type="button" class="order-button complete-order-button">Confirm</button>
            </form>
          </div>
          <div class="order-details-card">
            <div class="order-title">
              <span class="order-id">O001</span>
              <span class="order-date">2022-05-31 17:00:00</span>
            </div>

            <div class="order-details">
              <p>Nasi Goreng Kampung x1</p>
              <p>Nasi Goreng Ayam Merah x1</p>
              <p>Mee Goreng x1</p>
              <p>Teh ais x1</p>
            </div>

            <form class="order-action" method="post" action="#">
              <button type="button" class="order-button cancel-order-button">Cancel</button>
              <button type="button" class="order-button complete-order-button">Confirm</button>
            </form>
          </div>
          <div class="order-details-card">
            <div class="order-title">
              <span class="order-id">O001</span>
              <span class="order-date">2022-05-31 17:00:00</span>
            </div>

            <div class="order-details">
              <p>Nasi Goreng Kampung x1</p>
              <p>Nasi Goreng Ayam Merah x1</p>
              <p>Mee Goreng x1</p>
              <p>Teh ais x1</p>
            </div>

            <form class="order-action" method="post" action="#">
              <button type="button" class="order-button cancel-order-button">Cancel</button>
              <button type="button" class="order-button complete-order-button">Confirm</button>
            </form>
          </div>
          <div class="order-details-card">
            <div class="order-title">
              <span class="order-id">O001</span>
              <span class="order-date">2022-05-31 17:00:00</span>
            </div>

            <div class="order-details">
              <p>Nasi Goreng Kampung x1</p>
              <p>Nasi Goreng Ayam Merah x1</p>
              <p>Mee Goreng x1</p>
              <p>Teh ais x1</p>
            </div>

            <form class="order-action" method="post" action="#">
              <button type="button" class="order-button cancel-order-button">Cancel</button>
              <button type="button" class="order-button complete-order-button">Confirm</button>
            </form>
          </div>
        </div>

        <div class="right-page">
          <div class="summary-highlight" style="margin-bottom: 4rem;">
            <h3>Total Confirmed <br /> Orders</h3>
            <span class="big-number">15,789</span>
          </div>

          <div class="summary-highlight">
            <h3>Daily Earnings <br /> (RM) </h3>
            <span class="big-number">40,240</span>
          </div>

          <!-- chart -->
          <div id="daily-earnings-bar-chart">
            <div id="day-1" class="bar"></div>
            <div id="day-2" class="bar"></div>
            <div id="day-3" class="bar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>