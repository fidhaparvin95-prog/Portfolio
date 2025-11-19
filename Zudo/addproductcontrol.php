<?php
session_start();
$pname=$_POST["pname"];
$category=$_POST["category"];
$pri=$_POST["pri"];
$psize=$_POST["psize"];
$pstatus=$_POST["pstatus"];
$suser=$_SESSION["suserno"];

if(isset($_FILES['img']) && strlen($_FILES['img']['name']) > 0 )
{
 $file_name = $_FILES['img']['name'];

 $file_path = "images/$category/".$file_name;
															 
 $file_size =$_FILES['img']['size'];
 
 $file_tmp =$_FILES['img']['tmp_name'];
 
 move_uploaded_file($file_tmp,$file_path);
 }

 $conn=mysqli_connect("Localhost","root","");
mysqli_select_db($conn,'Zudo');
$q="INSERT INTO `product`( `product name`, `category`, `price`, `available size`, `product image`, `status`,`userno`) VALUES ('$pname','$category','$pri','$psize','$file_name','$pstatus','$suser');";
mysqli_query($conn,$q);

print($q);

header("Location:updateproduct.php?mssg=SuccesfullyInserted");
?>
