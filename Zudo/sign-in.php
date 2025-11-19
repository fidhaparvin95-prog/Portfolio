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
<?php
    $page = "login";
    include 'header.php';
    ?>
    <div class="container" style="margin-top : 8%;">
    <div class="row">
        <div class="col-md-8">
            <form name="login" action="logincontrol.php" method="post" align="center" onsubmit="return loginvalidate()"
                style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 4rem;">LOGIN</label><br>
                <select id="user" name="user"
                    style="width: 200px;height: 50px;border-radius: 10px;background-color: rgb(128,128,128,0.5);border-color: rgb(128,128,128,0.5);color: white;font-size: 2rem;">
                    <option value="">Select</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br><br>
                <input type="text" id="username" name="username" placeholder="Username"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"> <br><br>
                <input type="password" id="pwd" name="pwd" placeholder="Password"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                <button type="submit" value="login" 
                    style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Login</button>
                    <br><br>
                    <label>New User? Sign Up</label>
                    <h5 align="center" style="color:red">
		  <?php if(isset($_GET["errormssg"])){ print("Invalid username or password");} ?></h5>
                </form>
            
        </div>
        <div class="col-md-4" style="background-color: rgb(128,128,128,0.1);height:500px;border-radius: 10px;">
        <form name="signup" action="signupcontrol.php" method="post" align="center" style="padding: 40px;" onsubmit="return signupvalidate()">
        <label style="font-size: 4rem;">SIGN UP</label><br>
        <input type="text" id="name" name="name" placeholder="Full Name"
        style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
        <input type="text" id="username" name="username" placeholder="Username"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"> <br><br>
                <input type="password" id="pwd" name="pwd" placeholder="Password"
                style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;"><br><br>
                <button type="submit" value="signin" 
                    style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Sign Up</button>
                    <br><br>
                    <h5 align="center" style="color:<?php if(isset($_GET["mssge"])){print("green");}else{print("red");} ?>">
		  <?php if(isset($_GET["mssge"])){ print("Account Created. Please login to continue");}elseif(isset($_GET["errmssge"])){ print("Username already exist. Please choose another one");}else{print("");} ?></h5>
        </form>
        </div>
    </div>
    </div>
    <footer>
        <div class="fixedfooter">
            <p>Copyright © 2023 Zudo Inc</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>