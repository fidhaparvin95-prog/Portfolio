<?php 
session_start();

$uid=$_GET["uno"];


header("Location:addadmin.php?id=$uid");

?>  
