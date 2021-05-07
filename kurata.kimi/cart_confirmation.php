<?
include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Suculentina cart confirmation</title>
	<?php include "parts/meta.php"?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-VQ67WZXEYG"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-VQ67WZXEYG');
	</script>
</head>
<body>
	<div class=" checkout_header ">
		<div class="container display-flex flex-align-center">
			<div class="flex-stretch"></div>
			<a class="text-white" href="product_list.php" >Continue</a>
		</div>
	</div>
	<div class="container">
		<div class="navbar-spacer-sm">
			<h1 class="top-padding-md bottom-padding-md">Your order has been placed</h1>
		</div>
		<div class="grid gap-column card hard justify-center">
			<div class="col-xs-12 col-md-8">
				<div class=" display-flex flex-align-center flex-justify-around display-flex-wrap bottom-margin-sm">	
					<?php
					$cartitems= makeCartBadge();
					if($cartitems == '0'){
						echo "<p class='text-center top-padding-md' >No items in your cart</p>";
					}else{
			         	echo cartConfirmationThumbs();
			        }
			        ?>


				</div>
					<!-- <div class="display-flex flex-align-center flex-justify-around ">
						<figure class="figure cart-list-image-box" href="styleguide/#figures">
							<div class="display-flex flex-justify-center ">
								<img class="image-contain cart-list-image" src="images/placeholder4.png" alt="" >
							</div>	
						</figure>
						<p class="text-body">Product name</p>
						<p class="">1</p>
						<p class="text-highlight">$00.00</p>
					</div>
					<hr class="list_separator"> -->
			</div>
			<div class=" col-xs-12 col-md-4 card flat order_confirmation_summary">

				<?= orderDetails() ?>

			</div>
			<div class="confirmation_secondary_btn_box display-flex flex-align-end">

				
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="continue_shop_btn_box">
					<a  href="product_list.php"><button class="generic-btn full-size checkout_btn">Continue shopping</button></a>
				</div>
				
			</div>
		</div>		
	</div>

	<div class="container">
		<h2 class="top-margin-lg bottom-margin-md">Check our sales</h2>
		<div class="grid gap medium vertical-stretch bottom-margin-lg">
	<? 

	$recommended = MYSQLIQuery("
	   SELECT *
	   FROM `products`
	   WHERE `on_Sale` = '1'
	   LIMIT 3
	");

	// pretty_dump($recommended);
	echo array_reduce($recommended,'makeRecommendedList');

	?>

		</div>
	</div>
	<div class="copy_right">
		&#169; 2021 | Kimi Kurata All rights reserved
	</div>
	<? resetCart(); ?>
</body>
</html>