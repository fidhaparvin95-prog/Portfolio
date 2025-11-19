<?php
session_start();
// unsetting all the user details from session adn updating the status of the user to offline
$user_id = $_SESSION["suserid"];
$status = "offline";
include 'db.php';
$q = "UPDATE `profile` SET `Status`='$status' WHERE `user_id`='$user_id'";
$rs = mysqli_query($conn, $q);
unset($_SESSION["suserid"]);
unset($_SESSION["susername"]);
unset($_SESSION["suserpic"]);
header("Location:index.php");
?>