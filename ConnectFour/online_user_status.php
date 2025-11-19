<?php
session_start();
include 'db.php';
$sql = "SELECT profile_picture, CONCAT(first_name, ' ',last_name) AS `full_name`  FROM `login` WHERE `status` = 'online'";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
echo json_encode($json_array);
?>