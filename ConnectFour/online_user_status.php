<?php
session_start();
include 'db.php';
// Retrieving user data whose status is online
$sql = "SELECT profile_picture, CONCAT(first_name, ' ',last_name) AS `full_name`  FROM `profile` WHERE `status` = 'online'";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
// Converting the data into json format
echo json_encode($json_array);
?>