<?php
session_start();
//unsetting userno and username from session on logout
unset($_SESSION["susername"]);
unset($_SESSION["suserno"]);
header("Location:sign-in.php");
?>