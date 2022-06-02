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
</head>

<body>
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
                                <a href="<?php echo 'actions/update_order_status.php?id=' . $row['order_ID'] . '&status=cancelled'; ?>"><button type="button" class="order-button cancel-order-button">Cancel</button></a>
                                <a href="<?php echo 'actions/update_order_status.php?id=' . $row['order_ID'] . '&status=preparing'; ?>"><button type="button" class="order-button complete-order-button">Confirm</button></a>
                            </div>
                        </div>
                    <?php
                    } // close while
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>