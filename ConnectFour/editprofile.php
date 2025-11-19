<?php
session_start();
include 'db.php';
$userid = $_SESSION["suserid"];
$firstname = $_POST["fistname"];
$lastname = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$confirm_password = $_POST["cpwd"];
include 'db.php';
$q = "UPDATE `login` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`password`='$password',`confirm_password`='$confirm_password' WHERE `user_id` = '$userid'";
if(mysqli_query($conn,$q)){
    unset($_SESSION["susername"]);
    $newq = "Select `email` from `login` WHERE `user_id` = '$userid'";
    $rs = mysqli_query($conn,$newq);
    while($row = mysqli_fetch_array($rs)){
        $_SESSION["susername"] = $row["email"];
    }    
}
header("Location:profile.php");
?>