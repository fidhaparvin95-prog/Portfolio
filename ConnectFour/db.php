<?php 
   $conn = new mysqli("vesta.uclan.ac.uk", "FPRifas-ali", "NLX7ytZS","FPRifas-ali");
   if($conn -> connect_error){
      die("Database not connected ".$conn->connect_error);
   }
   return $conn;
    ?>