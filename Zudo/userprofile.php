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
    <script src="script.js"></script>
</head>

<body>
    <!-- Navigation Bar for logged in User section(Customer) -->
    <?php
    $page = "userprofile";
    include 'userheader.php';
    ?>
    <!-- End of Navigation Bar -->
    <!-- area of back icon -->
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <i class="material-icons" onclick="history.back()">arrow_back</i>
            </div>
        </div>
    </div>
    <!-- end of area of back icon -->
    <!-- start of profile updation section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding: 20px;height:600px;">
            <!-- form to update profile -->
                <form name="edituserprofile" action="edituserprofile.php" method="post" align="center" onsubmit="return validateedituserprofile()" style="background-color: rgb(128,128,128,0.1);width: 100%;padding: 40px;border-radius: 10px;">
                    <?php
                    include 'db.php';
                    //query to select logged in user details
                    $q = "select * from userlogin where userno = " . $_SESSION["suserno"];
                    $rs = mysqli_query($conn, $q);
                    //fetching user data from database and stored into php variables
                    while ($row = mysqli_fetch_array($rs)) {
                        $uno = $row["userno"];
                        $uname = $row["name"];
                        $uusername = $row["username"];
                        $upassword = $row["password"];
                    }
                    //end of fetching data from database
                    mysqli_close($conn);
                    ?>
                    <!-- displaying fetched data in form -->
                    <label style="font-size: 3.5rem;">EDIT MY PROFILE</label><br><br>
                    <label style="font-size: 2.7rem;">Full Name</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="name" name="name" value="<?php print($uname); ?>" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;">
                    <br><br>
                    <label style="font-size: 2.7rem;">Username</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="username" name="username" value="<?php print($uusername); ?>" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;">
                    <br><br>
                    <label style="font-size: 2.7rem;">Password</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="pwd" name="pwd" placeholder="Enter New Password" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;"><br><br>
                    <button type="submit" value="submit" style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Save</button>
                    <br><br>
                    <h5 align="center" style="color:<?php if (isset($_GET["mssge"])) {
                                                        // if successful
                                                        print("green");
                                                    } else {
                                                        // if there is an error
                                                        print("red");
                                                    } ?>">
                        <?php if (isset($_GET["mssge"])) {
                            print("Profile Updated"); //successful profile updation
                        } elseif (isset($_GET["err1"])) {
                            print("Name Cannot be empty"); //error if name not entered
                        } elseif (isset($_GET["err2"])) {
                            print("Username Cannot be empty"); //error if username not entered
                        } elseif (isset($_GET["err3"])) {
                            print("Password Cannot be empty"); //error if password not entered
                        } ?>
                    </h5>

                </form>
            <!-- end of form to update profile -->
            </div>
        </div>
    </div>
    <!-- end of profile updation section -->

</body>
<!--start of Footer -->
<footer>
    <div class="fixedfooter">
        <p>Copyright © 2023 Zudo Inc</p>
    </div>
</footer>
<!--end of Footer -->

</html>