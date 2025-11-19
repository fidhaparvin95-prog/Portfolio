<!-- php code to enter users feedback into database -->
<?php
session_start();
//storing user entered values into php variables
$user = $_SESSION["susername"]; // name of customer taken from session
$productid = $_GET["pid"]; // product id
$category = $_GET["category"]; //product category
$feedback = $_GET["feedbacktxt"]; //user entered feedback
//form validation
if($feedback==""){
    //error if feedback is not entered before submitting form
header("Location:$category.php?err=$productid");
}else{
    //paasing value of product id through url(get)
    header("Location:$category.php");
    include 'db.php';
//query to insert feedback into database
$q = "INSERT INTO `feedback`(`product id`, `feedback`, `user`) VALUES ('$productid','$feedback','$user')";
mysqli_query($conn, $q);
//if feedback stored into database successfully
header("Location:$category.php?mssg=$productid");
}
?>
<!-- end of php code to enter users feedback into database -->

