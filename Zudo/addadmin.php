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
    <?php
    $page = "addadmin";
    include 'adminheader.php';
    ?>
    <div class="container-fluid" style="margin-top : 9%;">
        <div class="col-md-3">

            <form name="add-admin" action="addadmincontrol.php" method="post" align="center" onsubmit="return validateaddadmin()"
                style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 3rem;">ADD ADMIN</label><br>
                <input type="text" id="adminname" name="adminname" placeholder="Admin Full Name"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"> <br><br>
                <input type="text" id="username" name="username" placeholder="Username"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"> <br><br>
                <input type="password" id="pwd" name="pwd" placeholder="Password"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"><br><br>
                <button type="submit" value="submit"
                    style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Add</button>
                <br><br>
                <h5 align="center" style="color:green">
                    <?php if (isset($_GET["msg"])) {
                        print("New Admin Added");
                    } ?>
                </h5>
            </form>

        </div>
        <div class="col-md-3">
            <form name="del-admin" action="deleteadmincontrol.php" method="post" align="center"
                style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <label style="font-size: 3rem;">DELETE ADMIN</label><br>
                <input type="text" id="usernmbr" name="usernmbr" placeholder="Admin Id"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;text-align:center;"> <br><br>
                <button type="submit" value="submit"
                    style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Delete</button>
                <br><br>
                <h5 align="center" style="color:<?php if (isset($_GET["mssg"])) {
                    print("green");
                } else {
                    print("red");
                } ?>">
                    <?php if (isset($_GET["mssg"])) {
                        print("Admin User Deleted");
                    } elseif (isset($_GET["errormssg"])) {
                        print("Invalid User Id");
                    } ?>
                </h5>

            </form>
            

        </div>
        <div class="col-md-3">
            <form name="edit-profile" action="editprofile.php" method="post" align="center"
                style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
                <?php
                $conn = mysqli_connect("Localhost", "root", "");
                mysqli_select_db($conn, 'Zudo');
                $q = "select * from adminlogin where userno = " . $_SESSION["suserno"];
                $rs = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_array($rs)) {
                    $uno = $row["userno"];
                    $uname = $row["name"];
                    $uusername = $row["username"];
                    $upassword = $row["password"];
                }
                mysqli_close($conn);
                ?>

                <label style="font-size: 3rem;">EDIT MY PROFILE</label><br>
                <input type="text" id="adminname" name="adminname" value="<?php print($uname); ?>"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;">
                <br><br>
                <input type="text" id="username" name="username" value="<?php print($uusername); ?>"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;">
                <br><br>
                <input type="password" id="pwd" name="pwd" value="<?php print($upassword); ?>"
                    style="width: 200px;height: 50px;border-radius: 10px;font-size: 2rem;color:black;text-align:center;"><br><br>
                <button type="submit" value="submit"
                    style="font-size:2rem;background-color: black;color: white;border-radius: 40px;width: 200px;height: 50px;font-weight: bold;">Save</button>
                    <br><br>
                <h5 align="center" style="color:green">
                    <?php if (isset($_GET["mssge"])) {
                        print("Profile Updated");
                    } ?>
                </h5>

            </form>

        </div>
        <div class="col-md-3">
            <form method="get" action="getadminuser.php" align="center" style="background-color: rgb(128,128,128,0.1);width: 100%;height:500px;padding: 40px;border-radius: 10px;">
            <label style="font-size: 3rem;">UPDATION</label><br>
                    <?php
                    $conn = mysqli_connect("Localhost", "root", "");
                    mysqli_select_db($conn, 'Zudo');
                    $q1 = "select `userno` from adminlogin";
                    $rs = mysqli_query($conn, $q1);
                    ?>

                        <select id="uno" name="uno" style="width: 64%;height:35px;border-radius:10px;background-color:rgb(128,128,128,0.5);border-color:rgb(128,128,128,0.5);color:white;">
                                
                                <option value="">Select Admin Id</option>
                                <?php while($row = mysqli_fetch_array($rs)){?>
                                        <option value="<?php print($row["userno"]);?>"><?php print($row["userno"]);?></option>
                                        <?php
                                } ?>
                                    </select>
                                    <input type="submit" name="sub" id="sub" value="Go"
                                        style="width: 50px;height: 40px;border-radius: 10px;background-color: black;color: white;font-size: 1.6rem;">  
                                        <table>
                                        <tr>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Updated By</th>
                                             </tr>
                                            <?php
                                        if (isset($_GET["id"])){
                                            $id=$_GET["id"];
                                            $q2="SELECT  product.userno,adminlogin.name FROM product INNER JOIN adminlogin on product.userno = adminlogin.userno;";
                                            $rs2 = mysqli_query($conn, $q2);
                                            $row2 = mysqli_fetch_array($rs2);
                                            while($row2["userno"]==$id){
                                            ?>
                                                <tr>
                                                <td><?php print($row2["userno"]); ?></td>
                                                
                                                <td><?php print($row2["name"]);?></td>
                                             </tr>

                                            <?php
                                            
                                            }
                                        }
                                        mysqli_close($conn);
                                             ?>
                                            
                                             
                                        </table>  

            </form>


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
