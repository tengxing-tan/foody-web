<?php
/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());
$sql = "SELECT * FROM Food WHERE `restaurant_ID` = 1";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// print_r($result);