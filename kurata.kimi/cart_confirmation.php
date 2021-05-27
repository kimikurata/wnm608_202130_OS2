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
	<?php include "parts/navbar.php" ?>
	<div class="container">
		<div class="navbar-spacer-sm">
			<?php
				$cartitems= makeCartBadge();
				if($cartitems == '0'){
					echo "<h1 class='top-padding-md bottom-padding-md'>Sorry..</h1>";
				}else{
		         	echo "<h1 class='top-padding-md bottom-padding-md'>Your order has been placed</h1>";
		        }
		    ?>
		</div>
		<div class="grid gap-column  justify-center bottom-padding-lg">
			<div class="card hard col-xs-12 col-md-8">
				<div class=" display-flex flex-align-center flex-justify-around display-flex-wrap bottom-margin-sm">	
					<?php
					$cartitems= makeCartBadge();
					if($cartitems == '0'){
						echo "<p class='text-center top-padding-md bottom-padding-sm' >No items in your cart</p>";
					}else{
			         	echo cartConfirmationThumbs();
			        }
			        ?>
				</div>
			</div>
			<div class=" col-xs-12 col-md-4 card flat order_confirmation_summary">
				<?= orderDetails() ?>
			</div>
			<div class="confirmation_secondary_btn_box display-flex flex-align-end"></div>
			<div class="col-xs-12 col-md-4">
				<div class="continue_shop_btn_box">
					<a  href="product_list.php"><button class="generic-btn full-size checkout_btn">Continue shopping</button></a>
				</div>	
			</div>
		</div>		
	</div>
	<div class="event-info-box2">
		<div class="container" style="width: 90%;">
			<h1 class="text-white home-top-title text-center">COME AND CELEBRATE THE TREE DAY</h1>	
			<h2 class="text-white event-subtitle bottom-padding-md">Suculentina for a greener world</h2>
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
	<?php include "parts/footer.php" ?>
	<? resetCart(); ?>
</body>
</html>