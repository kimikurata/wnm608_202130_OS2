<?php
	include "lib/php/functions.php";
	include "parts/templates.php";
// pretty_dump($_POST);

	$product = MYSQLIQuery("SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];
	$cart_product = cartItemById($product->id);

// pretty_dump($product);

	pretty_dump($product);

	// calculate discount

	$discount = $product->on_sale==1? (100 - $product->discount)/100:1; 
	$calculated_price = number_format((float)round($discount*$product->price, 2), 2, '.', '');

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Suculentina cart</title>
		<?php include "parts/meta.php"?>

	</head>
	<body>
		<?php include "parts/navbar.php" ?>

		<div class="container navbar-spacer">
			<h3 class="top-padding-lg bottom-padding-sm">The following items were added to the cart:</h3>	
			<div class="card ">

				<?php 

				if(!isset($_GET['id'])){
					echo "You dun goofed";
				} else {
					?>
					
					<div class="display-flex">
						<p>Image</p>
						<div class="flex-stretch"></div>
						<p>Name</p>
						<div class="flex-stretch"></div>
						<p>Amount</p>
						<div class="flex-stretch"></div>
						<p>Price</p>
					</div>
					<hr>
					<div class="display-flex flex-align-center">
						<div class="" style="width: 120px">
							<img class="image-contain" src="images/<?= $product->image_thumbnail ?>" alt="product item">
						</div>
						<div class="flex-stretch"></div>
						<p><?= $product->product_name ?></p>
						<div class="flex-stretch"></div>
						<p><?= $cart_product->amount ?></p>
						<div class="flex-stretch"></div>
						<p><?= $calculated_price ?></p>
					</div>
					
				</div>
				<?
				}
            	?>
			<div class="display-flex top-padding-sm">
               <div class="flex-none"><a class="form-button" href="javascript:window.history.back();">Back To Product</a></div>
               <div class="flex-stretch"></div>
               <div class="flex-none"><a class="form-button" href="product_list.php">Continue Shopping</a></div>
            </div>
            
		</div>

	</body>
</html>