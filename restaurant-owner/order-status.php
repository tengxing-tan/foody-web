<!DOCTYPE html>
<?php
/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;

/**
 * read menu item from database
 */
include 'actions/read_order_status.php';
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
    <link rel="stylesheet" href="styles/menu_list.css">
    <link rel="stylesheet" href="styles/order_list.css">
    <!-- javascript -->
    <script src="scripts/MenuList.js" charset="utf-8"></script>
    <!-- icon library | font awesome -->
    <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
    <script>
        function filterOrderStatus(selectOrderStatus) {
            const orderStatus = document.getElementsByClassName('order-status');
            // console.log(orderStatus.length, "items");

            // show all item
            if (selectOrderStatus === 'all') {
                for (let i = 0; i < orderStatus.length; i++) {
                    orderStatus[i].parentElement.parentElement.parentElement.style.display = "grid";
                }
            } else {

                // show category: main,side dish, drink
                for (let i = 0; i < orderStatus.length; i++) {
                    if (orderStatus[i].innerHTML !== selectOrderStatus) {

                        orderStatus[i].parentElement.parentElement.parentElement.style.display = "none";
                    } else {
                        orderStatus[i].parentElement.parentElement.parentElement.style.display = "grid";
                    }
                    // console.log(orderStatus[i].innerHTML, showFc, orderStatus[i].innerHTML !== showFc);
                }
            }
            /**
             * change button color
             */
            const filter = document.getElementsByClassName('filter');
            // console.log(filter);

            for (let i = 0; i < filter.length + 1; i++) {
                if (filter[i].value == selectOrderStatus) {

                    filter[i].style.backgroundColor = 'black';
                } else {
                    filter[i].style.backgroundColor = 'white';
                }
                // console.log(typeof filter[i], selectOrderStatus);
                // console.log(filter[i].className)
            }
        }
    </script>
</head>

<body onload="filterOrderStatus('ordered')">
    <header>
        <?php include 'assets/reusable/header.php'; ?>
    </header>

    <!-- content -->
    <div id="content-wrapper">
        <?php include 'assets/reusable/navbar.php'; ?>

        <!-- main content (right side) -->
        <div id="main-content">

            <div class="one-line-form">
                <button class="filter btn secondary-btn" onclick="filterOrderStatus('ordered')"><i class="fa-solid fa-clipboard" style="margin-right: 0.5rem"></i>ordered</button>
                <button class="filter btn secondary-btn" onclick="filterOrderStatus('preparing')"><i class="fa-solid fa-clock" style="margin-right: 0.5rem"></i>preparing</button>
                <button class="filter btn secondary-btn" onclick="filterOrderStatus('prepared')"><i class="fa-solid fa-paper-plane" style="margin-right: 0.5rem"></i>prepared</button>
                <button class="filter btn secondary-btn" onclick="filterOrderStatus('completed')"><i class="fa-solid fa-check" style="margin-right: 0.5rem"></i>completed</button>
                <button class="filter btn secondary-btn" onclick="filterOrderStatus('cancelled')"><i class="fa-solid fa-xmark" style="margin-right: 0.5rem"></i>cancelled</button>
            </div>

            <div class="order-list">
                <?php
                while ($row = mysqli_fetch_assoc($result_order)) {
                ?>
                    <div class="order-details-card">
                        <div class="order-title">
                            <div>
                                <span class="order-id"><?php echo $row['order_ID']; ?></span>
                                <p class="order-status"><?php echo $row['order_status']; ?></p>
                            </div>
                            <span class="order-date"><?php echo $row['order_date'] . ' ' . $row['order_time']; ?></span>
                        </div>

                        <div class="order-details">
                            <?php
                            // check if order had fetch before
                            if (isset($firstItem)) {
                                if ($firstItem['order_ID'] === $row['order_ID']) {
                                    echo "<p>" . $firstItem['food_title'] . "  x" . $firstItem['food_quantity'] . "</p>";
                                }
                            }

                            while ($row_ordered_food = mysqli_fetch_assoc($result_ordered_food)) {
                                // check order id
                                if ($row_ordered_food['order_ID'] == $row['order_ID']) {
                                    echo "<p>" . $row_ordered_food['food_title'] . "  x" . $row_ordered_food['food_quantity'] . "</p>";
                                } else {
                                    $firstItem = $row_ordered_food;
                                }
                            } // close while
                            ?>
                        </div>

                        <br />

                        <!-- 
                                Total amount
                             -->
                        <p>Total: <span class="food-price"><?php echo ' ' . $row['total_amount']; ?></span></p>

                        <!-- 
                                update order status
                             -->
                        <div class="order-action">
                            <?php
                            $actionButton = '';
                            switch ($row['order_status']) {
                                case 'ordered':
                                    echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=cancelled"><button type="button" class="order-button cancel-order-button">Cancel</button></a>';
                                    $actionButton = 'confirm';
                                    break;
                                case 'preparing':
                                    echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=cancelled"><button type="button" class="order-button cancel-order-button">Cancel</button></a>';
                                    $actionButton = 'prepared';
                                    break;
                                default:
                                    unset($actionButton);
                                    break;
                                }
                                if (isset($actionButton)) {
                                    echo '<a href="actions/update_order_status.php?id=' . $row['order_ID'] . '&status=' . $actionButton.'"><button type="button" class="order-button complete-order-button">'.$actionButton.'</button></a>';
                                }
                            ?>
                        </div>
                    </div>
                <?php
                } // close while
                ?>
            </div>
        </div>
    </div>
</body>

</html>