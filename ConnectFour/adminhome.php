<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css?v=<?php echo time(); ?>'>
    <title>Admin</title>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a5f0d8af53.js" crossorigin="anonymous"></script>
</head>

<body style="height:auto;">
    <?php
    $page = "home";
    include 'navigation_bar.php';
    ?>

    <!--Acknowledgement - Usage of Bootstrap Modal - triggered version 5.3.3 -->
    <!-- This section shows a tutorial of how to change icons on board in modal window -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">How to change icons?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Step 1 : Visit font awesome website https://www.w3schools.com/icons/fontawesome5_intro.asp<br>
                    Step 2 : Copy required font awesome class name and paste it in the table corresponding to the tile id needed<br>
                    Stpe 3 : Click Save button

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<!-- Body of the admin home -->
    <div class="container-fluid">
        <div class="row" style="background-image: url(images/home-background.jpg);background-size:cover;">
        <!-- add new staffs -->
            <div class="col-md-4" style="height:610px;margin:1%;background-color: rgba(255, 255, 255, 0.8);border-radius:10px;border:1px solid #B6B1B1;width:450px;">
                <h2 style="height: auto;text-align:center;color:#605A5A;padding:1%;">Add New Staff</h2>
                 <!--Form to add new staffs -->
                <form method="post" action="add_staff.php">
                    <table style="height: auto;width:93%;">
                        <tr>
                            <td><input type="text" name="fname" placeholder="First Name" style="height: 40px;margin:10px;width:100%;border-radius: 10px;border-color: #B6B1B1;border-style: solid;"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="lname" placeholder="Last Name" style="height: 40px;margin:10px;width:100%;border-radius: 10px;border-color: #B6B1B1;border-style: solid;"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" placeholder="Email" style="height: 40px;width:100%;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pwd" placeholder="Password" style="width: 100%;height:40px;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="cpwd" placeholder="Confirm Password" style="width: 100%;height:40px;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 20px;">
                                <button type="submit" style="height:40px;margin:0 auto;display:block;color:white;background-color:#DE3163;width:150px;border-radius:10px;border-color:#DE3163;">Add Staff</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- Displaying appropriate error messages/ success message -->
                                <h5 style="padding:4%;text-align:center;color:<?php if (isset($_GET["mssg2"])) {
                                                                                    print("green");
                                                                                } else {
                                                                                    print("red");
                                                                                } ?>">
                                    <?php if (isset($_GET["mssg2"])) {
                                        print("New Staff Added");
                                    } elseif (isset($_GET["err1"])) {
                                        print("Enter First Name");
                                    } elseif (isset($_GET["err2"])) {
                                        print("Enter Last Name");
                                    } elseif (isset($_GET["err3"])) {
                                        print("Enter Email");
                                    } elseif (isset($_GET["err4"])) {
                                        print("Enter Password");
                                    } elseif (isset($_GET["err5"])) {
                                        print("Enter Confirm Password");
                                    } elseif (isset($_GET["err6"])) {
                                        print("Email Already Exist");
                                    } elseif (isset($_GET["err7"])) {
                                        print("Entered Passwords does not match");
                                    }
                                    ?>
                                </h5>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
            <!-- Updating icons on the connect four board -->
            <div class="col-md-4" style="height:610px;margin:1%;background-color: rgba(255, 255, 255, 0.8);border-radius:10px;border:1px solid #B6B1B1;">

                <h2 style="height: auto;text-align:center;color:#605A5A;padding:1%;">Update Icons</h2>

                <!-- Button to trigger the modal boxes -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin: 0 auto;display:block;background-color: #DE3163;border-color:#DE3163;height:40px;">
                    How to Change Icons?
                </button>
                <!-- Form to change the icons on the connect four board -->
                <form id="staff" method="post" action="updateicons.php" style="margin-top: 1%;">
                    <div style="height:424px;overflow-x:hidden;margin-bottom:10px;">
                        <table border="1" style="margin-left:auto;margin-right:auto;">
                            <tr style="border: 1px solid black;">
                                <th style="text-align:center;">Tile Id</th>
                                <th style="text-align: center;">Class Name</th>
                            </tr>
                            <!-- Displaying the class names of the current tiles and their tile ids -->
                            <?php include 'db.php';
                            $q = "SELECT * FROM `gameboard`";
                            $rs = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_array($rs)) {
                            ?>
                                <tr>
                                    <td style="width: 100px;text-align:center;"><input type="text" name="tile_id[]" value="<?php print($row['tile_id']); ?>"></td>
                                    <td><input type="text" name="icon_class_name[]" value="<?php print($row['icon_class_name']); ?>"></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- Submitting the updated form on the database -->
                    <button type="submit" style="height:40px;margin:0 auto;display:block;color:white;background-color:#DE3163;width:150px;border-radius:10px;border-color:#DE3163;">Save Changes</button>
                    <h5 style="text-align: center;color:green;padding:1%;"><?php if (isset($_GET["mssg1"])) {
                                                                                print("Icons Updated");
                                                                            } ?></h5>
                </form>
            </div>
            <!-- add new admins -->
            <div class="col-md-4" style="height:610px;margin:1%;background-color: rgba(255, 255, 255, 0.8);border-radius:10px;border:1px solid #B6B1B1;width:450px;">
                <h2 style="height: auto;text-align:center;color:#605A5A;padding:1%;">Add New Admin</h2>
                <!-- form to add new admins -->
                <form method="post" action="add_admin.php">
                    <table style="height: auto;width:93%;">
                        <tr>
                            <td><input type="text" name="fname" placeholder="First Name" style="height: 40px;margin:10px;width:100%;border-radius: 10px;border-color: #B6B1B1;border-style: solid;"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="lname" placeholder="Last Name" style="height: 40px;margin:10px;width:100%;border-radius: 10px;border-color: #B6B1B1;border-style: solid;"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" placeholder="Email" style="height: 40px;width:100%;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pwd" placeholder="Password" style="width: 100%;height:40px;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="cpwd" placeholder="Confirm Password" style="width: 100%;height:40px;margin:10px;border-radius: 10px;border-color: #B6B1B1;border-style: solid;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 20px;">
                                <button type="submit" style="height:40px;margin:0 auto;display:block;color:white;background-color:#DE3163;width:150px;border-radius:10px;border-color:#DE3163;">Add Admin</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!-- Displaying appropriate error messages/ success message -->
                                <h5 style="padding:4%;text-align:center;color:<?php if (isset($_GET["mssg3"])) {
                                                                                    print("green");
                                                                                } else {
                                                                                    print("red");
                                                                                } ?>">
                                    <?php if (isset($_GET["mssg3"])) {
                                        print("New Admin Added");
                                    } elseif (isset($_GET["err8"])) {
                                        print("Enter First Name");
                                    } elseif (isset($_GET["err9"])) {
                                        print("Enter Last Name");
                                    } elseif (isset($_GET["err10"])) {
                                        print("Enter Email");
                                    } elseif (isset($_GET["err11"])) {
                                        print("Enter Password");
                                    } elseif (isset($_GET["err12"])) {
                                        print("Enter Confirm Password");
                                    } elseif (isset($_GET["err13"])) {
                                        print("Email Already Exist");
                                    } elseif (isset($_GET["err14"])) {
                                        print("Entered Passwords does not match");
                                    }
                                    ?>
                                </h5>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>
</body>

</html>