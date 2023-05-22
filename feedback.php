<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/feetback-stily.css">
</head>
<body>
    <header class="header">
        <div class="wrapper">
            <div class="header__wrapper">
                <div class="header__logo">
                    <a href="/" class="header__logo-link">
                        <img src="./img/svg/dummy.svg" alt="Dummy" class="header__logo-pic">
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
									echo '<a  href="account.php">'.$_SESSION["login"].' </a><br /><a href="logout.php" class="sign__back" >Выход</a>';
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
            <div class="wrapper2">
                <h1 class="title">
                    <strong>Отзывы от наших клиентов</strong> 
                </h1>
                <h2 class="subtitle">
                    <br>Наша система устроена простым способом.Оставляй отзыв и попадай в ТОП наших лучших пользователей!</br>
                    <p>Каждый месяц результат меняется!</p>
                    
                </h2>
                <div id="content">
                    <p>Лучшие отзывы за последний месяц!</p>
                    <div class="container">
                        <div class="flipper">
                            <div class="front">
                                <img src="/img/feedback/2.jpg" alt="cherry blossoms">
                            <p class="caption">Марк</p>
                            </div>
                        <div class="back">
                            <a href="" class="GG" target="_blank">
                                <h1>Ростов Марк</h1>
                            </a>
                            <p class="date">23/02/2023</p>
                            <p class="description">На данный момент лучший магазин для покупки битов.Отличный сайт,удобный интерфейс.</p>
                        </div>
                      </div>
                    </div>
                  
                    <div class="container">
                      <div class="flipper">
                        <div class="front">
                          <img src="/img/feedback/4.jpg" alt="white daisy">
                          <p class="caption">Иван</p>
                        </div>
                        <div class="back">
                          <a href="" class="GG" target="_blank">
                            <h1>Иван Краснов</h1>
                          </a>
                          <p class="date">14/02/2023</p>
                          <p class="description">Коллеги посоветовали данного музыканта,постоянно берут биты на этом сайте.Отличная обратная связь.</p>
                        </div>
                      </div>
                    </div>
                  
                    <div class="container">
                      <div class="flipper">
                        <div class="front">
                          <img src="/img/feedback/3.jpg" alt="Red Purple and Yellow Tulip">
                          <p class="caption">Alex</p>
                        </div>
                        <div class="back">
                          <a href="" class="GG" target="_blank">
                            <h1>Alex Klopp</h1>
                          </a>
                          <p class="date">06/02/2023</p>
                          <p class="description">Множество жанров ,можно найти свою по стилю аранжировку! </p>
                        </div>
                      </div>
                    </div>
                </div>
                
                <fieldset class="search-form__wrap">
					<form action="action/rev.php" method="post">
                    <p class="search-form__info">
                        <input type="text" name="rev" class="search-form__field" placeholder="Написать отзыв">
                        <?php 
						if(isset($_SESSION["id"])) {
							if($_GET["suc"] == 1){
								echo '<button type="submit" class="search-form__submit" >Отправить</button>';
							}else{
								echo '<button type="submit" class="search-form__submit" >Отправить</button>';

							}
						
						}
							
						else echo "Чтобы оставить отзыв необходимо авторизироваться!";
						?>
						
                    </p>
					</form>
                </fieldset>
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