<?php
session_start();
// storing data received from post method into variables
$id = $_POST["gamebuttonid"];
$user = $_SESSION["suserid"];
$picture = $_SESSION["suserpic"];
include 'db.php'; 
//adding the user details of who clicked the tile
$q = "INSERT INTO `game`(`tile_id`, `user_id`,`user_picture`) VALUES ('$id','$user','$picture')";
mysqli_query($conn, $q);
//Redirect to home page
header("Location:home.php");
?>