<?php

function makeProductList($r,$o) {
$onsale_class = $o->on_sale==1?'onsale':'';
$discount = $o->on_sale==1? (100 - $o->discount)/100:1; 
$calculated_price = number_format((float)round($discount*$o->price, 2), 2, '.', '');
$onsale_procie_hide = $o->on_sale==0?'hidden':'';

return $r.<<<HTML

<a class="$onsale_class product card hard col-lg-4 col-md-6 col-xs-12 " href="product_item.php?id=$o->id">
	<div class="display-flex flex-justify-center ">
		<img class="image-cover " src="images/$o->image_thumbnail" alt="">
	</div>
	<div class="display-flex flex-align-center">
		<h4 class="product-price text-highlight ">&dollar;$calculated_price</h4>
		<h3 class="$onsale_procie_hide sale_price ">&dollar;$o->price</h3>
	</div>
	<p class="product-name text-bold ">$o->product_name</p>
</a>


HTML;

};

function selectAmount($amount=1, $total=10 ){
	$output = "<select name='amount'>";
	for($i=1;$i<$total;$i++){
		$output .= "<option ".($i==$amount?'selected':'')." >$i</option>";
	}
	$output .= "</select>";
	return $output;  
}




// CART LIST
function makeCartList($r,$o) {
$totalfixted = number_format($o->total,2,'.','');	
$amountselect = selectAmount($o->amount,10);



return $r.<<<HTML
<div class="item_in_list grid">
	<div class="display-flex flex-align-center col-xs-12 col-md-6">
		<figure class="figure cart-list-image-box" href="styleguide/#figures">
			<div class="display-flex flex-justify-center ">
				<img class="image-contain cart-list-image" src="images/$o->image_thumbnail" alt="" >
			</div>	
		</figure>
		<p class="text-body">$o->product_name</p>
	</div>
	<div class="display-flex flex-align-center flex-justify-around col-xs-12 col-md-6" style="">
		<div class="cart_item_quantity">
			<form action="product_actions.php?crud=update-cart-item" method="post" onchange="this.submit()">
				<input type="hidden" name="id" value="$o->id">
				<div class="form-select">
					$amountselect
				</div>
			</form>
		</div>
		<!-- <div class="flex-stretch"></div> -->
		<p class="text-highlight">&dollar;$totalfixted</p>
		<!-- <div class="flex-stretch"></div> -->
		<div class="icon-form-container">
			<form method="post" style="margin-right: 1.5em" class="" action="product_actions.php?crud=delete-cart-item" >
            	<input name="id" type="hidden" value="$o->id">   
               	<input name=""  class="form-button_with-icon form-delete " type="submit" value="">
            </form>
        </div>
    </div>
</div>
<hr class="list_separator">
HTML;
}




// RECOMMENDED ITEMS

function makeRecommendedList($r,$o) {


$onsale_class = $o->on_sale==1?'onsale':'';
$discount = $o->on_sale==1? (100 - $o->discount)/100:1; 
$calculated_price = number_format((float)round($discount*$o->price, 2), 2, '.', '');
$onsale_procie_hide = $o->on_sale==0?'hidden':'';

return $r.<<<HTML

<a class="$onsale_class product card hard col-lg-4 col-md-6 col-xs-12 " href="product_item.php?id=$o->id">
	<div class="display-flex flex-justify-center ">
		<img class="image-cover " src="images/$o->image_thumbnail" alt="">
	</div>
	<div class="display-flex flex-align-center">
		<h4 class="product-price text-highlight ">&dollar;$calculated_price</h4>
		<h3 class="$onsale_procie_hide sale_price ">&dollar;$o->price</h3>
	</div>
	<p class="product-name text-bold ">$o->product_name</p>
</a>

HTML;
}



function cartTotals() {
$cart = getCartItems();

$cartprice = array_reduce($cart,function($r,$o){return $r+$o->total;},0);

$pricefixed = number_format($cartprice,2,".","");
$tax = number_format($cartprice*0.0275,2,".","");
$taxed = number_format($cartprice*1.0275,2,".","");

return <<<HTML
<div class="card flat order_summary">
	<h4 class="text-black text-weight-light">Order Summary</h4>
	<hr>
	<div class="display-flex top-margin-sm bottom-margin-sm">
		<p class="">Sub total</p>
		<div class="flex-stretch"></div>
		<p class="text-highlight">&dollar;$pricefixed</p>
	</div>
	<hr>
	<div class="display-flex top-margin-sm bottom-margin-sm">
		<p class="">Tax</p>
		<div class="flex-stretch"></div>
		<p class="text-highlight">&dollar;$tax</p>
	</div>
	<hr>
	<div class="display-flex top-margin-md bottom-margin-sm">
		<p class="">TOTAL</p>
		<div class="flex-stretch"></div>
		<h4 class="text-highlight">&dollar;$taxed</h4>
	</div>
</div>

HTML;
}

function checkoutTotals() {
$cart = getCartItems();

$cartprice = array_reduce($cart,function($r,$o){return $r+$o->total;},0);

$pricefixed = number_format($cartprice,2,".","");
$tax = number_format($cartprice*0.0275,2,".","");
$taxed = number_format($cartprice*1.0275,2,".","");


$checkoutimages = implode(",",array_map(function($o){return $o->image_thumbnail;},$cart));

pretty_dump($checkoutimages);

return <<<HTML
<div class="checkout_summary">
						<h3 class="top-margin-sm text-weight-light text-black">Order summary</h3>
						<hr class="top-margin-xs bottom-margin-sm">
						<p class="bottom-margin-sm">Items: #</p>
						<div class="grid gap ">
							<div class=" col-xs-6 place_center">
								<img class="image-contain img64x64" src="images/placeholder4.png" alt="" >
							</div>
							<div class=" col-xs-6 place_center">
								<img class="image-contain img64x64" src="images/placeholder4.png" alt="" >
							</div>
							<div class=" col-xs-6 place_center">
								<img class="image-contain img64x64" src="images/placeholder4.png" alt="" >
							</div>	
						</div>
						<hr class="top-margin-sm bottom-margin-sm">
						<div class="display-flex flex-align-center ">
							<p class="">Sub total</p>
							<div class="flex-stretch"></div>
							<h4 class="">$00.00</h4>
						</div>
						<hr class="top-margin-sm bottom-margin-sm">
						<div class="display-flex flex-align-center ">
							<p class="">Tax</p>
							<div class="flex-stretch"></div>
							<h4 class="">$00.00</h4>
						</div>
						<hr class="top-margin-sm bottom-margin-sm">
					</div>
					<div class="card  flat display-flex flex-align-center">
						<h3 class="text-black">TOTAL</h3>
						<div class="flex-stretch"></div>
						<h3 class="">$00.00</h3>
					</div>

HTML;
}