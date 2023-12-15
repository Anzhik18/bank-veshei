<?php
	session_start();
	include "connect.php";

	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="slide col">
				<img src="%s" alt="" />
				<h3><a href="product.php?id=%s">%s</a></h3>
			</div>
		', $row["path"], $row["product_id"], $row["name"]);

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';

	include "header.php";
?>

	<main>
<br>
			<div class="head" id="login">Вход</div>
			<form action="controllers/login.php" method="POST">
				<input type="text" placeholder="Логин" name="login" required>
				<input type="password" placeholder="Пароль" name="password" required>
				<input type="submit" value="Войти" class="search-button" name="search">
			</form>

		</div>
	</main>

	<br><br><br>
	<footer>
    <div id="kontakt" class="footer">
        <div class="main_foot">
             <div class="socials">
               <img src="assets/img/socials.png" alt="">
               <img src="assets/img/socials (1).png" alt="">
               <img src="assets/img/socials (2).png" alt="">
               <p>+7(964) 959-40-14</p>
             </div>
             <div class="foot_item">
               <a href="" id="Onas">О нас</a>
               <a href="" id="grafik">График</a>
               <a href="" id="adres">Адреса</a>
             </div>
         </div>
     </div>
</footer