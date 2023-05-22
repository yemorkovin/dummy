<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dummy</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/stily.css">
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
                <div class="modeltop">
                    <div class= 'container'>
                        <div class="container_content">
                            <div class="container_content_inner">
                                <div class="title">
                                     <h1>6lack</h1>
                                </div>
                                <div class="par">
                                    <p>
                                    
                                        За несколько лет в музыкальной индустрии 6LACK сумел застолбить за собой статус одного из самых интересных представителей R&B, выделяющегося особым меланхоличным звучанием и проникновенным вокалом. После впечатляющего дебютного альбома «Free 6LACK» автор успел выпустить ещё один крупный опус под названием «East Atlanta Love Letter», продемонстрировавший его рост как личности и музыканта. Третьим этапом в карьере музыканта стал релиз «Since I Have A Lover».
                                    </p>
                                </div>
                                <div class="btns">
                                    <a href="https://vk.com/wall-45172096_2094206?z=audio_playlist-216973578_400%2Fd8e29b4e06f8591948" class="btns_more">Послушать</a>
                                </div>
                            </div>
                        </div>
                        <div class="container_outer_img">
                            <div class="img-inner">
                                <img src='.//img/card/6black.jpg'  alt="6black" class="container_img"/>
                            </div>
                        </div>
                    </div>
                        <div class="overlay"></div>



                        <div class="textforcard">
                            <h6>Последние релизы</h6>
                        </div>
                        

                        <div class="container">
                           
                            <div class="box">
                              <div class="imgBx">
                                <img src="./img/card/Tyler, the Creator.webp">
                              </div>
                              <div class="content">
                                <div>
                                  <h2>Tyler, the Creator</h2>
                                  <p>CALL ME IF YOU GET LOST: The Estate Sale</p>
                                </div>
                              </div>
                            </div>
                            <div class="box">
                              <div class="imgBx">
                                <img src="./img/card/Teleman.webp">
                              </div>
                              <div class="content">
                                <div>
                                  <h2>Teleman</h2>
                                  <p>Good Time/Hard Time</p>
                                </div>
                              </div>
                            </div>
                            <div class="box">
                              <div class="imgBx">
                                <img src="./img/card/Linkin Park.webp">
                              </div>
                              <div class="content">
                                <div>
                                  <h2>Linkin Park</h2>
                                  <p>Meteora 20th Anniversary Edition
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="box">
                              <div class="imgBx">
                                <img src="./img/card/Royal otis.webp">
                              </div>
                              <div class="content">
                                <div>
                                  <h2>Royal otis</h2>
                                  <p>sofa kings
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="player-wrapper">
                            <video id="video" src="./video/Adekunle Gold - Party No Dey Stop ft. Zinoleesky (Official Visualizer) (1).mp4" controls></video>
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