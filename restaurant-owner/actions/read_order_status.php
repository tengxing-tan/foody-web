<?php

include 'db_connect.php';

/**
 * read order
 */
$sql = "SELECT `order_ID`, `order_date`, `order_time`, `order_status`, `total_amount` FROM `order` WHERE `restaurant_ID` = '$restaurantID' ORDER BY `order_date` DESC, `order_time` DESC";
// echo $sql;

$result_order = mysqli_query($conn, $sql) or die(mysqli_error($conn));

/**
 * read ordered food
 */
$sql = "SELECT O.order_ID, F.food_title, OFOOD.food_quantity FROM `order` O, `food` F INNER JOIN  `orderedfood` OFOOD WHERE O.order_ID = OFOOD.order_ID AND O.restaurant_ID = '$restaurantID'";
// $sql = "SELECT O.order_id, OFOOD.food_id, F.food_title FROM `order` O, `food` F INNER JOIN  `orderedfood` OFOOD WHERE O.order_ID = OFOOD.order_ID AND O.restaurant_ID = 1 AND O.order_ID = 1";
$result_ordered_food = mysqli_query($conn, $sql) or die(mysqli_error($conn));
