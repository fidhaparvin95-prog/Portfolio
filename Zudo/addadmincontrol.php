<?php 
session_start();

$name=$_POST["adminname"];
$username=$_POST["username"];
$password=$_POST["pwd"];

$conn=mysqli_connect("vesta.uclan.ac.uk","FPRifas-ali","NLX7ytZS");
mysqli_select_db($conn,'FPRifas-ali');
$q="INSERT INTO `adminlogin`( `name`, `username`, `password`) VALUES ('$name','$username','$password')";
mysqli_query($conn,$q);

print($q);
header("Location:addadmin.php?msg=SuccesfullyInserted");
?>