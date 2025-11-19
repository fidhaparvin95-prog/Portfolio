<?php
session_start();
include 'db.php';
// retrieving the messages sent on public chat by various users
$sql = "SELECT message.user_id,message.message,profile.profile_picture FROM `message` INNER JOIN `profile` ON message.user_id = profile.user_id ORDER BY message.timestamp ASC";
$result = mysqli_query($conn,$sql);
$json_array = array();
while($data = mysqli_fetch_assoc($result)){
    $json_array[] = $data;
}
// Converting the data into json format
echo json_encode($json_array);
?>