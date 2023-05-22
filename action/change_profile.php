<?php
session_start();
require_once "../config.php";
$login = $_POST['first-name'];
$email = $_POST["last-name"];
$id = $_SESSION["id"];


$img = $_FILES["rofile-picture"]["name"];
if (move_uploaded_file($_FILES['rofile-picture']['tmp_name'], "../img/profile/".$img)) {
        $sql = "update `customers` set `login` = '$login', `email` = '$email', `img` = '$img' WHERE `id_cust` = '$id'";
        $result = mysql_query($sql, $link);
        mysql_close($link);
        $_SESSION["img"] = $img;
         header("Location: ../account.php?error=3");
        exit;

} else {
      $sql = "update `customers` set `login` = '$login', `email` = '$email' WHERE `id_cust` = '$id'";
        $result = mysql_query($sql, $link);
        mysql_close($link);
        $_SESSION["login"] = $login;
        $_SESSION["email"] = $email;
         header("Location: ../account.php?error=3");
        exit;
}