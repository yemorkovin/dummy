<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/katalog-stily.css">
    <meta name = "keywords" content = "HTML, Javascript, CSS, Codeer, 100DayOfCode." />
    <meta name = "description" content = "Music Player built with Vanilla Javascript." />
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
            
                
            <div class="topcard">
                <div class="Textfortop">
                    <h2>Лучшие подборки битов</h2>
                </div>
                <div class="par">
                            <br><span>"Получайте бесплатные обновления и новые релизы"</span></br>
                            <br><span>"Простой и быстрый процесс покупки"</span></br>
                            <br><span>"Получите все права на использование"</span></br>
                </div>
                <div class="imagefortop">
                    <img src="./img/matthew-moloney-5kYKzH5Gwgk-unsplash.jpg" alt="fortop" class="image21">
                </div>
               
            </div>

            <div class="leftcard">
                <img src="./img/LeftContent/1.jpg" alt="img"  class="leftimg">
                <img src="./img/LeftContent/2.jpg" alt="img"  class="leftimg2">
                <img src="./img/LeftContent/3.jpg" alt="img"  class="leftimg3">
            </div>

                    
            <div class="model">
                    <h6 align="center">Последние релизы</h6><br />

					<?php 
					require_once "config.php";
					$sql = "select `tovar`.`id_tovar`, `tovar`.`name_tovar`, `categories`.`name_cat`, `tovar`.`image`, `tovar`.`id_disc`, `tovar`.`temp` from `tovar` join `categories` on `categories`.`id_cat` = `tovar`.`id_cat`";
					$result = mysql_query($sql, $link);
					mysql_close($link);
					while($row = mysql_fetch_assoc($result)){
					?>
					
                        <div class="conteinCat">
                            <div class="wrapper2">
                                <div class="banner-image" style="background-image: url(/img/card/<?= $row["image"]?>);"> 
                                    
                                </div>
                                <h1><?= $row['name_tovar']?></h1>
                                <p>Жанр:<?= $row["name_cat"]?> <?= $row["temp"]?>BPM</p>
                            </div>
                            <div class="button-wrapper"> 
                                <div class="audio-container">
                                    <audio src="./audio/<?= $row["id_disc"]?>"></audio>
                                    <button class="btn-outline">Play</button>
                                </div>
								<form action="action/add_basket.php" method="post" >
									<input type="hidden" name="id" value="<?= $row["id_tovar"]?>" />
									<button class="btn-fill">Купить</button>
								</form>
                                    
                            </div>
                        </div>
						
						<?php 
					}
						?>
                        <script src="./Js/card.js"></script>
            </div>


            
            <div class="bottommodel">
                
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
    <script src="/Js/top.js"></script>
    <script src="/Js/main.js"></script>
    
</body>
</html>