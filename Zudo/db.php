<?php 
// Establishing connection with database
   $conn = new mysqli("localhost", "root", "","zudo");
   if($conn -> connect_error){
      die("Database not connected ".$conn->connect_error);
   }
   return $conn;
    ?>