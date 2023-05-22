<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
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
            <div class="main2">  	
                <input type="checkbox" id="chk" aria-hidden="true">
					
                    <div class="signup">
					<?php 
					if(!isset($_SESSION["id"])){
					?>
					<?php 
						if($_GET['suc'] == 1){
							echo "<p align='center' style='margin-top: 10px'>Вы успешно зарегистрированы!</p>";
                        }
                        if(($_GET['suc'] == 2) && ($_GET['error'] == 1)){
                            echo "<p align='center' style='margin-top: 10px'>Ошибка авторизации!</p>";
                        }
					?>

                        <form action="action/auth.php" method="post">
                            <label for="chk"  aria-hidden="true">Авторизация</label>
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Войти</button>
                        </form>
						<?php 
                        }else{
                            echo "<p align='center' style='margin-top: 20px'>ВЫ АВТОРИЗОВАНЫ!</p>";
                        }
                        // Проверяем наличие параметра error в URL
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            
                            // Вывод сообщения об ошибке
                            if ($error == 1) {
                                echo '<p align="center" style="margin-top: 10px; color: white;">Логин или пароль неверны</p>';
                            }
                        }
                        ?>

                     

					
                    </div>
					<?php 
					if(!isset($_SESSION["id"])){
					?>
                    <div class="login">
					
                        <form action="action/reg.php" method="post">
                            <label for="chk" aria-hidden="true">Регистрация</label>
                            <input type="text" name="txt" placeholder="User name" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Создать</button>
                        </form>
                    </div>
					<?php 
					}
					?>
					
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
                            <a href="https://www.youtube.com/channel/UC0x2ER21wXmEtyLH4sxuByA" class="footer__menu-link">Youtube</a>                            </a>
                        </li>  
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
    <script src="/Js/main.js"></script>
</body>
</html>