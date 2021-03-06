<?php

include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";
 
$product = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` = {$_GET['id']}
")[0];

$onsale_class2 = $product->on_sale==1?'onsale2':'';
$discount = $product->on_sale==1? (100 - $product->discount)/100:1; 
$calculated_price = number_format((float)round($discount*$product->price, 2), 2, '.', '');
$onsale_price_hide = $product->on_sale==0? 'hidden':'';


$thumbs = explode(",", $product->image_other);
$thumb1 = $thumbs[0];
$thumb2 = $thumbs[1];

// $thumb_elements = array_reduce($thumbs,function($r,$o){
//    return $r."<img src='/images/store/$o'>";
// });

// echo $_SESSION['num'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Suculentina cart</title>
	<?php include "parts/meta.php"?>
</head>
<body>
	<?php include "parts/navbar.php" ?>
	<div class="product-box ">
		<div class="grid container">
			<div class="col-md-8 col-xs-12 display-flex flex-align-end top-margin-lg" >
				<img  class=" main-product-image image-contain"  src="images/<?=$product->image_main ?>" alt="product image" >
			</div>
			<form class="sticky-div-top col-md-4 col-xs-12 product-main-info-box card flat display-flex flex-justify-end" style="flex-direction: column;" action="product_actions.php?crud=add-to-cart" method="post">
				<input type="hidden" name="id" value="<?= $product->id ?>">
				<h2 class="top-margin-md "><?= $product->product_name ?></h2>
				<div class="display-flex flex-align-center bottom-margin-lg">
					<h4 class="">&dollar;<?= $calculated_price ?></h4>
					<h3 class="<?= $onsale_price_hide ?> sale_price ">&dollar;<?= $product->price ?></h3>
					<div class="<?= $onsale_price_hide ?> onsale2"><?= $product->discount ?> %</div>
				</div>
				<p class="p-title bottom-margin-xs">Description</p>
				<p class="body-text text-highlight bottom-margin-sm"><?= $product->description ?></p>
				<p class="p-title bottom-margin-sm">Quantity</p>
				<!-- <input class="form-input product-quantity-input bottom-margin-md" name="amount" id="amount" type="number" placeholder="1" min="1"> -->
				<div class="form-select product-quantity-input bottom-margin-md">
					<select  name="amount" id="amount" type="number">
						
						<option selected value="1">1 </option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</div>
				<button class="generic-btn full-size" type="submit" >Add to cart</button>
			</form>
			<figure class="figure col-lg-3 col-md-6 col-xs-12 secondary-product-a" href="styleguide/#figures">
				<div class="display-flex flex-justify-center ">
					<img class="image-cover img300x300" src="images/<? echo $thumb1 ?>" alt="" >
				</div>	
			</figure>
			<figure class="figure col-lg-3 col-md-6 col-xs-12 secondary-product-b" href="styleguide/#figures">
				<div class="display-flex flex-justify-center ">
					<img class="image-cover img300x300" src="images/<? echo $thumb2 ?>" alt="" >
				</div>	
			</figure>
		</div>
	</div>


	<div class="product-details-list-box sticky-div">
		<div class="container">
			<h4 class="porduct-details-list-title top-padding-lg bottom-padding-xs">PRODUCT DETAILS</h4>
			<hr class="bottom-margin-sm top-margin-sm">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-6">
					<p class="text-body text-white">Dimentions: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-6">
					<p class="text-body text-white"><?= $product->dimentions ?></p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-6">
					<p class="text-body text-white">Planter type: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-6">
					<p class="text-body text-white"><?= $product->planter_type ?></p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-6">
					<p class="text-body text-white">Plant care: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-6">
					<p class="text-body text-white"><?= $product->plant_care ?></p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-6">
					<p class="text-body text-white">Watering: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-6">
					<p class="text-body text-white"><?= $product->watering ?></p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="top-padding-lg"></div>
		</div>
	</div>
	<div class="container">
		<h2 class="top-margin-lg bottom-margin-lg">Products you might also like</h2>
		<div class="grid gap medium vertical-stretch bottom-margin-lg">
		<? 
		$recommended = MYSQLIQuery("
		   SELECT *
		   FROM `products`
		   WHERE `category` = '$product->category'
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