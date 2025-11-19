<?php
session_start();
$name=$_POST["adminname"];
$un=$_POST["username"];
$pwd=$_POST["pwd"];

$conn=mysqli_connect("vesta.uclan.ac.uk","FPRifas-ali","NLX7ytZS");

mysqli_select_db($conn,'FPRifas-ali');
$q="UPDATE `adminlogin` SET `name`='$name',`username`='$un',`password`='$pwd' WHERE userno=".$_SESSION["suserno"];
mysqli_query($conn,$q);
mysqli_close($conn);
header("Location:addadmin.php?mssge=SuccesfullyUpdated");
?>