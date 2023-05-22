<?php
session_start();
require_once "../config.php";
$email = $_POST["email"];
$pswd = $_POST["pswd"];
$sql = "SELECT * FROM `customers` WHERE `email` = '$email' AND `password` = '$pswd'";

$result = mysql_query($sql, $link);
mysql_close($link);
if (!$result) {
    header("Location: ../login.php?suc=2");
    exit;
} else {
    $row = mysql_fetch_assoc($result);
    
    if ($row === false) {
        // Если в результате запроса не было найдено соответствующей записи (неверный логин или пароль)
        header("Location: ../login.php?suc=2&error=1");
        exit;
		
    }
    
    $_SESSION["id"] = $row["id_cust"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["login"] = $row["login"];
    $_SESSION["password"] = $row["password"];
    $_SESSION["img"] = $row["img"];
    header("Location: ../index.php");
    exit;
}





