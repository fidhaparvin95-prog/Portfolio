<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>ZUDO</title>
  <link rel="icon" type="image/png" href="images/logo.png">
</head>

<body>
  <!-- Navigation Bar for admin section -->
  <?php
  $page = "adminhome";
  include 'adminheader.php';
  ?>
  <!-- End of Navigation Bar Section -->
  <!-- Start of Admin Banner -->
  <section class="adminbanner">
    <img class="sliderimage" src="images/banner1.png">
    <img class="sliderimage" src="images/banner2.png">
    <img class="sliderimage" src="images/banner3.png">
  </section>
  <!-- End of Admin Banner -->
  <!-- Start of Footer -->
  <footer>
    <div class="fixedfooter">
      <p>Copyright © 2023 Zudo Inc</p>
    </div>
  </footer>
  <!-- End of Footer -->
  <script src="script.js"></script>
</body>

</html>