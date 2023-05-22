<?php
session_start();


if(isset($_POST['auth'])){
	if(($_POST['login'] == 'admin') && ($_POST['password'] == 'password')){
		$_SESSION['admin'] = 1;
		$_SESSION['admin_login'] = 'admin';
	}
}
if(isset($_POST['add'])){
	require_once "../config.php";
	$sql = "insert into `tovar` 
				(`name_tovar`,`year_tovar`,`id_cat`,`id_disc`,`price`,`image`,`temp`) values
				('".$_POST['name']."', ".$_POST['year'].", ".$_POST['cat'].", '".$_POST['file']."', ".$_POST["price"].", '".$_POST['img']."', ".$_POST["temp"].")";
					$result = mysql_query($sql, $link);
					//mysql_close($link);
	echo "<p align='center'>Успешное добавление!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<style type="text/css">
		.container{
			width: 400px;
			margin: 20px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php if(isset($_SESSION['admin'])){ 
			?>
			<ul>
				<li><a><?= $_SESSION['admin_login']?></a></li>
				<li><a href="dd.php">Добавить в каталог</a></li>
				<li><a href="logout.php">Выйти</a></li>
			</ul>

			<form action="" method="post">
				<div>
					Название товара
				</div>
				<div>
					<input type="text" name="name" />
				</div>
				<div>
					Год
				</div>
				<div>
					<input type="text" name="year" />
				</div>
				<div>
					Категория
				</div>
				<div>
					<?php 
					require_once "../config.php";
					$sql = "select * from `categories`";
					$result = mysql_query($sql, $link);
					//mysql_close($link);
					echo "<select name='cat'>";
					while($row = mysql_fetch_assoc($result)){
						echo "<option value='".$row["id_cat"]."'>".$row["name_cat"]."</option>";
					}
					echo "</select>";
						?>
				</div>
				<div>
					Путь к файлу Файл
				</div>
				<div>
					<input type="text" name="file" />
				</div>
				<div>
					Цена
				</div>
				<div>
					<input type="number" name="price" />
				</div>
				<div>
					Картинка
				</div>
				<div>
					<input type="text" name="img" />
				</div>
				<div>
					Темп
				</div>
				<div>
					<input type="number" name="temp" />
				</div>
				<div>
					<input type="submit" name="add" value="Добавить">
				</div>
			</form>


			<?php
				
			 }else{?>
		<form action="" method="post">
			<div>
				<label>Логин:</label>
			</div>
			<div>
				<input type="text" name="login" required placeholder="Логин" />
			</div>
			<div>
				<label>Пароль:</label>
			</div>
			<div>
				<input type="password" name="password" required placeholder="Пароль" />
			</div>
			<div>
				<button type="submit" class="btn btn-info" name="auth">Войти</button>
			</div>
		</form>
	<?php } ?>
	</div>
</body>
</html>




