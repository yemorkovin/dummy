<?php 
require_once "../config.php";
$txt = $_POST["txt"];
$email = $_POST["email"];
$pswd = $_POST["pswd"];
$sql = "insert into `customers` (`email`, `login`, `password`) values ('$email', '$txt', '$pswd')";
$result = mysql_query($sql, $link);
mysql_close($link);
header("Location: ../login.php?suc=1");
exit;
?>