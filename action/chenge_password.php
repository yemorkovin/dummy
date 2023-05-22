<?php
session_start();
require_once "../config.php";
$id = $_SESSION['id'];

$newpassord = $_POST["new-password"];
$confpassword = $_POST["confirm-password"];
if($newpassord != $confpassword){
    header("Location: ../account.php?error=1");
    exit;
}else{
    $sql = "update `customers` set `password` = '$newpassord' WHERE `id_cust` = '$id'";
    $_SESSION["password"] = $newpassord;
    $result = mysql_query($sql, $link);
    header("Location: ../account.php?error=2");
    exit;
}   