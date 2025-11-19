<?php
session_start();
include 'db.php';
// Retrieving the class names for each icon from the database
$sql = "SELECT `tile_id`, `icon_class_name` FROM `gameboard`";
$result = mysqli_query($conn,$sql);
$json_icon_class_name = array();
while($data = mysqli_fetch_assoc($result)){
    $json_icon_class_name[] = $data;
}
// converting the collected data into json format
echo json_encode($json_icon_class_name);
?>