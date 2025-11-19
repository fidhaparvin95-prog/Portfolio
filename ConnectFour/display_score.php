<?php 
session_start();
include 'db.php';
//  Retrieving the current score of the user from the database 
$q = "SELECT score FROM `profile` WHERE `user_id` = " . $_SESSION["suserid"];
$rs = mysqli_query($conn, $q);                    
while ($row = mysqli_fetch_array($rs))
{
$score = $row["score"];
}
//converting the data into json format
echo json_encode($score);
?>