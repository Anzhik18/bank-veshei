<?php
	session_start();
	include "connect.php";
	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	$id = (isset($_GET["id"])) ? $_GET["id"] : 0;

	$sql = "SELECT * FROM `products` WHERE `count` > 0 AND `product_id`=". $id;
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	if(!$product = $result->fetch_assoc())
		return header("Location:index.php?message=Товар отсутствует");

	include "header.php";
?>

	<main>
		<div class="content">
		<div class="section__header">
		<div class="head" style="margin-bottom: 20px">О товаре</div>
            </div>
			<div class="head"></div>
			<div class="product wrap">
				<div class="image">
					<img src="<?= $product["path"] ?>" alt="">
				</div>
				<div class="text">
					
					<p>Название: <b><?= $product["name"] ?></b></p>
					<p>Описание: <b><?= $product["year"] ?></b></p>
					<p>Качество: <b><?= $product["model"] ?></b></p>
					<BR><BR><BR><BR>
				
					<?php
						if($role == "admin")
							echo '
								<div class="row">
									<p><a href="update.php?id='.$product["product_id"].'" class="text-small">Редактировать</a></p>
									<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$product["product_id"].'" class="text-small">Удалить</a></p>
								</div>
							';

						if($role != "guest")
							echo '<a href="controllers/add_cart.php?id='. $product["product_id"] .'" ><div class="pr"><button>Добавить</button></div></div>';
					?>
				</div>
			</div>

		</div>







		






	</main>
	

	<script src="scripts/slider.js"></script>
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
		<body>
		