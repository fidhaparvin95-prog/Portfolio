<?php
session_start();
include 'db.php';
// unsetting the foreign check 
$x = "SET FOREIGN_KEY_CHECKS=0";
mysqli_query($conn, $x);
// Resetting the game by deleting the user moves
$q = "DELETE FROM `game`";
mysqli_query($conn,$q);
// setting the foreign key check
$y = "SET FOREIGN_KEY_CHECKS=1";
mysqli_query($conn, $y);
?>