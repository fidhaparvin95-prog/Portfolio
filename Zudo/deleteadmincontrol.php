<!-- PHP code to delete admin -->
<?php
session_start();
$id = $_POST["usernmbr"]; //admin id
// Validation not to accept null values
if ($id == "") {
    header("Location:addadmin.php?errormssg1=id");
} 
// End of Validation
// If id not null proceed with deletion
else {
    // Establishing Database Connection
    include 'db.php';
    // Query to fetch data from database
    $q = "SELECT * FROM `adminlogin` WHERE userno='$id'";
    // Exexuting Query
    $rs = mysqli_query($conn, $q);
    $row = mysqli_fetch_array($rs);
    if ($row["userno"] == "$id") {
        // Query to delete admin user
        $q = "DELETE FROM `adminlogin` WHERE userno='$id'";
        // Query Execution
        $rs = mysqli_query($conn, $q);
        // Succesful Deletion
        header("Location:addadmin.php?mssg=userdeleted");
    } else {
        // Unsuccessful in Deleting
        header("Location:addadmin.php?errormssg=invaliduserid");
    }
}
?>
<!-- End of delete admin code -->