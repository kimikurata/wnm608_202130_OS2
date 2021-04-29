<?php

function makeProductList($r,$o) {
return $r.<<<HTML
<div class="card col-xs-12 col-sm-6 col-md-4">
   <a href="class-work/product_item.php?id=$o->id" class="product">
      <div class="product-image">
         <img src="../kurata.kimi/images/$o->image_thumbnail" alt="">
      </div>
      <figcaption class="product-caption">
         <div class="product-price">&dollar;$o->price</div>
         <div class="product-title">$o->product_name</div>
      </figcaption>
   </a>
</div>
HTML;
}




function makeCartList($r,$o) {
return $r.<<<HTML
<div class="display-flex">
   <div class="flex-none image-thumbs">
      <img src="../kurata.kimi/images/$o->image_thumbnail">
   </div>
   <div class="flex-stretch">
      <strong>$o->product_name</strong>
      <div>Delete</div>
   </div>
   <div class="flex-none">
      &dollar;$o->price
   </div>
</div>
HTML;
}