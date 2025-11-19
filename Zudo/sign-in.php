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
    <!-- Navigation bar before user logged in -->
    <?php
    $page = "login";
    include 'header.php';
    ?>
    <!-- End of Navigation Bar -->
    <!-- Area of back icon -->
    <div class="container" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-12">
                <i class="material-icons" onclick="history.back()">arrow_back</i>
            </div>
        </div>
    </div>
    <!-- End of Area of back icon -->
    <div class="container">
        <div class="row">
            <!-- Login form area -->
            <div class="col-md-8" style="padding:10px;">
                <!-- Login form for customer and admin -->
                <form name="login" action="logincontrol.php" method="post" align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:480px;padding: 40px;border-radius: 10px;">
                    <label style="font-size: 4rem;">LOGIN</label><br>
                    <select id="user" name="user" style="width: 200px;height: 50px;border-radius: 10px;background-color: rgb(128,128,128,0.5);border-color: rgb(128,128,128,0.5);color: white;font-size: 2rem;">
                        <option value="">Select</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select><br><br>
                    <input type="text" id="username" name="username" placeholder="Username" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"> <br><br>
                    <input type="password" id="pwd" name="pwd" placeholder="Password" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                    <button type="submit" value="login" style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Login</button>
                    <br><br>
                    <label>New User? Sign Up</label>
                    <h5 align="center" style="color:red">
                        <?php if (isset($_GET["err1"])) {
                            //error if user not selected
                            print("Select User");
                        } elseif (isset($_GET["err2"])) {
                            //error if username not entered
                            print("Enter Username");
                        } elseif (isset($_GET["err3"])) {
                            //error if password not entered
                            print("Enter Password");
                        } elseif (isset($_GET["errormssg"])) {
                            //erroor if credentials not match
                            print("Invalid username or password");
                        } ?>
                    </h5>
                </form>
                <!-- end of login form -->
            </div>
            <!--End of Login form area -->
            <!-- sign up form area -->
            <div class="col-md-4" style="padding:10px;">
                <!-- sign up form for customers -->
                <form name="signup" id="signup" action="signupcontrol.php#signup" method="post" align="center" style="background-color: rgb(128,128,128,0.1);height:480px;border-radius: 10px;padding: 40px;width:100%;">
                    <label style="font-size: 4rem;">SIGN UP</label><br>
                    <input type="text" id="name" name="name" placeholder="Full Name" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                    <input type="text" id="username" name="username" placeholder="Username" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"> <br><br>
                    <input type="password" id="pwd" name="pwd" placeholder="Password" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                    <input type="password" id="confirmpwd" name="confirmpwd" placeholder="Confirm Password" style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                    <button type="submit" value="signin" style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Sign Up</button>

                    <h5 align="center" style="color:<?php if (isset($_GET["mssge"])) {
                                                        //if successfull
                                                        print("green");
                                                    } else {
                                                        //if there is an error
                                                        print("red");
                                                    } ?>">
                        <?php if (isset($_GET["err4"])) {
                            //error if name not entered
                            print("Enter Full Name");
                        } elseif (isset($_GET["err5"])) {
                            //error if username not entered
                            print("Enter Username");
                        } elseif (isset($_GET["err6"])) {
                            //error if password not entered
                            print("Enter Password");
                        } elseif (isset($_GET["err7"])) {
                            //error if confirm password not entered
                            print("Confirm Password");
                        } elseif (isset($_GET["errmssge"])) {
                            //error if username already exist
                            print("Username already exist. Please choose another one");
                        } elseif (isset($_GET["errmssg"])) {
                            //error if entered passwords doesn't match
                            print("Entered passwords does not match.");
                        } elseif (isset($_GET["mssge"])) {
                            //successful creation of account
                            print("Account Created. Please login to continue");
                        } else {
                            print("");
                        } ?></h5>
                </form>
                <!-- end of sign up form for customers -->
            </div>
            <!-- end of sign up form area -->
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