<!DOCTYPE html>
<?php

/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $_SESSION['restaurantID'] = 1;
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
    <script src="scripts/QrCodeModule.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <!-- qr code generator -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body onload="init()">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">
            <div style="display: grid; place-items: center; width: 100%; height: 100%;">
                <div style="background-color: white; padding: 1rem;">
                    <div id="QRCode"></div>
                </div>
                <p>test qr code </p>
            </div>
        </div>
    </div>
</body>

</html>