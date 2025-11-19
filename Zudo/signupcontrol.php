<!-- php code for sign up form -->
<?php
session_start();
//user entered values are stored into php variables
$name=$_POST["name"]; //name
$un=$_POST["username"]; //username
$pwd=$_POST["pwd"]; //password
$encryptpwd=md5($pwd); //password encryption
$confirmpwd=$_POST["confirmpwd"]; //confirm password
//form validation
if($name==""){
    //error if name is not entered
    header("Location:sign-in.php?err4=entername");
}elseif($un==""){
    //error if username not entered
    header("Location:sign-in.php?err5=enterusername");
}elseif($pwd==""){
    //error if password not entered
    header("Location:sign-in.php?err6=enterpassword");
}elseif($confirmpwd==""){
    //error if confirm password not entered
    header("Location:sign-in.php?err7=confirmpassword");
}else{
    //checking if passwords entered match or not
    if($pwd==$confirmpwd){ //if passwords match
        include 'db.php';
    //comparing user entered username with database to check if it already exist or not
    $q="SELECT `username` from `userlogin` where `username`='$un'";
    $rs=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($rs);
        //checking if username already exist
        if($un==$row["username"]){
            //error if already exist
            header("Location:sign-in.php?errmssge=usernameexist");   
            }else{
            //quert to sign up successfully
            $insertquery="INSERT INTO `userlogin`( `name`, `username`, `password`) VALUES ('$name','$un','$encryptpwd')";
            mysqli_query($conn,$insertquery);
            //successfulsignin
            header("Location:sign-in.php?mssge=SuccesfullyUpdated");
            }
}else{
    //if passwords does'nt match
    header("Location:sign-in.php?errmssg=passworddontmatch");
    }
}
?>
<!-- end of php code for sign up form -->