<?php
/**
 * Session
 */
session_start();

/**
 * Establish database
 * db name: 'foody'
*/
$conn = mysqli_connect("localhost", "root", NULL, "foody", "3306") or die(mysqli_connect_error());
// $restaurant_ID = $_SESSION['restaurant_ID'];
$restaurant_ID = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foody | UMP Food Delivery System</title>

  <!-- external stylesheet -->
  <link rel="stylesheet" href="../styles/main.css">
  <link rel="stylesheet" href="styles/restaurant_owner.css">
  <link rel="stylesheet" href="styles/manage_menu_item.css">
  <!-- icon library | font awesome -->
  <script src="https://kit.fontawesome.com/06b2bd9377.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- title bar -->
  <div id="title-bar">
    <!-- foody logo -->
    <a id="foody-link" class="icon-link" href="#index.html">Foody</a>

    <!-- user profile -->
    <div>
      <a class="icon-link" href="#">
        Rider
        <i class="fa-solid fa-user"></i>
      </a>
    </div>
  </div>

  <!-- content -->
  <div id="content-wrapper">
    <!-- navigation bar (left side) -->
    <nav id="nav-bar">
      <ul>
        <li><a class="nav-link" href="index.html#">Summary</a></li>
        <li><a class="nav-link" href="menu-list.php">Menu List</a></li>
        <li><a class="nav-link" href="order-list.html">Order List</a></li>
        <li><a class="nav-link" href="sales-report.html">Sales Report</a></li>
      </ul>
    </nav>

    <!-- main content (right side) -->
    <div id="main-content">
      <form class="user-input-form" action="actions/create_menu_item.php?id=<?php echo $restaurant_ID; ?>" method="post" enctype="multipart/form-data">
        <!-- Food title -->
        <label class="bold-label required-input" for="foodTitle">Food title</label>
        <input class="text-input" type="text" name="foodTitle" placeholder="Enter food title" required>
        <!-- Food category -->
        <label class="bold-label required-input" for="foodCategory">Food category</label>
        <select class="text-input" name="foodCategory" required>
          <?php
          $sql = "SELECT * FROM `FoodCategory`";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          
          while ($row = mysqli_fetch_assoc($result)) {
            //print each row
            ?>
            <option value="<?php echo $row['food_category_ID']; ?>">
              <?php echo $row['category_name']; ?>
            </option>
            <?php
          } // close while mysqli fetch
          ?>
        </select>
        <!-- Food description -->
        <label class="bold-label" for="foodDescription">Food description</label>
        <textarea class="text-input" name="foodDescription" rows="5" cols="80">None</textarea>
        <!-- Price -->
        <label class="bold-label required-input" for="foodPrice">Price (RM)</label>
        <input class="text-input" type="number" name="foodPrice" value="0" step=0.01
 required>
        <!-- Food picture -->
        <label class="bold-label required-input" for="foodImage">Food picture</label>
        <!-- upload food picture -->
        <!-- remember to add inside form: enctype="multipart/form-data" -->
        <div>
          <input type="file" id="input-food-image" name="foodImage" accept="image/*" onchange="updateImageDisplay()">
          <img id="preview" src="" alt="Preview">
        </div>
        <!-- Add button -->
        <button class="btn submit-button" type="submit" name="submit" value="add-menu">Add</button>
      </form>
    </div>
  </div>
</body>
<script type="text/javascript">
  /**
   * Preview food image
   */
  function updateImageDisplay() {
    const file = document.getElementById('input-food-image').files;
    const preview = document.getElementById('preview');
    for (const obj of file) {
      preview.src = URL.createObjectURL(obj);
    }
  }
</script>
</html>