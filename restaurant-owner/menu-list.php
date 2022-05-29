<!DOCTYPE html>
<?php
// Establish MySQL connection
/**
 * Establish database
 * db name: 'foody'
 */
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());
session_start();
include 'actions/alert_menu_status.php';
session_destroy();
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
                    <input class="btn" type="button" name="main-dishes" value="Main dishes">
                    <input class="btn secondary-btn" type="button" name="side-dishes" value="Side dishes" style="margin-left: 1rem;">
                    <input class="btn secondary-btn" type="button" name="drinks" value="Drinks" style="margin-left: 1rem;">
                </div>
            </form>

            <!-- 
                SHOW MENU LIST
             -->
            <div class="menu-list">
                <?php
                include 'actions/read_menu_list.php';

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        //print each row
                ?>
                        <a class="menu-item" href="view-menu-item.php?id=<?php echo $row['food_ID']; ?>">
                            <div>
                                <img class="food-picture" src="assets/menu/<?php echo $row['restaurant_ID'] . '/' . $row['food_image']; ?>" alt="<?php echo $row['food_title']; ?>">
                                <p class="food-title"> <?php echo $row['food_title']; ?> </p>
                                <p> <?php echo $row['category_name'] ?> </p>
                                <p class="food-desc"> <?php echo $row['food_description']; ?> </p>
                            </div>
                            <p class="food-price" onload="formatPrice()"> <?php echo $row['food_price']; ?> </p>
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