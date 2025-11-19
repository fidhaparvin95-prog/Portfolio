<?php 
session_start();
$username = $_POST["uname"];
$password = $_POST["pwd"];
include 'db.php';  
$q = "select * from profile where '$username' = email and '$password' = password";
$rs = mysqli_query($conn, $q);
	$useravailable = "false";
    while ($row = mysqli_fetch_array($rs)) {
        $useravailable = "true";
		$_SESSION["suserid"] = $row["user_id"];
		$_SESSION["susername"] = $row["email"];
		$_SESSION["suserpic"] = $row["profile_picture"];

    }
    if ($useravailable == "true") {
		
		header("Location:home.php?mssg=loginsuccessfull");
	} 
    else {
		
		header("Location:index.php?errormssg=invalidcredential");
	}
?>
