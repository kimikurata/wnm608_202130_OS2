<?
include "lib/php/functions.php";
include "parts/templates.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Suculentina About</title>

	<?php include "parts/meta.php" ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-EFHCE9BLEG"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-EFHCE9BLEG');
	</script>
</head>
<body>
	<?php include "parts/navbar.php" ?>
	<div class="about-info-box navbar-spacer">
		<div class="container">
			<img class="about-logo top-padding-lg" src="images/suculentina_logo.svg" alt="" >
			<h2 class="text-white top-padding-sm">Sucuentina the epscialist <br>in green decoration </h2>
		</div>
	</div>
	<div class="top-padding-lg bottom-padding-lg" style="background-color: var(--color-neutral-light);">
		<div class="container">
			<div class="grid gap">
				<div class="col-lg-3 col-xs-12">
					<h2 class="text-highlight bottom-padding-md">ABOUT</h2>
				</div>
				<div class="col-lg-9 col-xs-12">
					<h3 class="text-body text-highlight">Suculentina is a online store dedicated to sell unique live succulent plants for your home decoration. Suculentina plants are carefully grown to look healthy and beautiful indoors or outdoors.</h3>
					<br>
					<h3 class="text-body text-highlight">Our primary mission is to bring the natural green color to your home and create a cozy and warm environment for a better lifestyle. Plans have the power to improve the visual view in your home and provide a more relaxing space.</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h2 class="top-padding-md bottom-padding-md">Our experience</h2>
		<div class="grid gap bottom-margin-md">
			<div class="col-lg-9 col-xs-12 vertical-figure layout-order2" style="padding: 30px;">
				<h3 class="text-body">We are an experienced biologist and psychologist team master in the impact of green spaces. During the last two years we have been able to create relaxing spaces to more than 2500 homes.</h3>
			</div>
			<div class="card hard col-lg-3 col-xs-12 vertical-figure " >
				<h3 class="text-center text-highlight bottom-padding-ms top-margin-sm">Celebrating</h3>
				<h1 class="text-center text-highlight giant-date">2</h1>
				<h2 class="text-center text-highlight ">YEARS</h2>
			</div>
		</div>
		<div class="grid gap medium bottom-margin-md">	
			<div class="card vertical-stretch flat col-lg-4 col-md-6 col-xs-12" >
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/best_seller_3.png" alt="">
				</div>
				<h3 class="bottom-margin-sm">We plant with hope</h3>
				<p class="text-body ">We plant each succulent hoping to bring calmness to the future destination. </p>
			</div>
			<div class="card vertical-stretch flat highlight col-lg-4 col-md-6 col-xs-12" >
				<h3 class="bottom-margin-sm text-white">Care with love</h3>
				<p class="text-body ">Our plants grow beautiful, strong and, fast because we take care of them with peace and love.</p>
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/best_seller_1.png" alt="">
				</div>	
			</div>	
			<div class="card vertical-stretch flat col-lg-4 col-md-6 col-xs-12" >
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/best_seller_2.png" alt="">
				</div>
				<h3 class="bottom-margin-sm">Ship for our mission </h3>
				<p class="text-body ">Having a green spot where to look at every space in your house is as important as having light and fresh air.</p>
			</div>		
		</div>
	</div>
	<div class="testimony bottom-padding-md" style="background-color: var(--color-highlight);">
		<div class="container">
			<h2 class="text-white text-center top-padding-md bottom-padding-md">Our Clinet Says</h2>
			<div class="display-flex flex-justify-center bottom-padding-sm">
					<h3 class="client-review-text text-white text-center" style="max-width: 70%;">Thank you Suculentina! Now my home look amazingly beautiful and peaceful.</h3>
			</div>
			<div class="display-flex flex-align-center" >
				<img class="circle-md image-contain img96x96" src="images/profile.jpg" style="margin:auto;" alt="user profile">
			</div>
			<p class="text-center text-white top-padding-xs">Margarita</p>
		</div>
	</div>
	<?php include "parts/footer.php" ?>
</body>
</html>
