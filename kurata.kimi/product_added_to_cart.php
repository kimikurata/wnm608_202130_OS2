<?php
	include "lib/php/functions.php";
	include "parts/templates.php";
	include "data/api.php";
// pretty_dump($_POST);
	$product = MYSQLIQuery("SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];
	$cart_product = cartItemById($product->id);
// pretty_dump($product);
// pretty_dump($cart);
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
			<h3 class="top-padding-md bottom-padding-sm">The following items were added to the cart:</h3>
			<div class="card ">
				<?php 

				if(!isset($_GET['id'])){
					echo "You dun goofed";
				} else {
				?>
					<div class="grid gap added_list_header">
						<p class="col-xs-12 col-md-4">Image</p>
						<p class="col-xs-12 col-md-3">Name</p>
						<p class="col-xs-12 col-md-3 text-center">Amount</p>
						<p class="col-xs-12 col-md-1">Price</p>
					</div>
					<hr class="cart_item_list_header">
					<div class="grid gap justify-center">
						<div class="col-xs-12 col-md-4 added-list-image" style="">
							<img class="image-contain" src="images/<?= $product->image_thumbnail ?>" alt="product item">
						</div>
						<!-- <div class="flex-stretch"></div> -->
						<p style="justify-self: center;" class="col-xs-12 col-md-3" ><?= $product->product_name ?></p>
						<!-- <div class="flex-stretch"></div> -->
						<p style="justify-self: center;" class="col-xs-6 col-md-3  text-center">x<?= $cart_product->amount ?></p>
						<!-- <div class="flex-stretch"></div> -->
						<p style="justify-self: center;" class="col-xs-6 col-md-1" >&dollar;<?= $calculated_price ?></p>
					</div>
				</div>
				<?
				}
            	?>
			<div class="grid gap" >
				<div class="col-xs-12 col-md-3"></div>
               <a class="col-xs-12 col-md-3 generic-btn outline "  href="javascript:window.history.back();">Back To Product</a>
               <a class="col-xs-12 col-md-3 generic-btn outline"  href="product_list.php">Continue Shopping</a>
               <a class="col-xs-12 col-md-3 generic-btn" href="cart.php">Checkout Now</a>
            </div>
		</div>
		<div class="container">
			<h2 class="top-margin-lg bottom-margin-md">Similar products to "<?= $product->product_name?>"</h2>
			<div class="grid gap medium vertical-stretch bottom-margin-lg">

			<? 
			$Itemcategory = $product->category;
			// pretty_dump($Itemcategory);
			$recommended = MYSQLIQuery("
			   SELECT *
			   FROM `products`
			   WHERE `category` = '$Itemcategory'
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