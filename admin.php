<?php
	include "controllers/check_admin.php";
	include "connect.php";

	

	$sql = "SELECT * FROM `orders` INNER JOIN `users` USING(`user_id`) ORDER BY `created_at` DESC";
	$result = $connect->query($sql);
	$orders = "";
	while($row = $result->fetch_assoc()) {
		$adv = ($row["status"] == "Новый") ? '
			<form action="controllers/confirm_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<button>Подтвердить заказ</button>
			</form>
			<h3 class="text-center">Отменить заказ</h3>
			<form action="controllers/cancel_order.php" class="w100" method="POST">
				<input type="hidden" value="'.$row["order_id"].'" name="id" />
				<textarea placeholder="Причина отмены" name="reason" required></textarea>
				<button style="margin:0">Отменить заказ</button>
			</form>
		' : '';
		$adv = ($row["status"] == "Отменённый") ? '
			<h3 class="text-center">Причина отмены:</h3>
			<p class="reason">'.$row["reason"].'</p>
		' : $adv;
		$orders .= sprintf('
			<div class="col text-left">
				<h2>Заказ %s</h2>
				<p>Заказчик: <b>%s %s %s</b></p>
				<p>Статус заказа: <b>%s</b></p>
				<p>Количество товаров: <b>%s</b></p>
				<input type="hidden" value="%s" name="order_id" />
				%s
				<p class="text-small text-right">%s</p>
			</div>
		', $row["number"], $row["name"], $row["surname"], $row["patronymic"], $row["status"], $row["count"], $row["order_id"], $adv, $row["created_at"]);
	}
	if(!$orders)
		$orders = '<h3 class="text-center">Заказы отсутствуют</h3>';

	include "header.php";
?>

	<main>
		<div class="content">
				

			<div class="head">Добавить товар</div>
			<form enctype="multipart/form-data" action="controllers/add_product.php" method="POST">
				<input type="text" placeholder="Название" name="name" required>
				<input type="text" placeholder="Описание" name="model" required>
				
				<p class="text-left">Фотография товара</p>
				<input type="file" name="image" required>
				<button>Добавить</button>
			</form>

			<div class="head" style="margin-bottom: 10px">Заказы</div>
			<p style="margin-bottom: 20px">
				<span onclick="filter.filter('all', 'admin')">Все</span> |
				<span onclick="filter.filter('Новый', 'admin')">Новые</span> |
				<span onclick="filter.filter('Подтверждённый', 'admin')">Подтверждённые</span> |
				<span onclick="filter.filter('Отменённый', 'admin')">Отменённые</span> 
			</p>
			<div class="row at" id="orders">
				<?= $orders ?>
			</div>
		</div>
	</main>

	<script>filter.orders()</script>
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