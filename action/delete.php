<?php
session_start();
require_once "../config.php";
$id = $_GET["id"];
$sql = "delete from `basket_tovar` where (`id_bask` = $id)";
$result = mysql_query($sql, $link);
mysql_close($link);
header("Location: ../basket.php");
exit;
?>