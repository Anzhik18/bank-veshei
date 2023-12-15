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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<script src=" scripts/filter.js"></script>
	<script>
		let role = "<?= (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest" ?>";
	</script>
</head>
<body>
 <!-- баннер -->
 <div class="contener">
              <!--ПЕРВЫЙ БЛОК-->
  <div class="shap">
   <div class="text_onas">
    <h1>Дарить на </h1>
    <h2> счастье</h2>
    <br><br>
    <p>Более 600 семей ежемесячно обращаются сюда. В Банке каждый может бесплатно оставить вещи для нуждающихся или бесплатно выбрать для себя необходимое.</p>
    <br><br>
    <br>
    <div class="tb1"><a href="#Onas">Подробнее</a></div>
    </div>
     <div class="img_onas">
        <img src="assets/img/Group 18.png" alt="">
  </div>
  </div>
  <div class="line">

  </div>
              <!--ВТОРОЙ БЛОК-->
    <div class="block2">
       <div class="img_block2">
        <img src="assets/img/2965738 1.png" alt="">
       </div>
       <div class="text_block2">
        <h1 id="Onas">О нас</h1>
        <p>Банк вещей "С миру по нитке" с 2014 года успешно функционирует в Стерлитамаке. 
            Более 600 семей ежемесячно обращаются сюда. В Банке каждый может БЕСПЛАТНО оставить вещи для нуждающихся или БЕСПЛАТНО выбрать для себя необходимое.Вещи выдаются БЕСПЛАТНО при наличии соответствующих льготных документов.
             Вещи в чистом и опрятном виде, пригодные для дальнейшего использования, упакованные в небольшие коробки или пакеты (обязательно завязанные!) можно оставить в специальном контейнере-накопителе.</p>
       </div>
 </div>       
  <!-- БЛОК УСЛУГ-->
 <div id="adres" class="section3">
          <div class="text_adres">
        <h1>Адреса контейнеров для <br> сбора вещей</h1>
        <p><span>ТК «Отрада»</span>(Стерлитамакский р-н, ул.Придорожная 70 А),</p>
        <p><span>ТЦ «Ёлка»</span>(г.Стерлитамак, ул.Худайбердина 65),</p>
        <p><span>ТЦ «Гермес»</span> (Стерлитамак, ул.Мира 2Б, ост.Колхозный рынок),</p>
        <p><span>ТЦ «Аструм»</span> (ул.Комсомольская, 5)</p>
        <p><span>ТЦ «КАРКАДАНН»</span>(ул. Коммунистическая 58А)</p>
       </div>
       <div class="img_adres">
        <img src="assets/img/298369-P7OMK0-72 1.png" alt="">
       </div>
    </div>



    
     <!----БЛОК кнопок------>
    <div id="grafik" class="but">
          <div class="but1">
             <div class="but1_2">
                <h1>График работы</h1>
             </div>
             <div class="but1_3">
             <p>Понедельник     </p>              
             <p>  Вторник       с 10.00 до 13.00</p>
             <p>  Среда</p>
             <p> Четверг        с 10.00 до 13.00</p>
             <p>  Пятница</p>
             <p>  Суббота</p>
             <p>  Воскресенье с 10.00 до 15.00</p>
             
             </div>
          </div>
          <div class="but1">
            <div class="but1_2">
               <h1>25 число месяца</h1>
            </div>
            <div class="but1_3">
            <p>25 число – особый день! 
            В этот день  человек без льгот и удостоверяющих документов может прийти выбрать вещи, которые ему необходимы, совершенно бесплатно!</p>
            
            </div>
         </div>
         <div class="but1">
            <div class="but1_2">
               <h1>Новогодние каникулы</h1>
            </div>
            <div class="but1_3">
            <p>С 29 декабря 2023г. по 8 января 2024г. наши волонтеры уходят на зимние каникулы. Успейте привезти вещи до 28 декабря!</p>
            
            </div>
         </div>
    </div>
 
 
    

 <!----ПОДВАЛ------>
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
        </div>
		<body>
		

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="js/app.js"></script>