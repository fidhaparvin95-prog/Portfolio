<?php
session_start();
include 'db.php';
// storing data received from post method into variables
$userid = $_SESSION["suserid"];
$user_name = $_POST["nam"];
$user_email = $_POST["em"];
$feedback_message = $_POST["mssg"];
//Adding the user entered feedback into database
$q = "INSERT INTO `feedback`(`user_id`, `name`,`email`,`feedback_msg`) VALUES ('$userid','$user_name','$user_email','$feedback_message')";
mysqli_query($conn,$q);
//Redirect to home page
header("Location:home.php?mssg_feed=feedbacksent");
?>