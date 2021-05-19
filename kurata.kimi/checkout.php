<?
include "lib/php/functions.php";
include "parts/templates.php";

// pretty_dump(getCartItems());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Suculentina checkout</title>
	<?php include "parts/meta.php"?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-X6SWW7S9CJ"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-X6SWW7S9CJ');
	</script>

</head>
<body>
	<div class=" checkout_header ">
		<div class="container display-flex flex-align-center">
			<a class="text-white" href="javascript:window.history.back();" >Cancel</a>
		</div>
	</div>
	<div class="checkout_page_bg">
		<div class="container">	

			<form class="grid gap top-padding-md"  action="cart_confirmation.php">	
				<h2 class="text-center col-md-8 col-xs-12 navbar-spacer-sm" style=" width: 95%;">Checkout</h2>
				<div class="col-md-8 col-xs-12">
					<div class="form_card  top-margin-sm">
						<h3>1 Personal information</h3>
						<div class="grid gap-column">
							<div class="col-md-6 col-xs-12">
								<div class="form-control">
									<label for="firstname" class="form-label">Fist name</label>
									<input id="first-name" type="text" placeholder="John" class="form-input">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-control">
									<label for="lasttname" class="form-label">Last name</label>
									<input id="last-name" type="text" placeholder="Doe" class="form-input">
								</div>
							</div>
							<div class="col-md-12 col-xs-12 bottom-margin-sm">
								<div class="form-control flex-layout">
									<label for="useremail" class="form-label">Email</label>
									<input id="user-email" type="email" placeholder="john_doe@gmail.com" class="form-input">		
								</div>
							</div>
						</div>
					</div>
					<hr class="form_hr">
					<div class="form_card">
						<h3>2 Shipping Address</h3>
						<div class="grid gap-column">
							<div class="col-md-12 col-xs-12">
								<div class="form-control">
									<label for="street" class="form-label">Street</label>
									<input id="street" type="text" placeholder="560 Whiff Oaf Lane" class="form-input">
								</div>
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="form-control">
									<label for="apt" class="form-label">Apt, suite (optional)</label>
									<input id="apt" type="text" placeholder="Flr-3 Apt-m001" class="form-input">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-control">
									<label for="zipcode" class="form-label">Zip code</label>
									<input id="zipcode" type="text" placeholder="31324" class="form-input">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-control">
									<label for="city" class="form-label">City</label>
									<input id="city" type="text" placeholder="Your city" class="form-input">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-control ">
									<label for="country" class="form-label">Country</label>
									<div class="form-select">
										<select id="country" name="example6" required>
											<option value="" disabled selected>Select your option</option>
											<option value="Canada">Canada</option>
											<option value="Japan">Japan</option>
											<option value="Mexico">Mexico</option>
											<option value="United States">United States</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-12 bottom-margin-sm">
								<div class="form-control">
									<label for="state" class="form-label">State</label>
									<input id="state" type="text" placeholder="Richmond" class="form-input">
								</div>
							</div>
						</div>
					</div>

					<hr class="form_hr">
					<div class="form_card">
						<h3>3 Payment method</h3>
						<div class="grid gap-column">
							<div class="col-md-12 col-xs-12">
								<div class="form-control flex-layout">
									<label for="card-number" class="form-label">Card number</label>
									<input id="card-number" type="text" placeholder="0000-0000-0000-0000" class="form-input">		
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-control">
									<label for="exp-date" class="form-label">Expiration date</label>
									<input id="ex-date" type="month" placeholder="MM/YY" class="form-input">
								</div>
							</div>
							<div class="col-md-6 col-xs-12 bottom-margin-sm">
								<div class="form-control">
									<label for="ccv" class="form-label">CCV</label>
									<input id="ccv" type="password" placeholder="CCV" class="form-input">
								</div>
							</div>	
						</div>
					</div>
					<hr class="form_hr_last">
				</div>
				
				<div class=" col-md-4 col-xs-12 ">
					<?= checkoutTotalsTitle() ?>
					<div class="grid gap ">
						
						<?
						$cartitems= makeCartBadge();
						if($cartitems == '0'){
							echo "<p class='text-center top-padding-sm bottom-padding-sm col-md-12 col-xs-12' >No items in your cart</p>";
						}else{
				         	echo checkoutTotalsTumbs();
				        }
				        ?>

					</div>
					<?= checkoutTotals() ?>
					
					<div class="checkout_summary">
						<a href="cart.php"><p class="text-right text-xxs" >Eddit order</p></a>
					</div>

				</div>
            	<a   class="form-button highlighted bottom-margin-md col-md-8 col-xs-12"  href="cart_confirmation.php" >Pay now</a>
			</form>
		</div>
	</div>
	<div class="copy_right">
		&#169; 2021 | Kimi Kurata All rights reserved
	</div>

</body>
</html>