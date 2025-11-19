<?php
session_start();
$user_id = $_SESSION["suserid"];
$status = "offline";
include 'db.php';
$q = "UPDATE `login` SET `Status`='$status' WHERE `user_id`='$user_id'";
$rs = mysqli_query($conn, $q);
unset($_SESSION["suserid"]);
unset($_SESSION["susername"]);
unset($_SESSION["suserpic"]);
header("Location:index.php");
?>