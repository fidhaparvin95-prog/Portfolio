<!-- php code to update admin profile -->
<?php
session_start();
//storing user entered values into php variables
$name=$_POST["adminname"]; //admin name
$un=$_POST["username"]; //username
$pwd=$_POST["pwd"]; //password
//encrypting user entered password
$encryptpwd=md5($pwd);
//form validation
if($name==""){
    //error if name not entered
    header("Location:addadmin.php?err5=name");
}elseif($un==""){
    //error if username not entered
    header("Location:addadmin.php?err6=username");
}elseif($pwd==""){
    //error if password not entered
    header("Location:addadmin.php?err7=password");
}else{
    //establishing database connection if values are not null
    include 'db.php';
//query to update admin profile
$q="UPDATE `adminlogin` SET `name`='$name',`username`='$un',`password`='$encryptpwd' WHERE userno=".$_SESSION["suserno"];
mysqli_query($conn,$q);
mysqli_close($conn);
//successful message if profile updated
header("Location:addadmin.php?mssge=SuccesfullyUpdated");
}
?>
<!-- end of php code to update admin profile -->