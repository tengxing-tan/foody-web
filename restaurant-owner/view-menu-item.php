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
  <link rel="stylesheet" href="styles/menu_list.css">
  <link rel="stylesheet" href="styles/manage_menu_item.css">
  <!-- javascript -->
  <script src="scripts/add" charset="utf-8"></script>
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
        <li><a class="nav-link" href="menu-list.html">Menu List</a></li>
        <li><a class="nav-link" href="order-list.html">Order List</a></li>
        <li><a class="nav-link" href="sales-report.html">Sales Report</a></li>
      </ul>
    </nav>

    <!-- main content (right side) -->
    <div id="main-content">
      <form class="user-input-form" action="<?php echo $restaurant_ID; ?>" method="post" enctype="multipart/form-data">
        <?php
        include 'actions/read_menu_item.php';
        ?>
        <!-- Food title -->
        <label class="bold-label required-input" for="food-title">Food title</label>
        <input class="text-input" type="text" name="food-title" placeholder="Enter food title" value="<?php echo $row['food_title']; ?>" required>
        <!-- Food category -->
        <label class="bold-label" for="food-category">Food category</label>
        <select class="text-input required-input" name="food-category" required>
          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row_fc = mysqli_fetch_assoc($result_fc)) {
              $foodCategoryID = $row_fc['food_category_ID'];
          ?>
              <option value="<?php echo $foodCategoryID; ?>" <?php if ($foodCategoryID === $row['food_category_ID']) {echo "selected";} ?>>
                <?php echo $row_fc['category_name']; ?>
              </option>
          <?php
            } // close while mysqli fetch
          } // close while mysqli fetch
          ?>
        </select>
        <!-- Food description -->
        <label class="bold-label required-input" for="food-description">Food description</label>
        <textarea class="text-input" rows="5" cols="80"><?php echo $row['food_description']; ?></textarea>
        <!-- Price -->
        <label class="bold-label required-input" for="food-price">Price (RM)</label>
        <input class="text-input" type="number" name="food-price" value="<?php echo $row['food_price']; ?>" step=0.05 required>
        <!-- Food picture -->
        <label class="bold-label required-input" for="food-image">Food picture</label>
        <!-- upload food picture -->
        <!-- remember to add inside form: enctype="multipart/form-data" -->
        <input type="file" name="food-image" accept="image/*" value="<?php echo $row['food_image']; ?>" required>

        <div class="submit-button">
          <button class="btn secondary-btn" type="button">Delete</button>
          <button class="btn submit-button" type="submit" style="margin-left: 1rem;">Update</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>