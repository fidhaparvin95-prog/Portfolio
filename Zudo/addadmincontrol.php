<!-- php code to add new admin -->
<?php
session_start();
// Getting values from the form and stored into variables
$name = $_POST["adminname"]; //full name
$username = $_POST["username"]; //username
$password = $_POST["pwd"]; //password
// Validation to not accept null values
if ($name == "") {
    // If name is not entered
    header("Location:addadmin.php?err1=name");
} elseif ($username == "") {
    // If username not entered
    header("Location:addadmin.php?err2=username");
} elseif ($password == "") {
    // If password not entered
    header("Location:addadmin.php?err3=password");
} else {
    include 'db.php';
    // Query to check if the user entered username already exist
    $q = "SELECT `username` from `adminlogin` where `username`='$username'";
    $rs = mysqli_query($conn, $q);
    $row = mysqli_fetch_array($rs);
    if ($username == $row["username"]) {
        // Unsuccessful in adding new admin because of existing username
        header("Location:addadmin.php?err4=usernameexist");
    } else {
        // Query to add new admin
        $insertquery = "INSERT INTO `adminlogin`( `name`, `username`, `password`) VALUES ('$name','$username','$password')";
        mysqli_query($conn, $insertquery);
        // Successfully added new admin
        header("Location:addadmin.php?msg=SuccesfullyInserted");
    }
}
// End of add new admin code
