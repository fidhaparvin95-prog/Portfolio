<!-- php code to update an existing product -->
<?php
session_start();
//storing user entered values into variables
$productid = $_POST["pno"]; //product id
$name = $_POST["pname"]; //product name
$category = $_POST["category"]; //product category
$price = $_POST["pri"]; //product price
$size = $_POST["psize"]; //product size available
$status = $_POST["pstatus"]; //product status
//form validation
if ($name == "") {
    //error if product name is not entered
    header("Location:updateproduct.php?err8=productname");
} elseif ($category == "") {
    //error if category not selected
    header("Location:updateproduct.php?err9=category");
} elseif ($price == "") {
    //error if price not entered
    header("Location:updateproduct.php?err10=price");
} elseif ($size == "") {
    //error if size not entered
    header("Location:updateproduct.php?err11=size");
} elseif ($status == "") {
    //error if status not selected
    header("Location:updateproduct.php?err12=status");
} else {
    include 'db.php';
    // query to update product details
    $q = "UPDATE `product` SET `product name`='$name',`category`='$category',`price`='$price',`available size`='$size',`status`='$status' WHERE `product id`= '$productid'";
    mysqli_query($conn, $q);
    mysqli_close($conn);
    // If product details updated successfully into database
    header("Location:updateproduct.php?mssge=SuccesfullyUpdated");
}
?>
<!--end of php code to update an existing product -->