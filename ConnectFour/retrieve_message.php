<?php
session_start();
include 'db.php';
$sql = "SELECT message.user_id,message.message,login.profile_picture FROM `message` INNER JOIN `login` ON message.user_id = login.user_id ORDER BY message.timestamp ASC";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
echo json_encode($json_array);
?>