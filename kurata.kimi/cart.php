<?php


include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";


// $cart = MYSQLIQuery("
//    SELECT *
//    FROM `products`
//    WHERE `id` IN (3,9,1)
// ");


// resetCart();
// pretty_dump(getCart());

$cart = getCartItems();


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
	
	
	<div class="container bottom-padding-sm">
		<div class="grid gap top-padding-lg">
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
				if(!count($cart)){
					echo "<p class='text-center empty-cart top-padding-lg' >No items in your cart</p>";
				}else{
		         	echo array_reduce($cart,'makeCartList');
		        }
		        ?>

			</div>


			<div class="col-xs-12 col-md-4  top-margin-sm">
				<?= cartTotals() ?>
				<div class="checkout_btn_box  bottom-margin-lg">
					<a class="" href="checkout.php"><button class="full-size generic-btn checkout_btn">Checkout</button></a>
				</div>
			</div>
		</div>

	</div>

	<div class="container">
		<h2 class=" bottom-margin-md">Products you might also like</h2>
		<div class="grid gap medium vertical-stretch bottom-margin-lg">

	<? 

	$recommended = MYSQLIQuery("
	   SELECT *
	   FROM `products`
	   WHERE `category` = 'Echeveria'
	   LIMIT 3
	");

	// pretty_dump($recommended);
	echo array_reduce($recommended,'makeRecommendedList');

	?>

		</div>
	</div>


	<?php include "parts/footer.php"?>
	
</body>
</html>