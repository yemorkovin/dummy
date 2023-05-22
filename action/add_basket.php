<?php
session_start();
require_once "../config.php";
$id = $_POST["id"];
if(isset($_SESSION["id"])){
	$id_user = $_SESSION["id"];
}else{
	$id_user = 0;
}


$sql = "select * from `basket_tovar` where (`id_tovar` = $id) and (`id_user` = $id_user)";
$result = mysql_query($sql, $link);

if(mysql_fetch_assoc($result)){
	$sql1 = "update `basket_tovar` set `kolvo` = (`kolvo`+1) where (`id_tovar` = $id) and (`id_user` = $id_user)";
}
else{
	$sql1 = "insert into `basket_tovar` (`id_tovar`, `kolvo`, `id_user`) values ($id, 1, $id_user)";
}
$result = mysql_query($sql1, $link);
mysql_close($link);
header("Location: ../basket.php");
exit;
?>