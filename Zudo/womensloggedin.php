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
    <!-- Navigation Bar -->
    <!-- Acknowledgment - Partial usage of youtube to create this navigation bar  -->
    <?php
    $page = "userwomens";
    include 'userheader.php';
    ?>
    <!-- Women's Products Display -->
    <!-- Acknowledgment - Partial usage of bootstrap cards -->
    <div class="container" style="margin-top: 90px;">
      <div class="row">
        <div class="col-md-12">
        <i class="material-icons" onclick="history.back()">arrow_back</i>
        
        </div>
      </div>
    </div>
    <?php
    $conn = mysqli_connect("vesta.uclan.ac.uk", "FPRifas-ali", "NLX7ytZS");
    mysqli_select_db($conn, 'FPRifas-ali');
    $q = "SELECT * FROM product WHERE category = 'womens';";
    $rs = mysqli_query($conn, $q); ?>
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($rs)) { ?>

                <div class="col-md-4">

                    <div class="card" style="width: auto;height: auto;">
                        <img src="images/<?php print($row['category']) ?>/<?php print($row['product image']) ?>"
                            class="card-img-top" alt="..." style="width: 100%;height: 350px;">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-weight: bold;font-size: 1.5rem;color: black;">
                                <?php print($row['product name']) ?>
                            </h5>
                            <p class="card-text text-center" style="color: black;font-weight: bold;">£
                                <?php print($row['price']) ?>
                            </p>
                            <p class="text-center" style="font-size: 1.2rem;">Available Sizes :
                                <?php print($row['available size']) ?>
                            </p>
                            <p class="text-center" style="font-size: 1.2rem;">Product Id :
                                <?php print($row['product id']) ?>
                            </p>

                            <div class="rating text-center" style="color: red;">
                                <!-- <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <br> -->
                                <i class="fa fa-circle" style="color: <?php if ($row['status'] == "in-stock") {
                                    print("green");
                                } else {
                                    print("red");
                                } ?>;">&nbsp;
                                    <?php print($row['status']) ?>
                                </i>
                            </div>

                        </div>
                    </div>

                </div>


                <?php
            }
            ?>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
   
<!-- Footer -->
    <footer>
        <div class="footer">
    <p>Copyright © 2023 Zudo Inc</p>
        </div>
      </footer>

    <script src="script.js"></script>
</body>
</html>