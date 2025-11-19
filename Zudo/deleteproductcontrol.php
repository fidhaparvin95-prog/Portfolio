<!-- php code to delete product -->
<?php 
session_start();
// Stored user entered product id in to a variable
$pid=$_POST["pno"]; //user entered product id
// validation
if($pid==""){
    // Error if product id not entered
    header("Location:updateproduct.php?err7=productid");
}else{
    // Establishing database connection
    include 'db.php';
// query to select the product to be deleted
$q="SELECT * FROM `product` WHERE `product id`='$pid'";
$rs=mysqli_query($conn,$q);
$row=mysqli_fetch_array($rs);
if($row["product id"]=="$pid"){
    // Query to delete product
    $q="DELETE FROM `product` WHERE `product id`='$pid'";
    $rs=mysqli_query($conn,$q);
    // On successful deletion of product
    header("Location:updateproduct.php?msg=productdeleted");
}
else{
    // If user entered product id does not exist
    header("Location:updateproduct.php?errormssg=invalidproductid");
}
}
?>
<!-- end of php code to delete product -->