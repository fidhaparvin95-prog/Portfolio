<!-- php code for users to login using their credentials -->
<?php
session_start();
//user entered values stored into php variables
$user = $_POST["user"]; //user
$userenteredusername = $_POST["username"]; //username
$userenteredpassword = $_POST["pwd"]; //password
$encuserpwd = md5($userenteredpassword); //encrypted password
//form validation
if ($user == "") {
	//error if user not selected
	header("Location:sign-in.php?err1=selectuser");
} elseif ($userenteredusername == "") {
	//error if username not entered
	header("Location:sign-in.php?err2=enterusername");
} elseif ($userenteredpassword == "") {
	//error if password not entered
	header("Location:sign-in.php?err3=enterpassword");
} else {
	//if values are entered database connection is established
	include 'db.php';
	if ($user == "user") {
		//query if the user is customer
		$q = "select * from userlogin where '$userenteredusername'=username and '$encuserpwd'=password";
	} else {
		//query if the user is admin
		$q = "select * from adminlogin where '$userenteredusername'=username and '$userenteredpassword'=password";
	}
	$rs = mysqli_query($conn, $q);
	$useravailable = "false";
	while ($row = mysqli_fetch_array($rs)) {
		$useravailable = "true";
		//userno and username is stored in session
		$_SESSION["suserno"] = $row["userno"];
		$_SESSION["susername"] = $row["name"];
	}
	if ($useravailable == "true") {
		if ($user == "user") {
			//navigate to customer view after successful login
			header("Location:index.php?mssg=loginsuccessfull");
		} else {
			//navigate to admin view after successful login
			header("Location:adminhome.php?mssg=loginsuccessfull");
		}
	} else {
		//unsuccessful login
		header("Location:sign-in.php?errormssg=invalidcredential");
	}
}
?>
<!--end of php code for users to login using their credentials -->