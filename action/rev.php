<?php
session_start();
require_once "../config.php";
$rev = $_POST["rev"];
$login = $_SESSION["login"];
$sql1 = "insert into `reviews` (`review_text`, `review_login`) values ('$rev', '$login')";
$result = mysql_query($sql1, $link);
mysql_close($link);
header("Location: ../feedback.php?suc=1");
exit;
?>