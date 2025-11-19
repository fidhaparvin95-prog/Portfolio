<?php
session_start();
include 'db.php';
// storing data received from post method into variables
$id_of_tiles = $_POST['tile_id'];
$class_name = $_POST['icon_class_name'];
// updating the entire table on the database after updation
for($k=0;$k<count($id_of_tiles);$k++){
    $id_of_tile = mysqli_real_escape_string($conn,$id_of_tiles[$k]);
    $class = mysqli_real_escape_string($conn,$class_name[$k]);
    $q = "UPDATE `gameboard` SET `icon_class_name`='$class' WHERE `tile_id`='$id_of_tile'";
    mysqli_query($conn,$q);
}
// Redirect to home admin home page
header('Location:adminhome.php?mssg1=Updated');
?>