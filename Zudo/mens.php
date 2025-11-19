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
    <style>
        textarea::placeholder{
            color:#AAAAAA;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar for User section(Customer) -->
    <?php
    if ($_SESSION["suserno"] == "") {
        $page = "mens";
        // Navigation bar before user logged in
        include 'header.php';
    } else {
        $page = "usermens";
        // Navigation bar after user logged in
        include 'userheader.php';
    }
    ?>
    <!-- End of Navigation Bar -->
    <!-- Area above Product Display -->
    <div class="container" style="margin-top: <?php if ($page == "mens") {
                                                    print("50px");
                                                } else {
                                                    print("90px");
                                                } ?>;">
        <div class="row">
            <div class="col-md-12">
                <i class="material-icons" onclick="history.back()">arrow_back</i>
                <h4 class="text-center" style="font-weight:bold;display:<?php if ($page == "mens") {
                                                                            print("block");
                                                                        } else {
                                                                            print("none");
                                                                        } ?>"><a href="sign-in.php">Login</a> to view all products</h4>
            </div>
        </div>
    </div>
    <!-- End of Area above Product Display -->
    <?php
    include 'db.php';
    if ($page == "mens") {
        // Query to execute if user not logged in
        $q = "SELECT * FROM product WHERE category = 'mens' LIMIT 3;";
    } else {
        // Query to execute if user logged in
        $q = "SELECT * FROM product WHERE category = 'mens';";
    }
    $rs = mysqli_query($conn, $q); ?>
    <!-- Mens Product Display -->
    <!-- Acknowledgment - Partial usage of bootstrap cards -->
    <div class="container">
        <?php
        while ($row = mysqli_fetch_array($rs)) { ?>
            <div class="col">

                <div class="col-md-4" style="height:650px;">
                    <div class="card" style="width: auto;height: auto;">
                        <img src="images/<?php print($row['category']) ?>/<?php print($row['product image']) ?>" id="<?php print($row['product id']); ?>" class="card-img-top" alt="..." style="width: 100%;height: 350px;">
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
                            <p class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin:auto;color:black;background:none;border:none;font-size: 1.2rem;text-decoration:underline;display:<?php if ($page == "mens") {
                                                                                                                                                                                                                            //dont display if user not logged in
                                                                                                                                                                                                                            print("none");
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            // display if user logged in
                                                                                                                                                                                                                            print("block");
                                                                                                                                                                                                                        } ?>">
                                size chart
                            </p>
                            <!-- Modal for size chart -->
                            <!-- Acknowledgement - bootstrap modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Size Chart</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php include 'size-chart.php'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of modal -->
                            <div class="rating text-center">
                                <i class="fa fa-circle" style="color: <?php if ($row['status'] == "in-stock") {
                                                                            // if stock available
                                                                            print("green");
                                                                        } else {
                                                                            // if stock unavailable
                                                                            print("red");
                                                                        } ?>;">&nbsp;
                                    <?php print($row['status']) ?>
                                </i>
                            </div>
                            <br>
                            <form name="feedback" method="get" action="feedback.php#<?php print($row['product id']); ?>" style="display: <?php if ($page == "mens") {
                                                                                                                                                // feedback form not displayed if user is not logged in
                                                                                                                                                print("none");
                                                                                                                                            } else {
                                                                                                                                                // feedback form displayed when user logged in
                                                                                                                                                print("block");
                                                                                                                                            } ?>;">
                                <input type="number" id="pid" name="pid" value="<?php print($row['product id']); ?>" style="display: none;">
                                <input type="text" id="category" name="category" value="<?php print($row['category']); ?>" style="display: none;">
                                <textarea placeholder="would you like to give a feedback?" name="feedbacktxt" id="feedbacktxt" style="width:100%;height:50px;border:1px solid #e6e6e6;border-radius:10px;color:black;background:none;"></textarea>
                                <button type="submit" value="submit" id="feedbackbtn" style="background-color:black;color:white;width:70px;height:30px;border-radius:10px;margin:auto;display:block;">submit</button>

                            </form>

                            <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                                                                // if successful
                                                                print("green");
                                                            } else {
                                                                // if there is an error
                                                                print("red");
                                                            } ?>">
                                <?php
                                // getting product id of selected product using get method from the url
                                if (isset($_GET["err"])) {
                                    // assigning product id into php variable x
                                    $x = $_GET["err"];
                                    if ($x == $row['product id']) {
                                        // If feedback is not entered
                                        print("Enter feedback before submitting");
                                    }
                                } elseif (isset($_GET["mssg"])) {
                                    $x = $_GET["mssg"];
                                    if ($x == $row['product id']) {
                                        // If feedback submitted
                                        print("Thank You for your valuable feedback");
                                    }
                                } else {
                                    print("");
                                } ?></h5>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Mens Product display -->
        <?php
        }
        ?>
    </div>
    <?php
    mysqli_close($conn);
    ?>
    <!--Start of Footer -->
    <footer>
        <div class="<?php if ($page == "mens") {
                        print("fixedfooter"); // Fixed footer if user not logged in
                    } else {
                        print("footer"); // Footer if user logged in
                    } ?>">
            <p>Copyright © 2023 Zudo Inc</p>
        </div>
    </footer>
    <!--End of Footer -->
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>