<?php 
session_start();

$name=$_POST["adminname"];
$username=$_POST["username"];
$password=$_POST["pwd"];

$conn=mysqli_connect("Localhost","root","");
mysqli_select_db($conn,'zudo');
$q="INSERT INTO `adminlogin`( `name`, `username`, `password`) VALUES ('$name','$username','$password')";
mysqli_query($conn,$q);

print($q);
header("Location:addadmin.php?msg=SuccesfullyInserted");
?>
