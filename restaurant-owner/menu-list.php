<!DOCTYPE html>
<?php

/**
 * SESSION
 */
session_start();
$restaurantID = $_SESSION['restaurantID'];
// $restaurantID = 1;

// show alert message if user manage a menu item
include 'actions/alert_menu_status.php';

// read menu item from database
include 'actions/read_menu_list.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | UMP Food Delivery System</title>

    <!-- external stylesheet -->
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="./styles/restaurant_owner.css">
    <link rel="stylesheet" href="./styles/menu_list.css">
    <!-- javascript -->
    <script src="scripts/MenuList.js" type="text/javascript"></script>
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
            <!--
                FOOD CATOGORIES
             -->
            <form class="one-line-form" action="index.html" method="post">
                <div>
                    <label class="bold-label">Food Categories</label>
                    <!--
                        filter: show all item
                     -->
                    <button class="filter btn" type="button" value="all" onclick="filterFc(this.value)">All</button>

                    <?php
                    while ($rowFc = mysqli_fetch_array($resultFc)) {
                        /**
                         * generate food category button
                         * filter food category
                         */
                    ?>
                        <button class="filter btn secondary-btn" type="button" value="<?php echo $rowFc['food_category_ID']; ?>" onclick="filterFc(this.value)">
                            <?php echo $rowFc['category_name']; ?>
                        </button>

                    <?php
                    } // close while
                    ?>
                </div>
            </form>

            <!--
                SHOW MENU LIST
             -->
            <div class="menu-list" style="margin-bottom: 5rem;">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $foodImagePath = "assets/menu/$restaurantID/".$row['food_image'];
                        //print each row
                ?>
                        <a class="menu-item" href="view-menu-item.php?id=<?php echo $row['food_ID']; ?>">
                            <!--
                                Store food category id for filter purpose
                             -->
                            <span class="food-category-id" style="display: none;"><?php echo $row['food_category_ID']; ?></span>
                            <div>
                                <img class="food-picture preview" src="<?php echo (file_exists($foodImagePath)) ? $foodImagePath : 'assets/image/food_picture.png'; ?>" alt="<?php echo $row['food_title']; ?>">
                                <!-- <img class="food-picture preview" src="<?php echo "assets/menu/$restaurantID/".$row['food_picture']; ?>" alt="<?php echo $row['food_title']; ?>"> -->
                                <p class="food-title"><?php echo $row['food_title']; ?></p>
                                <p class="food-category"><?php echo $row['category_name'] ?></p>
                                <p class="food-desc"><?php echo $row['food_description']; ?></p>
                            </div>
                            <p class="food-price" onload="formatPrice()"><?php echo $row['food_price']; ?></p>
                        </a>
                <?php
                    } // close while
                } // close if
                ?>

                <!--
                    HTML EXAMPLE: MENU ITEM
                -->
                <!-- <a class="menu-item" href="view-menu-item.php">
                    <div>
                        <img class="food-picture" src="../assets/tempura.png" alt="">
                        <p class="food-title">Tempura</p>
                        <p class="food-desc">Tempura description</p>
                        <p class="">popular</p>
                    </div>
                    <p class="food-price">RM 15.90</p>
                </a> -->

            </div>

            <a href="add-menu-item.php"><button class="add-button" type="button">
                    <i class="fas fa-plus"></i>
                </button></a>
        </div>
    </div>
</body>

</html>
