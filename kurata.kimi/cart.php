<?php


include "lib/php/functions.php";
include "parts/templates.php";

$cart = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` IN (3,9,1)
");




?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Suculentina cart</title>
	<?php include "parts/meta.php"?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-BMJCHVRBZM"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-BMJCHVRBZM');
	</script>

</head>
<body>
	<?php include "parts/navbar.php"?>
	
	<div class="container navbar-spacer">
		<nav class="crumbs bottom-padding-md top-padding-xs">
			<ul>
		    	<li><a href="#" >Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="container">
		<div class="grid gap">
			<div class="products_in_list col-xs-12 col-md-8">
				<h1 class="bottom-padding-sm">Shopping cart</h1>
				<div class="cart_item_list_header grid">
					<p class="col-md-6">Product</p>
					<div class="col-md-6 display-flex flex-justify-around">
						<p>Quantity</p>
						
						<p>Price</p>
						<p>Remove</p>

					</div>
					
				</div>
				<hr>



				<?php

		         echo array_reduce($cart,'makeCartList');

		         ?>





			</div>


			<div class="col-xs-12 col-md-4  top-margin-sm">
				<div class="card flat order_summary">
					<h4 class="text-black text-weight-light">Order Summary</h4>
					<hr>
					<div class="display-flex top-margin-sm bottom-margin-sm">
						<p class="">Sun total</p>
						<div class="flex-stretch"></div>
						<p class="text-highlight">$00.00</p>
					</div>
					<hr>
					<div class="display-flex top-margin-sm bottom-margin-sm">
						<p class="">Tax</p>
						<div class="flex-stretch"></div>
						<p class="text-highlight">$00.00</p>
					</div>
					<hr>
					<div class="display-flex top-margin-md bottom-margin-sm">
						<p class="">TOTAL</p>
						<div class="flex-stretch"></div>
						<h4 class="text-highlight">$00.00</h4>
					</div>
				</div>
				<div class="checkout_btn_box  bottom-margin-lg">
					<a class="" href="checkout.php"><button class="full-size generic-btn checkout_btn">Checkout</button></a>
				</div>
			</div>
		</div>

	</div>


	<?php include "parts/footer.php"?>
	
</body>
</html>