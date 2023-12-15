<?php
	include "controllers/check.php";

	include "connect.php";

	$sql = sprintf("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s'", $_SESSION["user_id"]);
	$result = $connect->query($sql);

	$products = "";
	while($row = $result->fetch_assoc())
		$products .= sprintf('
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<h3><a href="product.php?id=%s">%s</a></h3>
					
				</div>
				<div class="row">
					<p><a href="controllers/delete_cart.php?id=%s">Убрать</a></p>
					<p id="c1">%s</p>
					<p><a href="controllers/add_cart.php?id=%s">Добавить</a></p>
				</div>
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["count"], $row["product_id"]);

	if($products == "")
		$products = '<h3 class="text-center">Корзина пуста</h3>';

	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC", $_SESSION["user_id"]);
	$result = $connect->query($sql);

	$orders = "";
	while($row = $result->fetch_assoc()) {
		$del = ($row["status"] == "Новый") ? '<p class="text-right"><a onclick="return confirm(\'Вы действительно хотите удалить этот заказ?\')" href="controllers/delete_order.php?id='.$row["order_id"].'" class="text-small">Удалить заказ</a></p>' : '';
		$orders .= sprintf('
			<div class="col">
				<div class="row">
					<h2>Заказ %s</h2>
					%s
				</div>
				<div class="row">
					<p>Статус: <b>%s</b></p>
					<p>Количество товаров: <b>%s</b></p>
				</div>
			</div>
		', $row["number"], $del, $row["status"], $row["count"]);
	}

	if($orders == "")
		$orders = '<h3 class="text-center">Список заказов пуст</h3>';

	include "header.php";
?>

	<main>
		<div class="content">

			<div class="head">Корзина</div>
			<div class="row">
				<?= $products ?>
			</div>
			<br>
			<div class="wrap">
				<form action="controllers/checkout.php" class="w100" method="POST">
					<input type="password" placeholder="Ваш пароль" name="password" required>
					<button class="search-button3">Оформить заказ</button>
				</form>
			</div>

			<div class="head">Заказы</div>
			<div class="row">
				<?= $orders ?>
			</div>

		</div>
	</main>

<!-- подвал сайта -->
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