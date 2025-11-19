<?php 
session_start();
// storing data received from post method into variables
$username = $_POST["uname"];
$password = $_POST["pwd"];
$user = $_POST["option"];
include 'db.php'; 
// Checking if the user is a student, staff or admin and retieving the required data
if($user == "student") {
	$q = "select * from profile where '$username' = email and '$password' = password and user = 'student'";
} elseif($user == "staff"){
	$q = "select * from profile where '$username' = email and '$password' = password and user = 'staff'";
}else{
	$q = "select * from profile where '$username' = email and '$password' = password and user = 'admin'";
}

$rs = mysqli_query($conn, $q);
// initially user availability is set to false
	$useravailable = "false";
    while ($row = mysqli_fetch_array($rs)) {
		// When user found, user availability is set to true
        $useravailable = "true";
		// Data set on session
		$_SESSION["suserid"] = $row["user_id"];
		$_SESSION["susername"] = $row["email"];
		$_SESSION["suserpic"] = $row["profile_picture"];
		$_SESSION["user"] = $row["user"];
    }
	// Successfull message if logged in correctly
    if ($useravailable == "true") {
		if($user == "student"){
		header("Location:home.php?mssg=loginsuccessfull");
		} elseif($user == "staff"){
			header("Location:staffhome.php?mssg=loginsuccessfull");
		} elseif($user == "admin"){
			header("Location:adminhome.php?mssg=loginsuccessfull");
		}
	} 
	// Error message while logging in
    else {
		if($user == "student"){
			header("Location:index.php?errormssg=invalidcredential");
		} elseif($user == "staff"){
			header("Location:index.php?errormssg1=invalidcredential");
		}elseif($user == "admin"){
			header("Location:index.php?errormssg2=invalidcredential");
		}
		
		
	}
?>
