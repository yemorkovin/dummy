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
    <link rel="stylesheet" href="./css/basket.css">
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
									echo '<a href="account.php">'.$_SESSION["login"].'</a><br /><a href="logout.php" class="sign__back" >Выход</a>';
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
            <div class="cart">
			<div style="width: 900px; float: left">
                <h1 class="car_h2">Ваш заказ</h1>
					<?php 
					require_once "config.php";
					if(isset($_SESSION['id'])) $id_user = $_SESSION['id'];
					else $id_user = 0;
					
					$sql = "select `basket_tovar`.`id_bask`, `tovar`.`name_tovar`, `categories`.`name_cat`,`tovar`.`image`, (`tovar`.`price` * `basket_tovar`.`kolvo`) as price from `basket_tovar` 
										join `tovar` on `basket_tovar`.`id_tovar` = `tovar`.`id_tovar`
										join `categories` on `tovar`.`id_cat` = `categories`.`id_cat`
										where `basket_tovar`.`id_user` = $id_user
										
										group by `basket_tovar`.`id_tovar`,`basket_tovar`.`id_user`";
					$result = mysql_query($sql, $link);
					$summa = 0;
					mysql_close($link);

                    echo '<table style="width: 100%">';
					while($row = mysql_fetch_assoc($result)){
						$summa += $row["price"];
						?>
						
							<tr>
								<td width="50px">
									<img src="/img/card/<?= $row["image"]?>" width="50px" height="50px"/>
								</td>
								<td width="700px" valign="center">
									<?= $row["name_tovar"]?><br /><?= $row["name_cat"]?>
								</td>
								<td width="100px">
									<?php echo $row["price"]." ₽"; ?> 
								</td>
                                <td width="50px"><a href="action/delete.php?id=<?=$row["id_bask"]?>" style="text-decoration: none;">❌</a></td>
							</tr>
							
						
						<?php 
					}
					?>
                    </table>
                 </div>
                <form action="action/recvisit.php" method="post">
                    <div class="total">
    					<table width="100%" >
    						<tr>
    							<td align="left">
    								Итого 
    							</td>
    							<td align="right">
    								<?= $summa?>
                                    <input type="hidden" name="summa" value="<?= $summa?>">
    							</td>
    						</tr>
    						<tr>
    							<td colspan="2">
    								<?php 
    									if(isset($_SESSION["email"])){
    										echo "<input type='email' name='emial' value='".$_SESSION["email"]."' />";
    									}else{
    										echo "<input type='email' name='email' placeholder='Ваш email' /><br />";
    										echo "Введите свой email или <a href='login.php'>ввойдите в аккаунт</a>";
    									}
    								?>
    							</td>
    						</tr>
                            <tr>
                                <td colspan="2">
                                    <input class="pay_btn" type="submit" name="pay" value="Оплатить"><br />
                                   <h2> Нажимаю кнопку оплатить, я даю согласие на обработку персональных данных</h2>
                                </td>
                            </tr>
    					</table>
                    </div>
                </form>
            </div>

              <script>
                const cartItems = [];
              
                function addToCart(item) {
                  const cartItem = cartItems.find(cartItem => cartItem.name === item.name);
                  if (cartItem) {
                    cartItem.quantity++;
                  } else {
                    cartItems.push({ name: item.name, price: item.price, quantity: 1 });
                  }
                  updateCart();
                }
              
                function removeFromCart(item) {
                  const cartItem = cartItems.find(cartItem => cartItem.name === item.name);
                  if (cartItem) {
                    cartItem.quantity--;
                    if (cartItem.quantity === 0) {
                      cartItems.splice(cartItems.indexOf(cartItem), 1);
                    }
                    updateCart();
                  }
                }
              
                function updateCart() {
                  const cartList = document.getElementById('cart-items');
                  cartList.innerHTML = '';
                  let totalPrice = 0;
                  cartItems.forEach(cartItem => {
                    const li = document.createElement('li');
                    li.innerHTML = `<span>${cartItem.name}</span>
                                    <span>����: $${cartItem.price.toFixed(2)}</span>
                                    <span>����������: ${cartItem.quantity}</span>
                                    <button onclick="removeFromCart(${JSON.stringify(cartItem)})">�������</button>`;
                    cartList.appendChild(li);
                    totalPrice += cartItem.price * cartItem.quantity;
                  });
                  document.getElementById('total-price').textContent = `�����: $${totalPrice.toFixed(2)}`;
                }
              
                function checkout() {
                  // ���������� ���������� ������
                  console.log('����� ��������:', cartItems);
                }
              </script>
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