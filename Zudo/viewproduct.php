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
<style>
    #viewproduct {
        text-align: center;
        width: 200px;
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>

<body>
    <!-- Navigation Bar for admin section -->
    <?php
    $page = "viewproduct";
    include 'adminheader.php';
    ?>
    <!-- End of Navigation Bar Section -->
    <!-- establishing database connection to fetch data from database -->
    <?php
    include 'db.php';
    //query to fetch data from database
    $q = "select * from product";
    $rs = mysqli_query($conn, $q); ?>
    <div class="container" style="margin-top: 110px;">
        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <center>
                    <table border="1">
                        <tr>
                            <th id="viewproduct">Product Image</th>
                            <th id="viewproduct">Product Id</th>
                            <th id="viewproduct">Product Name</th>
                            <th id="viewproduct">Product Price</th>
                            <th id="viewproduct">Available Sizes</th>
                            <th id="viewproduct">Status</th>
                        </tr>
                        <?php
                        //displaying fetched product data from database in table
                        while ($row = mysqli_fetch_array($rs)) { ?>
                            <tr>
                                <td><img src="images/<?php print($row['category']) ?>/<?php print($row['product image']) ?>" class="card-img-top" alt="..." style="width: 100px;height: 100px;"></td>
                                <td><?php print($row['product id']) ?></td>
                                <td><?php print($row['product name']) ?></td>
                                <td><?php print($row['price']) ?></td>
                                <td><?php print($row['available size']) ?></td>
                                <td><i class="fa fa-circle" style="color: <?php if ($row['status'] == "in-stock") {
                                                                                print("green"); //if product available in stock
                                                                            } else {
                                                                                print("red"); //if product out of stock
                                                                            } ?>;">&nbsp;<?php print($row['status']) ?></td>
                            </tr>
                        <?php
                        }
                        //end of displaying data
                        ?>
                    </table>
                </center>
                <br>
            </div>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
    <!-- start of footer -->
    <footer>
        <div class="footer">
            <p>Copyright © 2023 Zudo Inc</p>
        </div>
    </footer>
    <!-- end of footer -->
    <script src="script.js"></script>
</body>

</html>