<?php
session_start();
$userid = $_SESSION["suserid"];
$message = $_POST["msg"];
include 'db.php';
$q = "INSERT INTO `message`(`user_id`, `message`) VALUES ('$userid','$message')";
mysqli_query($conn,$q);
header("Location:home.php");
?>