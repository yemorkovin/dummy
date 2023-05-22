<?php 
session_start();
unset($_SESSION["admin"]);
unset($_SESSION["admin_login"]);
header("Location: index.php");
?>