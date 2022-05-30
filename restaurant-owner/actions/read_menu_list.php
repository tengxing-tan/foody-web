<?php
/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());

/**
 * read food detail
 */
$sql = "SELECT F.*, FC.category_name FROM `Food` F INNER JOIN FoodCategory FC WHERE F.food_category_ID = FC.food_category_ID";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;

/**
 * read food detail
 */
$sql = "SELECT * FROM `FoodCategory`";
$resultFc = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;
