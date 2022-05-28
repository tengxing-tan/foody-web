<!DOCTYPE html>
<?php
/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());

$restaurantID = $_GET['id'];
$foodTitle = $_POST['food-title'];
$foodCategory = $_POST['food-category'];
$foodDescription = $_POST['food-description'];
$foodImage = $_FILES['food-image']['name'];
$foodPrice = $_POST['food-price'];

/**
 * Store food image
 */
$target_dir = "../assets/menu/$restaurantID/";
$target_file = $target_dir . basename($foodImage);
// echo $target_file;

// Check file size
if ($_FILES["food-image"]["size"] > 5000000) { // 5MB
  echo "<script>alert('Image file too large. (max 5MB)')</script>";
}

// upload file
if (move_uploaded_file($_FILES['food-image']['tmp_name'], $target_file)) {
  echo "<script>console.log('file uploaded.');</script>";
} else {
  echo "<script>console.log('cannot upload file.');</script>";
}
// header('location: ../add-menu-item.php');

/**
 * mysql Qeury
 */
// $sql = "SELECT * FROM `user` WHERE `id` =" . $_GET["id"];
$sql = "INSERT INTO `Food`(`restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`) ".
"VALUES ('$restaurantID','$foodTitle','$foodCategory','$foodDescription','$foodImage','$foodPrice')";
print_r($sql);

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

/**
 * Jump another page
 */
if ($result) {
    // header("location:../add-menu-item.php");
    exit();
} else {
    // header("location:../index.html");
    exit();
}
