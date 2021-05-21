<?php

include "../lib/php/functions.php";
include "../data/api.php";


// pretty_dump($_SERVER);
// pretty_dump([$_GET,$_POST]);

$products = makeStatement("products_admin_all");
$totalItems = count($products);


$productsOnSale = MYSQLIQuery("
      SELECT *
      FROM `products`
      WHERE `on_Sale` = '1'
   ");
$totalItemsOnSale = count($productsOnSale);


$productsLast = MYSQLIQuery("
      SELECT *
      FROM `products`
      ORDER BY `date_create` DESC
      Limit 3
   ");

// pretty_dump($products);
// pretty_dump($totalItems);
// pretty_dump($totalItemsOnSale);
// pretty_dump($productsLast );


$empty_object = (object) [
   // "id"=>'',
   "product_name"=>"Silver Jupiter",
   "category"=>"Echeveria",
   "image_main"=>"silver_jupiter_1.png",
   "image_thumbnail"=>"silver_jupiter_thu.png",
   "image_other"=>"silver_jupiter_2.png,silver_jupiter_3.png",
   "price"=>"12.88",
   "description"=>"Fleshy silver-blue rosette with pointed, upright leaves. They are closely related to sedums and echeveria.",
   "dimentions"=>"5in tall in a 5 x 5 x 5 planter",
   "planter_type"=>"Plastic",
   "plant_care"=>"Bright to indirect light",
   "watering"=>"Every 3 weeks",
   "on_sale"=>"1",
   "discount"=>"25"
];
// pretty_dump($empty_object);


switch(@$_GET['crud']) {
   case 'update':
      makeStatement("product_update");
      header("location:{$_SERVER['PHP_SELF']}?id=".$_GET['id']);
      break;
   case 'create':
      $result = makeStatement("product_insert");
      header("location:{$_SERVER['PHP_SELF']}?id=".$result->insert_id);
      break;
   case 'delete':
      makeStatement("product_delete");
      header("location:{$_SERVER['PHP_SELF']}");
      break;
}


function productListItem($r, $product) {
   $onsale_class = $product->on_sale==1?'onsale-admin':'';
return $r.<<<HTML
<div>
   <div class="display-flex flex-align-center flex-wrap" >

      <div class="$onsale_class" style="width: 150px">
         <img class="image-contain img96x96 " src="images/$product->image_thumbnail">
      </div>
      <div class="admin-item-list-name ">$product->product_name</div>
      <div class="flex-stretch"></div>
      <div><a class="form-button outlined" style="width: 80px; display: block; margin-right: 1em" href="product_item.php?id=$product->id" target="_blank">Visit</a></div>
      <div><a class="form-button highlighted" style="width: 80px;" href="{$_SERVER['PHP_SELF']}?id=$product->id">EDIT</a></div>
      
   </div>
   <hr style="border-top: 1px solid var(--color-disable-light);">
</div>
HTML;
}

function recentItemsThumbs($r, $o) {
return $r.<<<HTML
<div class="">
   <img class="image-contain img64x64" src="images/$o->image_thumbnail">
</div>
HTML;
}


function showProductPage($product) {

$id = $_GET['id'];
$thumbs = explode(",", $product->image_other);
$thumb_elements = array_reduce($thumbs,function($r,$o){
   return $r."<img class='img120x120' src='images/$o'>";
});
$addoredit = $id=="new" ? 'Add' : 'Edit';
$createorupdate = $id=="new" ? 'create' : 'update';
$showvisitlink = $id!="new" ? "<div><a href='product_item.php?id=$id' class='form-button'>Visit</a></div>" : "";
$showdeletelink = $id!="new" ? "<div><a href='product_item.php?id=$id' class='form-button'>Visit</a></div>" : "";


$onsale = $product->on_sale ? "checked" : "";
// $onsale_class_price = $product->on_sale==1?'onsale-admin-mini':'';
$onsale_class_image = $product->on_sale==1?'onsale-admin2':'';



$onsale_class2 = $product->on_sale==1?'onsale2':'';
$discount = $product->on_sale==1? (100 - $product->discount)/100:1; 
$calculated_price = number_format((float)round($discount*$product->price, 2), 2, '.', '');
$onsale_price_hide = $product->on_sale==0? 'hidden':'';



echo <<<HTML

<div class="grid gap ">  
   <form class="col-xs-12 col-md-6 col-lg-5 admin-edit-form-box" method="post" action="{$_SERVER['PHP_SELF']}?id=$id&crud=$createorupdate">
      <div class="form-admin-edit">
         <div class="admin-edit-top-nav pills display-flex flex-align-center">
            <a href="{$_SERVER['PHP_SELF']}"><img src="images/icon/left-arrow.svg" class="icon" style="font-size:1.5em; margin-right: 1em;"></a>
            <h2 calss="" style="color: var(--color-desable-light);">$addoredit Product form</h2>
         </div>
         <h3 class="top-padding-sm">1 General information</h3>
         <div class="grid gap ">
            <input type="hidden" name="id" value="$id">
            <div class="form-control col-md-6 col-xs-12 ">
               <label class="form-label" for="product-product_name">Product Name</label>
               <input class="form-input" type="text" id="product-product_name" name="product-product_name" value="$product->product_name">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-category">Category</label>
               <input class="form-input" type="text" id="product-category" name="product-category" value="$product->category">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-description">Description</label>
               <textarea class="form-input" id="product-description" name="product-description"  rows="4">$product->description</textarea>
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-planter_type">Planter Type</label>
               <input class="form-input" type="text" id="product-planter_type" name="product-planter_type" value="$product->planter_type">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-dimentions">Dimentions</label>
               <input class="form-input" type="text" id="product-dimentions" name="product-dimentions" value="$product->dimentions">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-plant_care">Plant Care</label>
               <input class="form-input" type="text" id="product-plant_care" name="product-plant_care" value="$product->plant_care">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-watering">Watering</label>
               <input class="form-input" type="text" id="product-watering" name="product-watering" value="$product->watering">
            </div>
            <h3 class="col-xs-12 top-padding-xs">2 Pricing</h3>
            <div class="form-control col-md-4 col-xs-12">
               <label class="form-label" for="product-price">Price</label>
               <input class="form-input" type="number" min="1" step=".01" id="product-price" name="product-price" value="$product->price">
            </div>
            <div class="form-control col-md-4 col-xs-12 place_center">
               <label class="form-label text-center" for="product-on_sale">On Sale</label>
               <div class="toggle">
                  <input class="hidden" type="checkbox" id="product-on_sale" name="product-on_sale" value="1" $onsale>
                  <label for="product-on_sale"></label>
               </div>
            </div>
            <div class="form-control col-md-4 col-xs-12">
               <label class="form-label" for="product-discount">Discount %</label>
               <input class="form-input" type="number" min="1" step="1" id="product-discount" name="product-discount" value="$product->discount">
            </div>
            <h3 class="col-xs-12 top-padding-xs">3 Product images</h3>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-image_main">Main image</label>
               <input class="form-input" type="text" id="product-image_main" name="product-image_main" value="$product->image_main">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-image_thumbnail">Image Thumbnail</label>
               <input class="form-input" type="text" id="product-image_thumbnail" name="product-image_thumbnail" value="$product->image_thumbnail">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-image_other">Other Images</label>
               <input class="form-input" type="text" id="product-image_other" name="product-image_other" value="$product->image_other">
            </div>            
            <div class="form-control col-xs-12">
               <input class="form-button" type="submit" value="Submit">
            </div>
         </div>
      </div>
   </form>

   <div class="col-xs-12 col-md-6 col-lg-6">
      
      <div class="top-padding-sm ">
         
            
         <div class="display-flex flex-align-center ">
            
            <h2 class="">$product->product_name</h2>
            <div class="flex-stretch" ></div>
            <div class="display-flex flex-align-center">
               <a href="{$_SERVER['PHP_SELF']}?id=$id&crud=delete"><img src="images/icon/trash-green.svg" class="icon" style="font-size:1.5em"></a>
               <div style="margin-left: 1em;">
                  $showvisitlink
               </div>
            </div>
         </div>
         <div class="responsive-boxes">

            <div class="admin-product-edit-general-info card flat">
               <div calss="">
                  <p class="text-bold ">Name</p>
                  <p>$product->product_name</p>
               </div>
               <div calss="">
                  <p class="text-bold ">Category</p>
                  <p>$product->category</p>
               </div>
               <div calss="">
                  <p class="text-bold ">Description</p>
                  <p>$product->description</p>
               </div>   
               <div calss="">
                  <p class="text-bold ">Planter type</p>
                  <p>$product->planter_type</p>
               </div>
               <div calss="">
                  <p class="text-bold ">Dimentions</p>
                  <p>$product->dimentions</p>
               </div>
               <div calss="">
                  <p class="text-bold ">Plant Care</p>
                  <p>$product->plant_care</p>
               </div>
               <div calss="">
                  <p class="text-bold ">Watering</p>
                  <p>$product->watering</p>
               </div>
            </div>
            <hr class="transparent-line" style="margin:0em 1em; margin-top: 1em;">
            <div>
               
               <div class="card flat flex-justify-center">
                  <p class="text-bold bottom-margin-sm">Price / Sale / Discount</p>
                  <div class="display-flex flex-align-center ">
                     <h4 class="">&dollar; $calculated_price </h4>
                     <h3 class="$onsale_price_hide ?> sale_price ">&dollar;  $product->price </h3>
                     <div class=" $onsale_price_hide  onsale2"> $product->discount  %</div>
                  </div>
                
               </div>
               <hr  class="transparent-line">
               <div class=" card flat">
                  <div class="">
                     <p class="text-bold">Image main</p>
                     <div class="image-thumbnail $onsale_class_image bottom-margin-sm">
                        <img class="img300x300" src="images/$product->image_main">
                     </div>
                  </div>
                  <div class="">
                     <div>
                        <p class="text-bold ">Image Thumb</p>
                        <div class="image-thumbnail display-flex flex-justify-center bottom-margin-sm" >
                           <img class="img120x120" src="images/$product->image_thumbnail">
                        </div>
                     </div>
                     <div>
                        <p class="text-bold ">Other Images</p>
                        <div class="image-thumbs display-flex flex-justify-centers">$thumb_elements</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>  




      </div>
   </div>
</div>
HTML;
}




?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Administrator</title>
   <?php include "../parts/meta.php" ?>
</head>
<body class="checkout_page_bg">
   <!-- NAVBARS  -->
   <header class="navbar admin-top-nav">
      <div class="container display-flex flex-align-center display-flex-wrap">
         <div class="flex-none flex-grow-1">
            <h1 class="brand-text">Product Admin</h1>
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex " style="margin:auto;">
            <ul>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
               <li><a href="product_list.php" target="_blank">Store</a></li>
            </ul>
         </nav>
      </div>
   </header>
   <div class="grid gap admin-side-nav">
      <div class="col-2">           
         <nav class="navbar side-var">
            <a class="brand-text" href="admin">Product Admin</a>
            <ul class="nav">
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li> 
               <li><a href="product_list.php" target="_blank">Store</a></li>

            </ul>
         </nav>
      </div>
   </div>
   <!-- NAVBAR END  -->


   <div class="side-var-spacer">
      <div class="" >

            <?php
            if(isset($_GET['id'])) {
               // ternary, conditional
               showProductPage(
                  $_GET['id']=="new" ?
                  $empty_object :
                  getItemById($products,$_GET['id'])
               );
            } else {
            ?>
      <div class="admin-summary" >
         <h2 class="bottom-padding-sm">ADMIN SUMMARY</h2>
         <div class="grid gap">
            <div class="card flat highlight col-xs-12 col-md-3 card-exception">
               <div class=" ">
                  <h3 class="text-center text-white">Total items in the store</h3>
                  <p class="text-center admin-gig-number"><?= $totalItems?></p>
               </div>
            </div>  
            <div class="card flat col-xs-12 col-md-3 card-exception">
               <div class="bottom-margin-sm">
                  <h3 class="text-center ">On sale items</h3>
                  <p class="text-center admin-gig-number"><?= $totalItemsOnSale?></p>
               </div>
            </div>
            <div class="card flat col-xs-12 col-md-3 card-exception">
               <div class="">
                  <h3 class="text-center">Sold out</h3>
                  <p class="text-center admin-gig-number">2</p>
               </div>
            </div>   
            <div class="card flat col-xs-12 col-md-3 card-exception" >
               <div class=" ">
                  <h3 class="text-center bottom-margin-xs">Recently added items</h3>
                  <div class="display-flex flex-justify-around">
                     <?php 
                     echo array_reduce($productsLast,'recentItemsThumbs');
                     ?>
                  </div>
               </div>
            </div>  
            <div class="card col-xs-12 col-md-9" >
               <div class="card-section"><h2>Product List</h2></div>
               <div class="admin-list">
                  <?php echo array_reduce($products,'productListItem'); ?>
               </div>
               <div class="display-flex " >
                  <div class="flex-stretch"></div>
                  <a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">
                     <div class="circle-sm">
                        <h2 class="text-highlight text-center">+</h2 class="text-highlight">
                     </div>
                  </a>
               </div>
            </div>
            <div class="card flat col-xs-12 col-md-3">
               <h3 class="text-center ">Admin activity history</h3>
               <p class="top-padding-xs">Today</p>
               <hr>
               <ul>
                  <li>Item [Solstice Premium LOVE] - "Name" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Categoty" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "On sale" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Description" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Price" - changed</li>
               </ul>
               <p class="top-padding-xs">05 / 18 /2021</p>
               <hr>
               <ul>
                  <li>Item [Solstice Premium LOVE] - "Name" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Categoty" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "On sale" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Description" - changed</li>
                  <li>Item [Solstice Premium LOVE] - "Price" - changed</li>
               </ul>
            </div>
               
         </div>   
      </div>
            <?php
            }
            ?>
      </div>
   </div>
</body>
</html>