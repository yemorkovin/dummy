<?php
session_start();
require_once "../config.php";
 if(isset($_SESSION['id'])) $id_user = $_SESSION['id'];
					else $id_user = 0;
					
					$sql1 = "select `tovar`.`name_tovar`, `categories`.`name_cat`,`tovar`.`image`, (`tovar`.`price` * `basket_tovar`.`kolvo`) as price from `basket_tovar` 
										join `tovar` on `basket_tovar`.`id_tovar` = `tovar`.`id_tovar`
										join `categories` on `tovar`.`id_cat` = `categories`.`id_cat`
										where `basket_tovar`.`id_user` = $id_user
										
										group by `basket_tovar`.`id_tovar`,`basket_tovar`.`id_user`";
					$result1 = mysql_query($sql1, $link);
                    
                        $s = "insert into `orders` (`id_cust`) values ($id_user)";
                       
                     
                        $r = mysql_query($s, $link);
                    

					$sql = "delete from `basket_tovar`
										where `id_user` = $id_user";
					$result = mysql_query($sql, $link);
					mysql_close($link);

$to = $_POST["emial"];

$subject = 'Оплата';

$headers  = "From: " . strip_tags($_POST['admin@site.ru']) . "\r\n";
$headers .= "Reply-To: " . strip_tags($_POST['admin@site.ru']) . "\r\n";
$headers .= "CC: admin@site.ru\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = 'Оплата на карту 5536 9139 3943 2080. Сумма к оплате '.$_POST["summa"];


mail($to, $subject, $message, $headers);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css/reset.css">
    <link rel="stylesheet" href="../css/paymant.css">
</head>
<body>
    <div class="container">
        <!--<div class="card">
          <button class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
            </svg></button>
                <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
            <label>Card number:</label>
                <input id="user" type="text" class="input cardnumber"  placeholder="1234 5678 9101 1121">
            <label>Name:</label>
            <input class="input name"  placeholder="Edgar Pérez">
            <label class="toleft">CCV:</label>
            <input class="input toleft ccv" placeholder="321">
        </div>-->
        <div class="receipt">
          <div class="col"><p>Сумма к оплате:</p>
          <h2 class="cost"><?=$_POST["summa"]?></h2><br>
            <p>Email:</p>
            <h2 class="seller"><?= $_POST["emial"]?></h2>
          </div>
          <div class="col">
            <p>Купленные товары:</p>
            <?php 
				while($row = mysql_fetch_assoc($result1)){
            ?>
            <h3 class="bought-items"><?= $row["name_tovar"]?></h3>
            <p class="bought-items description"><?= $row["name_cat"]?></p>
            <p class="bought-items price"><?= $row["price"]?></p><br>
            <?php 
			}
            ?>

          </div>
          <p class="comprobe">Эта информация будет отправлена на вашу электронную почту</p>
        </div>
      </div>
</body>
</html>