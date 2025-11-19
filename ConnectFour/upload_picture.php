<?php
session_start();
include 'db.php';
$userid = $_SESSION["suserid"];
if (isset($_FILES['img']) && strlen($_FILES['img']['name']) > 0) {

    $file_name = $_FILES['img']['name'];
 
    $file_path = "images/". $file_name;
 
    $file_size = $_FILES['img']['size'];
 
    $file_tmp = $_FILES['img']['tmp_name'];
 
    move_uploaded_file($file_tmp, $file_path);

 }
 $q = "UPDATE `login` SET `profile_picture` = 'images/$file_name' WHERE `user_id` = '$userid'";

 if(mysqli_query($conn,$q)){
    unset($_SESSION["suserpic"]);
    $newpic = "Select `profile_picture` from `login` WHERE `user_id` = '$userid'";
    $rs = mysqli_query($conn,$newpic);
    while($row = mysqli_fetch_array($rs)){
        $_SESSION["suserpic"] = $row["profile_picture"];
    }
   
 }
 header("Location:profile.php");

?>