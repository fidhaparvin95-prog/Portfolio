<?php 
session_start();

$pid=$_POST["pno"];
$conn=mysqli_connect("Localhost","root","");
mysqli_select_db($conn,'zudo');
$q="SELECT * FROM `product` WHERE `product id`='$pid'";
$rs=mysqli_query($conn,$q);
$row=mysqli_fetch_array($rs);
if($row["product id"]=="$pid"){
    $q="DELETE FROM `product` WHERE `product id`='$pid'";
    $rs=mysqli_query($conn,$q);
    header("Location:updateproduct.php?msg=productdeleted");
}
else{
    header("Location:updateproduct.php?errormssg=invalidproductid");
}

?>
