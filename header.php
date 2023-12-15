<?php
	$menu = '
	<div class="logo">
	<img src="assets/img/logo.png" alt="">
 </div>
	
		<li><a href="index.php">Главная</a></li>
	
		<li><a href="catalog.php">Каталог</a></li>
		
		%s
	';

	$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="index2.php">Личный кабинет</a></li>';
		$m = '<li><a href="cart.php">Корзина</a></li>';
		
		
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php">Заказы</a></li>' : '';
		$m .= '<li><a href="controllers/logout.php"><button class="">Выход</button></a></li>';
	} else
		$m = '
			<li><a href="login.php"><button class="">Вход</button></a></li>
			<li><a href="register.php"><button class="">Регистрация</button></a></li>
		';

	$menu = sprintf($menu, $m);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<script src="scripts/filter.js"></script>
	<script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>
</head>
<body>

	<header>
		<div class="size">
		<div class="content">
			<ul>
				<?= $menu ?>
			</ul>
		</div>
	    </div>

<body>
		

	<div class="message"><?= (isset($_GET["message"])) ? $_GET["message"] : ""; ?></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="js/app.js"></script>