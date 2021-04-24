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

// CART LIST
function makeCartList($r,$o) {
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
			<form calss="">
				<input class="form-input" type="number" placeholder="1">
			</form>
		</div>
		<!-- <div class="flex-stretch"></div> -->
		<p class="text-highlight">$o->price</p>
		<!-- <div class="flex-stretch"></div> -->
		<div class="icon-form-container">
			<form method="post" style="margin-right: 1.5em" class="" action="" >
            	<input id="remove_cart_item" name="remove_cart_item" type="hidden" value="">   
               	<input   class="form-button_with-icon form-delete " type="submit" value="">
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