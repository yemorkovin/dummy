<?php
session_start();
if(isset($_POST['auth'])){
	if(($_POST['login'] == 'admin') && ($_POST['password'] == 'password')){
		$_SESSION['admin'] = 1;
		$_SESSION['admin_login'] = 'admin';
	}
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




