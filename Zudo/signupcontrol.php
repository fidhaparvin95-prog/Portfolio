<?php
session_start();
$name=$_POST["name"];
$un=$_POST["username"];
$pwd=$_POST["pwd"];

$conn=mysqli_connect("Localhost","root","");
mysqli_select_db($conn,'zudo');
$q="SELECT `username` from `userlogin` where `username`='$un'";
$rs=mysqli_query($conn,$q);
$row=mysqli_fetch_array($rs);

if($un==$row["username"]){
    header("Location:sign-in.php?errmssge=usernameexist");
    
}
else{
    $insertquery="INSERT INTO `userlogin`( `name`, `username`, `password`) VALUES ('$name','$un','$pwd')";
    mysqli_query($conn,$insertquery);
    header("Location:sign-in.php?mssge=SuccesfullyUpdated");
}

?>
