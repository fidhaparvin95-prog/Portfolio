<?php
session_start();
//Getting data from the sign up for using post method and assigning them to PHP variables
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$confirm_password = $_POST["cpwd"];
$profile_picture = "images/default-profile-picture.jpg";
//Checking if any values are null, If yes an error message is triggered
if($firstname ==""){
    header("Location:adminhome.php?err8=enterfirstname");
}elseif($lastname == ""){
    header("Location:adminhome.php?err9=enterlasttname");
}elseif($email == ""){
    header("Location:adminhome.php?err10=enteremail");
}elseif($password == ""){
    header("Location:adminhome.php?err11=enterpassword");
}elseif($confirm_password == ""){
    header("Location:adminhome.php?err12=enterconfirmpassword");
    //Checkinh if the entered passwords match then the users data is added to the database(i.e account created for new user)
}elseif($password == $confirm_password){
    include 'db.php';
    $q="SELECT `email` from `profile` where `email`='$email'";
    $rs=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($rs);
    //Checking if the entered email already exists. User cannot register an account using an already existing email on the database
    if($email==$row["email"]){
        header("Location:adminhome.php?err13=emailalreadyexist");   
        }else{
            //If all the above checking is surpassed then the users data is added to the database(i.e account created for new user)
        $insertquery="INSERT INTO `profile`( `first_name`,`last_name`,`email`,`password`,`confirm_password`,`profile_picture`,`status`,`score`,`user`) VALUES ('$firstname','$lastname','$email','$password','$confirm_password','$profile_picture','null',0,'admin')";
        mysqli_query($conn,$insertquery);
        //User redirected to login page with a successful message
        header("Location:adminhome.php?mssg3=SuccesfullyAdded");
        }
}else{
    //User redirected to login page with an error message
    header("Location:adminhome.php?err14=enteredpassworddoesnotmatch");
}
?>