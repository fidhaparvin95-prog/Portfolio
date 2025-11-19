<?php
session_start();
include 'db.php';
$user_id = $_SESSION["suserid"];
$q1 = "UPDATE `profile` SET `score`= score + 1 WHERE `user_id`='$user_id'";
$rs = mysqli_query($conn,$q1);
?>