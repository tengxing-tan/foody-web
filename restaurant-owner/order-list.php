<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="styles/restaurant_owner.css">
    <link rel="stylesheet" href="styles/menu_list.css">
    <link rel="stylesheet" href="styles/order_list.css">
    <!-- javascript -->
    <script src="scripts/MenuList.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
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
            <form class="one-line-form" action="index.html" method="post">
                <input id="search-bar" type="date" name="order-date">
                <button type="submit" name="search" class="btn" style="margin-left: 1rem;">Search</button>
            </form>

            <div class="order-list-container">
                <div class="order-status-menu">
                    <ul>
                        <li><i class="fa-solid fa-clock" style="margin-right: 0.5rem"></i> Preparing</li>
                        <li><i class="fa-solid fa-paper-plane" style="margin-right: 0.5rem"></i> Prepared</li>
                        <li><i class="fa-solid fa-check" style="margin-right: 0.5rem"></i> Complete</li>
                        <li><i class="fa-solid fa-clipboard" style="margin-right: 0.5rem"></i> All</li>
                    </ul>
                </div>
                <div class="order-list">
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
                            <p class="order-status">Confirm</p>
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
                            <p class="order-status">Confirm</p>
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
                            <p class="order-status">Confirm</p>
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
                            <p class="order-status">Confirm</p>
                            <button type="button" class="order-button cancel-order-button">Cancel</button>
                            <button type="button" class="order-button complete-order-button">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>