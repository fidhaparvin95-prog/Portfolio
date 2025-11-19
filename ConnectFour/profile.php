<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css'  href='style.css?v=<?php echo time(); ?>'>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/a5f0d8af53.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>
<body>
    <!-- Navigation bar -->
    <?php 
    $page = "profile";
    include 'navigation_bar.php';
    ?>
    <!-- End of Navigation bar -->
    <div class="profile-area" style="border: 1px solid white;margin:0 auto;display:block;width:100%;height:100%;font-family:'Times New Roman', Times, serif;">
        <div class="row">
        <?php include 'db.php';
                    $q = "select * from login where user_id = ".$_SESSION["suserid"];
                    $rs = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_array($rs)) {
                        $firstname = $row["first_name"];
                        $lastname = $row["last_name"];
                        $email = $row["email"];
                        $password = $row["password"];
                        $cpassword = $row["confirm_password"];
                        $profilepicture = $row["profile_picture"];
                    }
                    mysqli_close($conn);
                ?>
                    
            <div class="col-md-4">
                <form name="updatepicture" id="updatepicture" method="post" action="upload_picture.php" enctype="multipart/form-data">
                <div class="container" id="pic_container" style="position: relative;display:inline-block;height:auto;">
                <img class="profile_picture" id="profile_picture"  src="<?php print($profilepicture);?>" style="display:block;"/>
                <input type="file" name="img" id="img" accept="image/jpeg,image/png,image/jpg" style="display: none;">      
                <label for="img" class="imglabel" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-30%);color:white;background-color:#DE3163;height:auto;border-radius:5px;padding:5px;opacity:0;transition:opacity 0.3s;">Change Picture</label>
                <button type="submit" id="btn_change_pic">Save</button>
                </form>
            </div>
            </div>
            <div class="col-md-8" >
                <form name="profil_frm" id="profile_frm" method="post" action="editprofile.php">
                    <table style="width: 100%;height:auto;">
                    <tr>
                        <td>
                            <label style="color: #605A5A;font-size: 2rem;font-weight:bold;margin-left:6%;">Edit Profile</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="frm-label">First Name</labe>
                        </td>
                        <td>
                            <input id="fistname" name="fistname" type="text" value="<?php print($firstname);?>" style="border-radius:10px;border-style:solid;height:35px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="frm-label">Last Name</labe>
                        </td>
                        <td>
                            <input id="last_name" name="last_name" type="text" value="<?php print($lastname);?>" style="border-radius:10px;border-style:solid;height:35px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="frm-label">Email</labe>
                        </td>
                        <td>
                            <input id="email" name="email" type="text" value="<?php print($email);?>" style="border-radius:10px;border-style:solid;height:35px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="frm-label">Password</labe>
                        </td>
                        <td>
                            <input id="pwd" name="pwd" type="password" value="<?php print($password);?>" style="border-radius:10px;border-style:solid;height:35px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label id="frm-label">Confirm Password</labe>
                        </td>
                        <td>
                            <input id="cpwd" name="cpwd" type="password" value="<?php print($cpassword);?>" style="border-radius:10px;border-style:solid;height:35px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <Button id="save-Changes">Save Changes</Button>
                        </td>
                    </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>