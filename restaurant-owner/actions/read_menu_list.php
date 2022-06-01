<?php
/**
 * Establish database
 * db name: 'foodydb'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foodydb", "3306") or die(mysqli_connect_error());

/**
 * read food detail
 */
$sql = "SELECT F.*, FC.category_name FROM `food` F INNER JOIN `foodcategory` FC WHERE F.food_category_ID = FC.food_category_ID";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;

/**
 * read food detail
 */
$sql = "SELECT * FROM `foodcategory`";
$resultFc = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// echo $sql;
