<?php
session_start();
include 'db.php';
//Retrieving the details of the top three players who hold maximum number of points in descending order
$q1 = "SELECT user_id, profile_picture, score, CONCAT(first_name, ' ',last_name) AS `full_name`  FROM `profile` GROUP BY user_id ORDER BY score DESC LIMIT 3";
$rs = mysqli_query($conn,$q1);
$json_array = array();
while($data = mysqli_fetch_assoc($rs)){
    //storing the data into an array
    $json_array[] = $data;
}
//converting the array into json format
echo json_encode($json_array);
?>