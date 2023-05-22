<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/account.css">
</head>
<body>
    <header class="header">
        <div class="wrapper">
            <div class="header__wrapper">
                <div class="header__logo">
                    <a href="/" class="header__logo-link">
                        <img src="./img/svg/Dummy.svg" alt="Dummy" class="header__logo-pic">
                    </a>
                </div>
                
                <nav class="header__nav">
                   <ul class="header__list">
                        <li class="header__item">
                            <a href="index.php" class="header__link">главная</a>
                        </li>
                        <li class="header__item">
                            <a href="catalog.php" class="header__link">каталог</a>
                        </li>
                        <li class="header__item">
                            <a href="basket.php" class="header__link">корзина</a>
                        </li>
                        <li class="header__item">
                            <a href="feedback.php" class="header__link">отзывы</a>
                        </li>
                        <li class="sign">
                            <!--<button type="submit"   class="sign__back" onClick="Input()" >Войти</button>-->
                            <?php
								if(isset($_SESSION["id"])){
									echo '<a  href="account.php">'.$_SESSION["login"].'</a><br /><a href="logout.php" class="sign__back" >Выход</a>';
								}
								else{
									echo '<a href="login.php" class="sign__back">Войти</a>';
								}
							
							?>
							
                        </li>
                    </ul>
                </nav>
             </div>
        </div>
    </header>

    <main class="main">
        <section class="intro">
            <div class="personal-cabinet">
                <h2>Личный кабинет</h2>
                
                <ul class="navigation">
                <li class="active">Изменение пароля</li>
                <li>Редактирование</li>
                <li>Покупки</li>
                </ul>
                
                <div class="sections">
                <div class="section active">
                    <?php 
                    if(isset($_GET["error"])){
                        if($_GET["error"] == 1){
                        echo "Возникла ошибка при изменении пароля!";
                        }
                        if($_GET["error"] == 2){
                            echo "Пароль успешно обновлен";
                        }
                        

                    }
                        
                    ?>
                    <h3>Изменение пароля</h3>
                    <form action="action/chenge_password.php" method="post">
                        <label for="current-password">Текущий пароль:</label>
                        <input type="text" id="current-password" name="current-password" value="<?= $_SESSION["password"]?>" required>
                        
                        <label for="new-password">Новый пароль:</label>
                        <input type="password" id="new-password" name="new-password" required>
                        
                        <label for="confirm-password">Подтверждение пароля:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                        
                        <button type="submit">Изменить пароль</button>
                    </form>
                </div>
                
                <div class="section">
                    <?php 
                    if(isset($_GET["error"])){
                        if($_GET["error"] == 4){
                        echo "Возникла ошибка при изменении данных!";
                        }
                        if($_GET["error"] == 3){
                            echo "Данные успешно обновлен";
                        }
                        

                    }
                        
                    ?>
                    <h3>Редактирование</h3>
                    <form action="action/change_profile.php" enctype="multipart/form-data" method="post">
                    <label for="first-name">Логин:</label>
                    <input type="text" id="first-name" name="first-name" value="<?= $_SESSION["login"]?>" required>
                    
                    <label for="last-name">Email:</label>
                    <input type="text" id="last-name" name="last-name" value="<?= $_SESSION["email"]?>" required>
                    
                    <label for="profile-picture">Изменение картинки:</label>
                    <?php 
                        if($_SESSION['img'] != 'null'){
                            echo '<img src="img/profile/'.$_SESSION['img'].'" width="100%" id="img"/>';
                        }
                        else{
                            echo '<img src="" width="100%" id="img"/>';
                        }
                    ?>
                    
                    <input type="file" id="profile-picture" name="rofile-picture" >
                    
                    <button type="submit">Сохранить</button>
                    </form>
                </div>
                
                <div class="section">
                    <h3>Покупки</h3>
                    <ul class="purchases-list">
                        <?php 
                        $id_cust = $_SESSION["id"];
                        require_once "config.php";
                        $sql = "SELECT * FROM `orders` WHERE `id_cust` = $id_cust";

                        $result = mysql_query($sql, $link);
                        while($row = mysql_fetch_array($result)){
                            echo "<li>Покупка #".$row["id_order"]." ".$row["date_ord"]."</li>";
                        }
                        ?>
                    
                    </ul>
                </div>
                </div>
            </div>
      
      
        </section>
    </main>

    <footer class="footer">
        <div class="wrapper">
            <div class="footer__item">
                <div class="footer__logo">
                    <img src="./img/svg/dummyFoot.svg"  alt="" class="footer__logo-pic">
                </div>
                <nav class="footer__nav">
                    <ul class="footer__menu">
                        <li class="footer__menu-item">
                            <h3 class="footer__menu-title"></h3>
                        </li>
                        <li class="footer__menu-item">
                            <a href="https://vk.com/public189046890" class="footer__menu-link">Вконтакте</a>
                        </li>
                        <li class="footer__menu-item">
                            <a href="#!" class="footer__menu-link">Instagram</a>
                        </li>
                        <li class="footer__menu-item">
                            <a href="https://www.youtube.com/channel/UC0x2ER21wXmEtyLH4sxuByA" class="footer__menu-link">Youtube</a></a>
                        </li>  
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
      
    <script src="./Js/account.js"></script> 
    <script src="./Js/jquery-3.7.0.min.js"></script> 

    <script type="text/javascript">
        $('#profile-picture').change(function (event){
            var tmp_url = window.URL.createObjectURL(event.target.files[0]);
            $("#img").attr("src", tmp_url);
        });
    </script>
    
</body>
</html>
