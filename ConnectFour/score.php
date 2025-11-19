<?php
session_start();
include 'db.php';
$user_id = $_SESSION["suserid"];
// updating the score in the database by icrementing the score by 1
$q1 = "UPDATE `profile` SET `score`= score + 1 WHERE `user_id`='$user_id'";
$rs = mysqli_query($conn,$q1);
?>