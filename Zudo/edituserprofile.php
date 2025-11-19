<!-- php code to edit customer profile -->
<?php
session_start();
//storing user entered values into php variable
$name=$_POST["name"]; //customer name
$un=$_POST["username"]; //username
$pwd=$_POST["pwd"]; //password
$encryptpwd=md5($pwd); //encrypted password
//form validation
if($name==""){
    //error if name not entered
    header("Location:userprofile.php?err1=namecannotbenull");
}elseif($un==""){
    //error if username not entered
    header("Location:userprofile.php?err2=usernamecannotbenull");
}
elseif($pwd==""){
    //error if password not entered
    header("Location:userprofile.php?err3=passwordcannotbenull");
}
else{
    //establishing database connection
    include 'db.php';
//query to update user details ito database
$q="UPDATE `userlogin` SET `name`='$name',`username`='$un',`password`='$encryptpwd' WHERE userno=".$_SESSION["suserno"];
mysqli_query($conn,$q);
mysqli_close($conn);
//successful updation of user profile
header("Location:userprofile.php?mssge=SuccesfullyUpdated");
}
?>
<!--end of php code to edit customer profile -->