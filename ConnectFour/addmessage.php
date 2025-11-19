<?php
session_start();
$userid = $_SESSION["suserid"];
$message = $_POST["msg"];
include 'db.php';
// Inserting the messages sent by a user along with the sender's user id into message table
$q = "INSERT INTO `message`(`user_id`, `message`) VALUES ('$userid','$message')";
mysqli_query($conn,$q);
//Redirecting to home page
header("Location:home.php");
?>