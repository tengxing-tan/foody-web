<!DOCTYPE html>
<?php
/**
 * Establish database
 * db name: 'foody'
 */
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());
/**
 * SESSION
 */
session_start();

$restaurantID = $_GET['id'];
$foodTitle = $_POST['foodTitle'];
$foodCategory = $_POST['foodCategory'];
$foodDescription = $_POST['foodDescription'];
$foodImage = $_FILES['foodImage']['name'];
$foodPrice = $_POST['foodPrice'];

/**
 * Store food image
 */
$target_file = "../assets/menu/$restaurantID/" . $foodImage;
// $target_file = $target_dir . basename($foodImage);
// echo $target_file;

$foodImage = $_FILES["foodImage"]["name"];
$tempname = $_FILES["foodImage"]["tmp_name"];
$folder = "../assets/menu/$restaurantID/" . $foodImage;


if (is_uploaded_file($foodImage)) {
  echo "<script>console.log('file is here.');</script>";
} else {
  echo "<script>console.log('nothing here.');</script>";
}


// Check file size
if ($_FILES["foodImage"]["size"] > 5000000) { // 5MB
  echo "<script>alert('Image file too large. (max 5MB)')</script>";
}

// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
  $msg = "Image uploaded successfully";
} else {
  $msg = "Failed to upload image";
}
echo $msg;

/**
 * mysql Qeury
 */
$sql = "INSERT INTO `Food`(`restaurant_ID`, `food_title`, `food_category_ID`, `food_description`, `food_image`, `food_price`) " .
  "VALUES ('$restaurantID','$foodTitle','$foodCategory','$foodDescription','$foodImage','$foodPrice')";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
  // echo 'add item ok';
  $_SESSION['status'] = 1;
} else {
  // echo $sql;
  $_SESSION['status'] = 0;
}

/**
 * Jump another page
 */
header('location: ../menu-list.php');
exit();

/**
 * Session => status
 * 0: nothing
 * 1: create
 * 2: update
 * 3: delete
 */
