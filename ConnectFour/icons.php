<?php
session_start();
include 'db.php';
$sql = "SELECT `tile_id`, `icon_class_name` FROM `gameboard`";
$result = mysqli_query($conn,$sql);
$json_icon_class_name = array();
while($data = mysqli_fetch_assoc($result)){
    $json_icon_class_name[] = $data;
}
// if($executequery->num_rows>0){
//     $icon_class_name[$row["tile_id"]] = $row["icon_class_name"];
// }
echo json_encode($json_icon_class_name);
?>