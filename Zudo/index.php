<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>ZUDO</title>
  <link rel="icon" type="image/png" href="images/logo.png">
  <style>
    .banner img {
      display: block;
      width: 100%;
      height: 500px;
      position: absolute;
    }

    .product-container-wrapper {
      overflow: hidden; /* Hide scrollbar */
      position: relative;
      width: 100%;
    }

    .product-container {
      display: flex;
      white-space: nowrap;
      animation: scroll 20s linear infinite; /* Adjust scroll duration */
    }

    @keyframes scroll {
      from {
        transform: translateX(0);
      }
      to {
        transform: translateX(-100%);
      }
    }

    .banner-product {
      flex: 0 0 auto;
      width: 23%;
      margin-right: 1%;
      position: relative;
    }

    .banner-product img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .text-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      background: rgba(0, 0, 0, 0.5);
      text-align: center;
      padding: 10px;
      box-sizing: border-box;
    }
  </style>
</head>

<body>
  <!-- Navigation Bar for User section(Customer) -->
  <?php
  if (!isset($_SESSION["suserno"]) || empty($_SESSION["suserno"])) {
    $page = "home";
    include 'header.php'; // Navigation bar before user logged in
  } else {
    $page = "userhome";
    include 'userheader.php'; // Navigation bar after user logged in
  }
  ?>
  <!-- End of Navigation Bar -->

  <!-- Banner -->
  <section class="banner">
    <img class="sliderimage" src="images/banner1.png" style="padding-top:<?php echo ($page == "home") ? "0px" : "110px"; ?>; height: 350px;">
    <img class="sliderimage" src="images/banner2.png" style="padding-top:<?php echo ($page == "home") ? "0px" : "110px"; ?>; height: 350px;">
    <img class="sliderimage" src="images/banner3.png" style="padding-top:<?php echo ($page == "home") ? "0px" : "110px"; ?>; height: 350px;">
  </section>

  <!-- Banner Text -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12" style="width: 100%;">
        <h1 id="sale">Christmas Sale - 50% off on selected items.</h1>
      </div>
    </div>
  </div>

  <!-- Featured Products -->
  <?php
  include 'db.php';
  // Query to display 10 products from the database
  $q = "SELECT * FROM product ORDER BY RAND() LIMIT 10;";
  $rs = mysqli_query($conn, $q);
  ?>

  <div class="container">
    <div class="product-container-wrapper">
      <div class="product-container">
        <?php while ($row = mysqli_fetch_array($rs)) { ?>
          <div class="banner-product">
            <img src="images/<?php echo $row['category']; ?>/<?php echo $row['product image']; ?>" alt="<?php echo $row['product name']; ?>" onclick="window.location.href='girls.php'">
            <div class="text-overlay">
              <div>
                <p><?php echo $row['product name']; ?></p>
                <p>£<?php echo $row['price']; ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="fixedfooter">
      <p>Copyright © 2023 Zudo Inc</p>
    </div>
  </footer>
  <!-- end of footer -->

  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
