<?
include "lib/php/functions.php";
include "parts/templates.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Suculentina Home</title>
	<?php include "parts/meta.php"?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-QHBL80BTSN"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-QHBL80BTSN');
	</script>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   <div class="home-top-box navbar-spacer">
		<div class="container" style="width: 90%;">
			<h2 class="text-white home-top-title">Summer is here for you!</h2>	
			<div class="announce-box">
				<h1 class="text-center text-white giant-text">NEW</h1>
				<h1 class="text-center text-white" style="font-weight: 400;">Terrariums</h1>
			</div>
		</div>
		<div class="display-flex">
			<div class="flex-stretch"></div>
			<div class="top-more-link-box display-flex">
				<a class="more-link top-more-link text-white" href="#new">LEARN MORE &#8594;</a>
			</div>	
		</div>
	</div>
	<div id="new" class="new-arrivals" style="background-image: var(--color-gradient-medium);">
		<div class="grid container">
			<div class="col-md-6 col-xs-12 display-flex flex-justify-center " >
				<img  class="new-img top-margin-md" src="images/moon_terrarium_1.png" alt="image placeholder">
			</div>
			<div class="arrival-content-box col-md-6 col-xs-12">
				<h3 class="">New Arrivals</h3>
				<h2 class="top-margin-sm">Moon Terrarium</h2>
				<h4 class=" top-margin-xs">$ 00.00</h4>
				<a href="product_item.php?id=18"><button  class="arrival-btn generic-btn " type="button">Shop now</button></a>
			</div>
		</div>
		<div class="grid container">
			<div class="arrival-content-box left col-md-6 col-xs-12 layout-order2" >
				<h3 class="">New Arrivals</h3>
				<h2 class="top-margin-sm ">Moon Terrarium</h2>
				<h4 class="top-margin-xs ">$ 00.00</h4>
				<div class="display-flex">
					<div class="flex-stretch"></div>
					<a href="product_item.php?id=14" class="arrival-btn generic-btn " type="button">Shop now</a>
				</div>
			</div>
			<div class="col-md-6 col-xs-12 display-flex flex-justify-center " >
				<img  class="new-img top-margin-md" src="images/new-arrival2.png" alt="image placeholder">
			</div>	
		</div>
	</div>
	<div class="new-arrivals" style="background-color: var(--color-neutral-light);">
		<div class="grid container">
			<div class="col-md-6 col-xs-12 display-flex flex-justify-center" >
				<img  class="image-contain img300x300 top-margin-md" src="images/accessories.png" alt="image placeholder">
			</div>
			<div class=" col-md-6 col-xs-12">
				<h2 class="top-margin-lg text-center text-highlight-light">50% OFF</h2>
				<h2 class=" text-center">ACCESSORIES</h2>
				<h2 class=" text-center text-highlight-light">SALE</h2>
				<div class="display-flex">
					<div class="flex-stretch"></div>
					<a href="product_list.php?t=products_by_category&category=Accessory&d=DESC&o=date_create&l=12&s=" class="sale_btn generic-btn outline " type="button" >Shop now</a>
					<div class="flex-stretch"></div>
				</div>
			</div>		
		</div>
	</div>
	<? include "parts/best_seller.php"?>
	<div class="event-info-box">
			<div class="container" style="width: 90%;">
			<h1 class="text-white home-top-title text-center">COME AND CELEBRATE WITH US THE TREE DAY</h1>	
			<h2 class="text-white event-subtitle">Suculentina for a greener world</h2>	
			<div class="announce-box bottom-margin-md">
				<h2 class="text-center text-white" >MARCH</h2>
				<h1 class="text-center text-white giant-date">03</h1>
			</div>
			<div class="display-flex">
				<div class="flex-stretch"></div>
				<div class="bottom-padding-lg">
					<a class="generic-btn"  target="_blank" href="https://calendar.google.com/calendar/u/0/r/eventedit/Nm5vdWJsMXQ0MjBlNmFvZzc5M2YwMnVpOHYgbWFyaWtpbWkua3VyYXRhaGR6QG0?tab=rc">Save the date</a>
				</div>	
			</div>
		</div>
	</div>
   <?php include "parts/footer.php" ?>
</body>
</html>