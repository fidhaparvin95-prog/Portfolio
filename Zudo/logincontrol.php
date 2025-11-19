<?php 
session_start();
$user=$_POST["user"];
$userenteredusername=$_POST["username"];
$userenteredpassword=$_POST["pwd"];

$conn=mysqli_connect("vesta.uclan.ac.uk","FPRifas-ali","NLX7ytZS");
mysqli_select_db($conn,'FPRifas-ali');
if($user=="user"){
	$q="select * from userlogin where '$userenteredusername'=username and '$userenteredpassword'=password";
}
else{
	$q="select * from adminlogin where '$userenteredusername'=username and '$userenteredpassword'=password";
}

$rs=mysqli_query($conn,$q);

$useravailable="false";
while($row=mysqli_fetch_array($rs)){
    $useravailable="true";
    // print($row["userno"]);
	$_SESSION["suserno"]=$row["userno"];
	$_SESSION["susername"]=$row["name"];
}
$test="Location:sign-in.php?errormssg=invalidcredential&un=$userenteredusername&up=$userenteredpassword";

if($useravailable== "true"){
	if($user=="user"){
		header("Location:userhome.php?mssg=loginsuccessfull");
	}else{
		header("Location:adminhome.php?mssg=loginsuccessfull");
	}

}else{
	header("Location:sign-in.php?errormssg=invalidcredential&un=$userenteredun&up=$userenteredp");
}


?>