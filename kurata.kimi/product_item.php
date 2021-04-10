<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Suculentina cart</title>
	<?php include "parts/meta.php"?>

</head>
<body>
	<?php include "parts/navbar.php"?>
	<div class="product-box">
		<div class="grid container">
			<div class="col-md-8 col-xs-12 display-flex flex-align-end " >
				<img  class="main-product-image image-contain"  src="images/moon_terrarium_1.png" alt="product image" >
			</div>
			<div class="col-md-4 col-xs-12 product-main-info-box card flat display-flex flex-justify-end" style="flex-direction: column;">
				<h2 class="top-margin-md">Moon Terrarium</h2>
				<h4 class="bottom-margin-lg">$ 00.00</h4>
				<p class="p-title bottom-margin-xs">Description</p>
				<p class="body-text text-highlight bottom-margin-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error voluptatem voluptas asperiores harum perferendis temporibus itaque.</p>
				<p class="p-title bottom-margin-sm">Quantity</p>
				
				<input class="form-input product-quantity-input bottom-margin-md" id="quantity" type="number" placeholder="1" min="1">
				<a href="cart.php"><button class="generic-btn full-size"  >Add to cart</button></a>
			</div>
			<figure class="figure col-lg-3 col-md-6 col-xs-12 secondary-product-a" href="styleguide/#figures">
				<div class="display-flex flex-justify-center ">
					<img class="image-cover img300x300" src="images/moon_terrarium_2.png" alt="" >
				</div>	
			</figure>
			<figure class="figure col-lg-3 col-md-6 col-xs-12 secondary-product-b" href="styleguide/#figures">
				<div class="display-flex flex-justify-center ">
					<img class="image-cover img300x300" src="images/moon_terrarium_3.png" alt="" >
				</div>	
			</figure>
		</div>
	</div>







	<div class="product-details-list-box">
		<div class="container">
			<h4 class="porduct-details-list-title top-padding-lg bottom-padding-xs">PRODUCT DETAILS</h4>
			<hr class="bottom-margin-sm top-margin-sm">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<p class="text-body text-white">Dimentions: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-12">
					<p class="text-body text-white">6” tall in a 5.25 x 5.25 x 5 planter </p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<p class="text-body text-white">Planter type: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-12">
					<p class="text-body text-white">Ceramic</p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<p class="text-body text-white">Plant care </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-12">
					<p class="text-body text-white">Bright to indirect light</p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="grid">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<p class="text-body text-white">Watering: </p>
				</div>
				<div class="col-lg-7 col-md-6 col-xs-12">
					<p class="text-body text-white">Every 1-2 weeks </p>
				</div>
			</div>
			<hr class="bottom-margin-sm top-margin-sm list-line">
			<div class="top-padding-lg"></div>
		</div>
	</div>





	

	<div class="container">
		<h2 class="top-margin-lg bottom-margin-md">Products you might also like</h2>
		<div class="grid gap medium vertical-stretch bottom-margin-lg">	
			<a class="product card hard col-lg-4 col-md-6 col-xs-12" href="styleguide/#figures">
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/placeholder1.png" alt="">
				</div>
				<h4 class="product-price text-highlight">$00.00</h4>
				<p class="product-name text-bold ">Lorem ipsum dolor</p>
			</a>
			<a class="product card hard col-lg-4 col-md-6 col-xs-12" href="styleguide/#figures">
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/placeholder2.png" alt="">
				</div>
				<h4 class="product-price text-highlight">$00.00</h4>
				<p class="product-name text-bold ">Lorem ipsum </p>
			</a>
			<a class="product card hard col-lg-4 col-md-6 col-xs-12" href="styleguide/#figures">
				<div class="display-flex flex-justify-center">
					<img class="image-cover " src="images/placeholder4.png" alt="">
				</div>
				<h4 class="product-price text-highlight">$00.00</h4>
				<p class="product-name text-bold ">Lorem ipsum dolor sit </p>
			</a>
		</div>	
	</div>



	<?php include "parts/footer.php"?>
	
</body>
</html>