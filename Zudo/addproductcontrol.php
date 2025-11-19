<!-- php code to add new product -->
<?php
session_start();
// getting values from add new product form and stored into variables
$pname = $_POST["pname"]; //product name
$category = $_POST["category"]; //product category
$pri = $_POST["pri"]; //product price
$psize = $_POST["psize"]; //product size
$pstatus = $_POST["pstatus"]; //product status
$suser = $_SESSION["suserno"]; //admin id(logged in)
// End of getting values
// Code to store image using upload file
//Acknowledgment - Stackoverflow
if (isset($_FILES['img']) && strlen($_FILES['img']['name']) > 0) {
   $file_name = $_FILES['img']['name'];

   $file_path = "images/$category/" . $file_name;

   $file_size = $_FILES['img']['size'];

   $file_tmp = $_FILES['img']['tmp_name'];

   move_uploaded_file($file_tmp, $file_path);
}
// End of upload file code
// Validation not to accept null values for fields
if ($pname == "") {
   // if product name not entered
   header("Location:updateproduct.php?err1=productname");
} elseif ($category == "") {
   // if category not selected
   header("Location:updateproduct.php?err2=category");
} elseif ($pri == "") {
   // if price not entered
   header("Location:updateproduct.php?err3=price");
} elseif ($psize == "") {
   // if available size not entered
   header("Location:updateproduct.php?err4=productsize");
} elseif ($file_name == "") {
   // if image file not selected
   header("Location:updateproduct.php?err5=image");
} elseif ($pstatus == "") {
   // if status not selected
   header("Location:updateproduct.php?err6=status");
}
// End of Validation 
else {
   // Establishing Database Connection
   include 'db.php';
   // Query to set foreign key check to zero  
   // Acknowledgment - Stack overflow
   $x = "SET FOREIGN_KEY_CHECKS=0";
   mysqli_query($conn, $x);
   // Query to insert new product into database
   $q = "INSERT INTO `product`(`product name`, `category`, `price`, `available size`, `product image`, `status`, `userno`) VALUES ('$pname','$category','$pri','$psize','$file_name','$pstatus','$suser');";
   mysqli_query($conn, $q);
   // Successful Product Insertion
   header("Location:updateproduct.php?mssg=SuccesfullyInserted");
}
// End of add new product code
