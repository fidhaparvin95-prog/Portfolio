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
    $page = "updateproduct";
    include 'adminheader.php';
    ?>
    <!-- End of Navigation Bar Section -->
    <!-- Start of Body Part -->
    <div class="container-fluid" style="margin-top:120px;">
        <div class="row">
            <!--Start of Add Product Code -->
            <div class="col-md-3" style="padding: 10px;">
                <center>
                    <!-- form to add new product -->
                    <form name="addproduct" id="addproduct" method="post" action="addproductcontrol.php" enctype="multipart/form-data" style="background-color: rgb(128,128,128,0.1);height:450px;width:100%;border-radius: 10px;">
                        <table>
                            <tr style="height: 50px;">
                                <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                                    ADD NEW PRODUCT
                                </th>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Product Name</td>
                                <td><input type="text" name="pname" id="pname" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Category</td>
                                <td>
                                    <select id="category" name="category" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="">select</option>
                                        <option value="mens">mens</option>
                                        <option value="womens">womens</option>
                                        <option value="boys">boys</option>
                                        <option value="girls">girls</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Price</td>
                                <td><input type="number" step="0.01" name="pri" id="pri" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Available sizes</td>
                                <td><input type="text" name="psize" id="psize" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Product Image</td>
                                <td>
                                    <input type="file" name="img" id="img" accept="image/*" style="background:none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 100%;height: 40px;">Status</td>
                                <td>
                                    <select id="pstatus" name="pstatus" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="">select</option>
                                        <option value="in-stock">in-stock</option>
                                        <option value="out of stock">out of stock</option>
                                    </select>
                                </td>
                            </tr>
                            <tr style="height: 60px;">
                                <td align="center" colspan="2"><input type="submit" name="sub" id="sub" value="Upload" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;margin:auto;display:block;">
                                </td>
                            </tr>
                        </table>
                        <!-- error/succesfull display of appropriate messages -->
                        <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                                                            // if successful
                                                            print("green");
                                                        } else {
                                                            // if there is an error
                                                            print("red");
                                                        } ?>;">
                            <?php if (isset($_GET["err1"])) {
                                print("Enter Product Name"); //error if product name not entered
                            } elseif (isset($_GET["err2"])) {
                                print("Select Category"); //error if category not selected
                            } elseif (isset($_GET["err3"])) {
                                print("Enter Price"); //error if product price not entered
                            } elseif (isset($_GET["err4"])) {
                                print("Enter Available Size"); //error if available size not entered
                            } elseif (isset($_GET["err5"])) {
                                print("Upload Image"); //error if image not added
                            } elseif (isset($_GET["err6"])) {
                                print("Select Status"); //error if status not selected
                            } elseif (isset($_GET["mssg"])) {
                                print("Product Added"); //successful message if product added
                            }  ?>
                        </h5>
                    </form>
                    <!-- end of form to add new product -->
                </center>
            </div>
            <!-- end of add product code -->
            <!-- start of delete product -->
            <div class="col-md-3" style="padding: 10px;">
                <center>
                    <!-- form to delete product using product id -->
                    <form name="deleteproduct" id="deleteproduct" method="post" action="deleteproductcontrol.php" style="background-color: rgb(128,128,128,0.1);height:450px;width:100%;border-radius: 10px;">

                        <table width=100%>
                            <tr style="height: 50px;">
                                <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                                    DELETE PRODUCT
                                </th>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Enter Product ID</td>
                            </tr>
                            <?php
                            include 'db.php';
                            //query to select product id from product table
                            $q = "select `product id` from `product`";
                            $rs = mysqli_query($conn, $q);
                            ?>
                            <tr>
                                <td>
                                <select id="pno" name="pno" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="">Select Product Id</option>
                                        <!-- printing all product id's in a dropdown list -->
                                        <?php while ($row = mysqli_fetch_array($rs)) { ?>
                                            <option value="<?php print($row["product id"]); ?>"><?php print($row["product id"]); ?></option>
                                        <?php
                                        } 
                                        mysqli_close($conn);
                                        ?>
                                        <!--end of printing all printing id's in a dropdown list -->
                                    </select>
                                </td>
                            </tr>
                            <tr style="height: 60px;">
                                <td colspan="2" align="center" style="height:30px;">
                                    <input type="submit" name="sub" id="sub" value="Delete" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                                </td>
                            </tr>
                        </table>
                        <h5 align="center" style="color:<?php if (isset($_GET["msg"])) {
                                                            // if successful
                                                            print("green");
                                                        } else {
                                                            // if there is an error
                                                            print("red");
                                                        } ?>">
                            <?php if (isset($_GET["err7"])) {
                                print("Enter Id for Deletion"); //error id form submitted without adding product id
                            } elseif (isset($_GET["errormssg"])) {
                                print("Product Id does not exist"); //error if invalid product id submitted
                            } elseif (isset($_GET["msg"])) {
                                print("Product Deleted"); //successful deletion of product
                            } ?>
                        </h5>
                    </form>
                    <!-- end of form to delete product -->
                </center>
            </div>
            <!-- end of delete product -->
            <!-- search product using product id and update existing product details -->
            <div class="col-md-3" style="padding: 10px;">
                <center>
                    <!-- form to search product using product id -->
                    <form name="searchproduct" id="searchproduct" method="get" action="" style="height:100px;width:100%;background-color: rgb(128,128,128,0.1);border-radius:10px 10px 0 0;">
                        <table width=100%>
                            <tr style="height: 50px;">
                                <th colspan="2" style="text-align: center;font-size: 3rem;padding:2%;">
                                    EDIT PRODUCT
                                </th>
                            </tr>
                            <?php
                            include 'db.php';
                            //query to select product table data
                            $q = "select * from `product`";
                            $rs = mysqli_query($conn, $q);
                            ?>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;"> Select Product ID</td>
                                <td><select id="pno" name="pno" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="">select</option>
                                        <!-- printing all product id's in a dropdown list -->
                                        <?php while ($row = mysqli_fetch_array($rs)) { ?>
                                            <option value="<?php print($row["product id"]); ?>"><?php print($row["product id"]); ?></option>
                                        <?php
                                        } ?>
                                        <!--end of printing all product id's in a dropdown list -->
                                    </select>
                                    <input type="submit" name="sub" id="sub" value="Go" style="width: 50px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <!--end of form to search product using product id -->
                    <?php
                    if (isset($_GET['sub'])) { //getting selected product id from search product form using get method
                        ?>
                        <h5 align="center" style="background-color: rgb(128,128,128,0.1);height:10px;padding:0;margin:0;color:red;"><?php if($_GET["pno"]==""){print("Select Product no");} ?></h5>      
                        <?php
                        $pid = $_GET["pno"]; //storing the selected product id into php variable pid
                    }
                    ?>
                    <!-- form to edit product details -->
                    <form name="editproduct" method="post" action="editproduct.php" style="background-color: rgb(128,128,128,0.1);height:345px;border-radius:0 0 10px 10px;">
                        <table>
                            <?php
                            if (isset($_GET["pno"])) {
                                $id = $_GET["pno"];
                                //query to display selected product
                                $q = "select * from `product` where `product id`= '$id'";
                                $rs = mysqli_query($conn, $q);
                                //fetching product details from the database and stored into php variables
                                while ($row = mysqli_fetch_array($rs)) {
                                    $pid =  $row["product id"];
                                    $pname = $row["product name"];
                                    $category = $row["category"];
                                    $price = $row["price"];
                                    $size = $row["available size"];
                                    $pimage = $row["product image"];
                                    $status = $row["status"];
                                }
                                //end of fetching data
                            }
                            mysqli_close($conn);
                            ?>
                            <!-- displaying product details in table -->
                            <tr>
                                <td><input type="number" name="pno" id="pno" value="<?php print($pid); ?>" style="height:35px;border-radius:10px;display:none;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Product Name</td>
                                <td><input type="text" name="pname" id="pname" value="<?php if (isset($_GET["pno"])) {
                                                                                            print($pname);
                                                                                        } ?>" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Category</td>
                                <td>
                                    <select id="category" name="category" style="width: 100%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="<?php if (isset($_GET["pno"])) {
                                                            print($category);
                                                        } ?>"><?php if (isset($_GET["pno"])) {
                                                                    print($category);
                                                                } ?></option>
                                        <option value="mens">mens</option>
                                        <option value="womens">womens</option>
                                        <option value="boys">boys</option>
                                        <option value="girls">girls</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Price</td>
                                <td><input type="number" step="0.01" name="pri" id="pri" value="<?php print($price); ?>" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Available sizes</td>
                                <td><input type="text" name="psize" id="psize" value="<?php if (isset($_GET["pno"])) {
                                                                                            print($size);
                                                                                        } ?>" style="height:35px;border-radius:10px;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 2rem;width: 50%;height: 40px;">Status</td>
                                <td>
                                    <select id="pstatus" name="pstatus" style="width: 100%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="<?php if (isset($_GET["pno"])) {
                                                            print($status);
                                                        } ?>"><?php if (isset($_GET["pno"])) {
                                                                    print($status);
                                                                } ?></option>
                                        <option value="in-stock">in-stock</option>
                                        <option value="out of stock">out of stock</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" name="sub" id="sub" value="Update" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">
                                </td>
                            </tr>
                            <!-- end of displaying product details in table -->
                        </table>
                        <h5 align="center" style="color:<?php if (isset($_GET["mssge"])) {
                                                            // if successful
                                                            print("green");
                                                        } else {
                                                            // if there is an error
                                                            print("red");
                                                        } ?>">
                            <?php if (isset($_GET["err8"])) {
                                print("Enter Product Name"); //error if product name not entered
                            } elseif (isset($_GET["err9"])) {
                                print("Select Category"); // error if category not selected
                            } elseif (isset($_GET["err10"])) {
                                print("Enter Price"); // error if price not selected
                            } elseif (isset($_GET["err11"])) {
                                print("Enter available Size"); //error if size not entered
                            } elseif (isset($_GET["err12"])) {
                                print("Select Status"); //error if status not selected
                            } elseif (isset($_GET["mssge"])) {
                                print("Product Updated"); //successful updation of product
                            }
                            ?>
                        </h5>
                    </form>
                    <!--end of form to edit product details -->
                </center>
            </div>
            <!-- end of search product using product id and update existing product details -->
            <!-- display of user feedback -->
            <div class="col-md-3" style="padding: 10px;">
                <form align="center" style="background-color: rgb(128,128,128,0.1);height:450px;width:100%;border-radius: 10px;">
                    <label style="font-size: 3rem;padding:2%;">USER FEEDBACK<br>
                        <div style="overflow-y:scroll;height:370px">
                            <table style="margin-left:10%;" border="1">
                                <tr height="30px;">
                                    <th style="font-size:1.6rem;text-align:center;width:100px;">Product Id</th>
                                    <th style="font-size:1.6rem;text-align:center;">Feedback</th>
                                    <th style="font-size:1.6rem;text-align:center;width:140px;">Userno(admin)</th>
                                </tr>
                                <?php
                                include 'db.php';
                                // query to display data from two tables(product table and feedback table) using inner join functionality
                                $q = "SELECT  feedback.feedback,product.`product id`,userno FROM feedback INNER JOIN product on feedback.`product id` = product.`product id`;";
                                $rs = mysqli_query($conn, $q);
                                //displaying fetched data from database
                                while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                    <tr>
                                        <td style="font-size: 1.2rem;"><?php print($row["product id"]); ?></td>
                                        <td style="font-size: 1.2rem;height:50px;"><?php print($row["feedback"]); ?></td>
                                        <td style="font-size: 1.2rem;"><?php print($row["userno"]); ?></td>
                                    </tr>
                                <?php
                                }
                                //end of display of data
                                mysqli_close($conn);
                                ?>
                            </table>
                        </div>
                </form>
            </div>
            <!-- end of display of user feedback -->
        </div>
    </div>
    <!-- start of footer -->
    <footer>
        <div class="fixedfooter">
            <p>Copyright © 2023 Zudo Inc</p>
        </div>
    </footer>
    <!-- end of footer -->
    <script src="script.js"></script>
</body>

</html>