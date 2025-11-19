<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>ZUDO</title>
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body> 

    <!-- Navigation Bar -->
   <!-- Acknowledgment - Partial usage of youtube to create this navigation bar navigation bar -->
   <?php
 
    $page = "home";
    include 'header.php';

    ?>
    
    <!-- Banner -->
 
  <section class="banner">
 <img class="sliderimage" src="images/banner1.png"> 
 <img class="sliderimage" src="images/banner2.png"> 
 <img class="sliderimage" src="images/banner3.png"> 
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
<!-- Acknowledgment - Partial usage of bootstrap cards -->
  <div class="container"  style="display: flex;justify-content: space-between;margin-top: 3%;">
    <div class="row">
        <div class="col-md-4 banner-product" style="height: auto;width: auto;">
           <div class="col-md-6">
            <img src="images/mens/t-shirts2.jpg" style="height: 200px;cursor: pointer;" onclick="window.location.href='mens.php'">
           </div>
           <div class="col-md-6 text-center" style="color: black;font-weight: bold;margin-top: 10%;">
            <p>Round neck green t-shirt</p>
            <p >£22.69</p>
            <div class="rating text-center" style="color: red;">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>  
           </div>  
        </div>
        <div class="col-md-4 banner-product" style="height: auto;width: auto;">
            <div class="col-md-6">
             <img src="images/girls/girls-dresses3.jpg" style="height: 200px;cursor: pointer;" onclick="window.location.href='womens.php'">
            </div>
            <div class="col-md-6 text-center" style="color: black;font-weight: bold;margin-top: 10%;">
               <p>Printed Party Wrap</p> 
             <p>£30.99</p>
             <div class="rating text-center" style="color: red;">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            </div>  
         </div>
         <div class="col-md-4 banner-product" style="height: auto;width: auto;">
            <div class="col-md-6">
             <img src="images/girls/girls-dresses1.jpg" style="height: 200px;cursor: pointer;" onclick="window.location.href='girls.php'">

            </div>
            <div class="col-md-6 text-center" style="color: black;font-weight: bold;margin-top: 10%;">
                <p>Buckle Front Shorts</p>
             <p>£7.99</p>
             <div class="rating text-center" style="color: red;">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            </div>  
         </div>
    </div>
  </div>

<!-- Footer -->

  <footer>
    <div class="fixedfooter">
<p>Copyright © 2023 Zudo Inc</p>
    </div>
  </footer>
    <script src="script.js"></script>
</body>
</html>
