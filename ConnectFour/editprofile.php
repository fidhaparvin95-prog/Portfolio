<?php
session_start();
include 'db.php';
// storing data received from post method into variables
$userid = $_SESSION["suserid"];
$firstname = $_POST["fistname"];
$lastname = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$confirm_password = $_POST["cpwd"];
// Database Connection
include 'db.php';
// Updating the database with new details
$q = "UPDATE `profile` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`password`='$password',`confirm_password`='$confirm_password' WHERE `user_id` = '$userid'";
if(mysqli_query($conn,$q)){
    //unsetting the usernmae from session
    unset($_SESSION["susername"]);
    $newq = "Select `email` from `profile` WHERE `user_id` = '$userid'";
    $rs = mysqli_query($conn,$newq);
    while($row = mysqli_fetch_array($rs)){
        //updating the usernmae to session
        $_SESSION["susername"] = $row["email"];
    }    
}
//Redirection to profile page
header("Location:profile.php?mssg=updated");
?>