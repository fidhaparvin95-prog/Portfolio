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
    $page = "addadmin";
    include 'adminheader.php';
    ?>
    <!-- End of Navigation Bar Section -->
    <!-- Start of Body Part -->
    <div class="container-fluid" style="margin-top : 100px;">
        <!--Start of Add New Admin Code -->
        <div class="col-md-3" style="padding: 20px;">
        <!-- Form to add new admin -->
            <form name="addadmin" action="addadmincontrol.php" method="post" align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 2.6rem;">ADD ADMIN</label><br>
                <input type="text" id="adminname" name="adminname" placeholder="Admin Full Name" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"> <br><br>
                <input type="text" id="username" name="username" placeholder="Username" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"> <br><br>
                <input type="password" id="pwd" name="pwd" placeholder="Password" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"><br><br>
                <button type="submit" value="submit" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;"">Add</button>
                <br><br>
                <!-- error/succesfull display of appropriate messages -->
                <h5 align="center" style="color:<?php if (isset($_GET["msg"])) {
                                                    // if successful
                                                    print("green");
                                                } else {
                                                    // if there is an error
                                                    print("red");
                                                } ?>">
                    <?php if (isset($_GET["err1"])) {
                        // Error message if name not entered
                        print("Enter Full Name");
                    } elseif (isset($_GET["err2"])) {
                        // Error message if username not entered
                        print("Enter Username");
                    } elseif (isset($_GET["err3"])) {
                        // Error message if password not entered
                        print("Enter Password");
                    } elseif (isset($_GET["err4"])) {
                        // Error message if user entered username already exist
                        print("Username already exist. Please choose another one");
                    } elseif (isset($_GET["msg"])) {
                        // Successful message when a new admin is added into database
                        print("New Admin Added");
                    } ?>
                </h5>
            </form>
            <!-- End of add admin form -->
        </div>
        <!-- End Of Add New Admin -->
        <!-- Start of Delete Admin Code -->
        <div class="col-md-3" style="padding: 20px;">
        <!-- Form to get id and delete admin user -->
            <form name="deladmin" action="deleteadmincontrol.php" method="post" align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 2.6rem;">DELETE ADMIN</label><br>
                <?php
                            include 'db.php';
                            //query to select adminlogin table data
                            $q = "select * from `adminlogin`";
                            $rs = mysqli_query($conn, $q);
                            ?>
                            <select id="usernmbr" name="usernmbr" style="width: 64%;height:50px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                        <option value="">Select Admin Id</option>
                                        <!-- printing all admin id's in a dropdown list -->
                                        <?php while ($row = mysqli_fetch_array($rs)) { ?>
                                            <option value="<?php print($row["userno"]); ?>"><?php print($row["userno"]); ?></option>
                                        <?php
                                        } 
                                        mysqli_close($conn);
                                        ?>
                                        <!--end of printing all admin id's in a dropdown list -->
                                    </select>
                 <br><br>
                <button type="submit" value="submit" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">Delete</button>
                <br><br>
                <!-- error/succesfull display of appropriate messages -->
                <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                                                    // if successful
                                                    print("green"); 
                                                } else {
                                                    // if there is an error
                                                    print("red");
                                                } ?>">
                    <?php if (isset($_GET["mssg"])) {
                        // Successful message when an admin user is deleted
                        print("Admin User Deleted");
                    } elseif (isset($_GET["errormssg1"])) {
                        // Error message if admin id is not entered for deletion
                        print("Enter Id for Deletion");
                    } elseif (isset($_GET["errormssg"])) {
                        // Error message if user doesn't exist
                        print("Invalid User Id");
                    } ?>
                </h5>
            </form>
            <!-- End of delete admin user form -->
        </div>
        <!-- End of Delete Admin Code -->
        <!-- Start of Edit Admin Profile Code -->
        <div class="col-md-3" style="padding: 20px;">
            <form name="editprofile" action="editprofile.php" method="post" align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <?php
                include 'db.php';
                // Query to select user details
                $q = "select * from adminlogin where userno = " . $_SESSION["suserno"];
                $rs = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_array($rs)) {
                    // stored fetched data from database into variables
                    $uno = $row["userno"];
                    $uname = $row["name"];
                    $uusername = $row["username"];
                }
                mysqli_close($conn);
                ?>
                <label style="font-size: 2.6rem;">EDIT MY PROFILE</label><br>
                <!-- Display of fetched data into table -->
                <table style="margin: auto;display:block;">
                    <tr style="height: 70px;">
                        <td><label style="font-size: 1.8rem;width:100px;">Full Name</label></td>
                        <td><input type="text" id="adminname" name="adminname" value="<?php print($uname); ?>" style="width: 150px;height: 50px;border-radius: 10px;font-size: 1.5rem;color:black;text-align:center;"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td><label style="font-size: 1.8rem;width:100px;">Username</label></td>
                        <td><input type="text" id="username" name="username" value="<?php print($uusername); ?>" style="width: 150px;height: 50px;border-radius: 10px;font-size: 1.5rem;color:black;text-align:center;"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td><label style="font-size: 1.8rem;width:100px;">Password</label></td>
                        <td><input type="password" id="pwd" name="pwd" placeholder="Enter New Password" style="width: 150px;height: 50px;border-radius: 10px;font-size: 1.4rem;color:black;text-align:center;"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td colspan="2"><button type="submit" value="submit" style="width: 100px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;"">Save</button></td>
                    </tr>
                </table>
                <!-- error/succesfull display of appropriate messages -->
                <h5 align="center" style="color:<?php if (isset($_GET["mssge"])) {
                                                    // if successful
                                                    print("green");
                                                } else {
                                                    // if there is an error
                                                    print("red");
                                                } ?>">
                    <?php if (isset($_GET["mssge"])) {
                        // If profile updated Successfully in database
                        print("Profile Updated");
                    } elseif (isset($_GET["err5"])) {
                        // Error message if Name not entered
                        print("Enter Name");
                    } elseif (isset($_GET["err6"])) {
                        // Error message if username is not entered
                        print("Enter Username");
                    } elseif (isset($_GET["err7"])) {
                        // Error name if password is not entered
                        print("Enter Password");
                    }
                    ?>
                </h5>
            </form>
        </div>
        <!-- End of Edit Admin Profile Code -->
        <!-- Details of Product Updation done by Admin (Joined Product table and adminlogin table) -->
        <div class="col-md-3" style="padding: 20px;">
            <form align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 2.6rem;">UPDATION DETAILS</label><br>
                <div style="overflow-y:scroll;height:350px">
                    <table style="margin-left:15%;" border="1">
                        <tr height="30px;">
                            <th style="font-size:1.6rem;text-align:center;">Product Id</th>
                            <th style="font-size:1.6rem;text-align:center;">Admin Id</th>
                            <th style="font-size:1.6rem;text-align:center;">Admin Name</th>
                        </tr>
                        <?php
                        include 'db.php';
                        // Query to display data from two tables(product table and adminlogin table) using inner join functionality
                        $q = "SELECT  product.userno,adminlogin.name,adminlogin.userno,`product id` FROM product INNER JOIN adminlogin on product.userno = adminlogin.userno;";
                        $rs = mysqli_query($conn, $q);
                        while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <!-- Displaying fetched data from database -->
                            <tr>
                                <td><?php print($row["product id"]); ?></td>
                                <td><?php print($row["userno"]); ?></td>
                                <td><?php print($row["name"]); ?></td>
                            </tr>
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </form>
        </div>
        <!-- End of Updation Details -->
    </div>
    <!-- End of Body Part -->
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