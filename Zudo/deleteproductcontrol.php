<?php 
session_start();

$pid=$_POST["pno"];
$conn=mysqli_connect("vesta.uclan.ac.uk","FPRifas-ali","NLX7ytZS");
mysqli_select_db($conn,'FPRifas-ali');
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