<?php
session_start();
include 'db.php';
$sql = "SELECT `tile_id`,`user_picture` FROM `game`";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
echo json_encode($json_array);
?>