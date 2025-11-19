<?php 
session_start();

$pid=$_GET["pno"];


header("Location:updateproduct.php?id=$pid");

?>  

