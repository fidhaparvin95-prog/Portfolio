<?php 
session_start();

$id=$_POST["usernmbr"];
$conn=mysqli_connect("vesta.uclan.ac.uk","FPRifas-ali","NLX7ytZS");
mysqli_select_db($conn,'FPRifas-ali');
$q="SELECT * FROM `adminlogin` WHERE userno='$id'";
$rs=mysqli_query($conn,$q);
$row=mysqli_fetch_array($rs);
if($row["userno"]=="$id"){
    $q="DELETE FROM `adminlogin` WHERE userno='$id'";
    $rs=mysqli_query($conn,$q);
    header("Location:addadmin.php?mssg=userdeleted");
}
else{
    header("Location:addadmin.php?errormssg=invaliduserid");
}

?>