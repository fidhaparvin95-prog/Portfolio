<?php
session_start();
$id = $_POST["gamebuttonid"];
$user = $_SESSION["suserid"];
$picture = $_SESSION["suserpic"];
include 'db.php'; 
$q = "INSERT INTO `game`(`tile_id`, `user_id`,`user_picture`) VALUES ('$id','$user','$picture')";
mysqli_query($conn, $q);
header("Location:home.php");
?>