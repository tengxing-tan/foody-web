<?php
/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());
session_start();

$food_ID = $_GET['id'];
$foodTitle = $_POST['food-title'];
$foodCategory = $_POST['food-category'];
$foodDescription = $_POST['food-description'];
$foodImage = $_FILES['food-image']['name'];
$foodPrice = $_POST['food-price'];

$sql = "UPDATE `Food` SET `food_title`='$foodTitle'," .
    "`food_category_ID`='$foodCategory'," .
    "`food_description`='$foodDescription'," .
    "`food_image`='$foodImage'," .
    "`food_price`='$foodPrice' " .
    "WHERE `food_ID`='$foodID'";
