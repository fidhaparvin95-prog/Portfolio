<?php
session_start();
include 'db.php';
//Retrieving the current status of the game from the game table
$sql = "SELECT `tile_id`,`user_picture` FROM `game`";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
// Converting the resulting data into json format
echo json_encode($json_array);
?>