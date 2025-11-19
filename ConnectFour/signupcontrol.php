<?php
session_start();
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["em"];
$password = $_POST["pwd"];
$confirm_password = $_POST["cpwd"];
$profile_picture = "images/default-profile-picture.jpg";
if($firstname ==""){
    header("Location:signup.php?err1=enterfirstname");
}elseif($lastname == ""){
    header("Location:signup.php?err2=enterlasttname");
}elseif($email == ""){
    header("Location:signup.php?err3=enteremail");
}elseif($password == ""){
    header("Location:signup.php?err4=enterpassword");
}elseif($confirm_password == ""){
    header("Location:signup.php?err5=enterconfirmpassword");
}elseif($password == $confirm_password){
    include 'db.php';
    $q="SELECT `email` from `profile` where `email`='$email'";
    $rs=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($rs);
    if($email==$row["email"]){
        header("Location:signup.php?err6=emailalreadyexist");   
        }else{
        $insertquery="INSERT INTO `profile`( `first_name`,`last_name`,`email`,`password`,`confirm_password`,`profile_picture`,`score`) VALUES ('$firstname','$lastname','$email','$password','$confirm_password','$profile_picture',0)";
        mysqli_query($conn,$insertquery);
        header("Location:index.php?mssg1=SuccesfullyAdded");
        }

}else{
    header("Location:signup.php?err7=enteredpassworddoesnotmatch");
}
?>