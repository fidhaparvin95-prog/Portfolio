<?php 
// Establishing connection with database
   $conn = new mysqli("localhost", "root", "","master_project");
   if($conn -> connect_error){
      die("Database not connected ".$conn->connect_error);
   }
   return $conn;
    ?>