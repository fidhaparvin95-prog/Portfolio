<?php
session_start();
unset($_SESSION["susername"]);
unset($_SESSION["suserno"]);
header("Location:sign-in.php");

?>