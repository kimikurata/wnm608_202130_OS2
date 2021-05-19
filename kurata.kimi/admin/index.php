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
   "product_name"=>"",
   "category"=>"",
   "image_main"=>"",
   "image_thumbnail"=>"",
   "image_other"=>"",
   "price"=>"",
   "description"=>"",
   "dimentions"=>"",
   "planter_type"=>"",
   "plant_care"=>"",
   "watering"=>"",
   "on_sale"=>"",
   "discount"=>""
];



// switch(@$_GET['crud']) {
//    case 'update':
//       makeStatement("product_update");
//       header("location:{$_SERVER['PHP_SELF']}?id=".$_GET['id']);
//       break;
//    case 'create':
//       $result = makeStatement("product_insert");
//       header("location:{$_SERVER['PHP_SELF']}?id=".$result->insert_id);
//       break;
//    case 'delete':
//       makeStatement("product_delete");
//       header("location:{$_SERVER['PHP_SELF']}");
//       break;
// }


function productListItem($r, $product) {
return $r.<<<HTML
<div><a href="{$_SERVER['PHP_SELF']}?id=$product->id">$product->product_name</a></div>
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
   return $r."<img src='images/$o'>";
});
$addoredit = $id=="new" ? 'Add' : 'Edit';
$createorupdate = $id=="new" ? 'create' : 'update';

echo <<<HTML
<div class="grid gap">
   <div class="col-xs-12">
      <div class="card soft">
         <nav class="nav pills display-flex">
            <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}"><img src="images/icon/send.svg" class="icon" style="font-size:1.5em"></a></div>
            <div class="flex-stretch"></div>
            <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}?id=$id&crud=delete"><img src="images/icon/trash.svg" class="icon" style="font-size:1.5em"></a></div>
         </nav>
      </div>
   </div>
   
   <form class="col-xs-12 col-md-8" method="post" action="{$_SERVER['PHP_SELF']}?id=$id&crud=$createorupdate">
      <h2 calss="">$addoredit Product</h2>
      <div class="form_card">
         <h3>1 General information</h3>
         <div class="grid gap ">
            <input type="hidden" name="id" value="$id">
            <div class="form-control col-md-6 col-xs-12 ">
               <label class="form-label" for="product_name">Product Name</label>
               <input class="form-input" type="text" id="product-product_name" name="product_name" value="$product->product_name">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product_category">Category</label>
               <input class="form-input" type="text" id="product-category" name="product_category" value="$product->category">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-description">Description</label>
               <textarea class="form-input" id="product-description" name="product-description"  rows="7">$product->description</textarea>
            </div>

            <h3 class="col-xs-12">2 Pricing</h3>
            <div class="form-control col-md-4 col-xs-12">
               <label class="form-label" for="product-price">Price</label>
               <input class="form-input" type="number" min="1" step=".01" id="product-price" name="product-price" value="$product->price">
            </div>
            <div class="form-control col-md-4 col-xs-12">
               <label class="form-label" for="product-on_sale">On Sale</label>
               <input class="form-input" type="text" id="product-on_sale" name="product-on_sale" value="$product->on_sale">
            </div>
            <div class="form-control col-md-4 col-xs-12">
               <label class="form-label" for="product-discount">Discount %</label>
               <input class="form-input" type="number" min="1" step="1" id="product-discount" name="product-discount" value="$product->discount">
            </div>
            <h3 class="col-xs-12">3 Aditional information</h3>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product_planter_type">Planter Type</label>
               <input class="form-input" type="text" id="product-planter_type" name="product_planter_type" value="$product->planter_type">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product_dimentions">Dimentions</label>
               <input class="form-input" type="text" id="product-dimentions" name="product_dimentions" value="$product->dimentions">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product_planter_care">Plant Care</label>
               <input class="form-input" type="text" id="product-planter_care" name="product_planter_care" value="$product->plant_care">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-watering">Watering</label>
               <input class="form-input" type="text" id="product-watering" name="product-watering" value="$product->watering">
            </div>
            <h3 class="col-xs-12">4 Product images</h3>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-image_main">Main image</label>
               <input class="form-input" type="text" id="product-image_main" name="product-image_main" value="$product->image_main">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product-image_thumbnail">Image Thumbnail</label>
               <input class="form-input" type="text" id="product-image_thumbnail" name="product-image_thumbnail" value="$product->image_thumbnail">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-image_other">Image Other</label>
               <input class="form-input" type="text" id="product-image_other" name="product-image_other" value="$product->image_other">

            </div>
            
            
            
            
            <div class="form-control col-xs-12">
               <input class="form-button" type="submit" value="Submit">
            </div>
         </div>
      </div>
   </form>
   <div class="col-xs-12 col-md-4" >
      <div class="">
         <h2>$product->product_name</h2>
         <div>
            <strong>Price</strong>
            <div>&dollar;$product->price</div>
         </div>
         <div>
            <strong>Category</strong>
            <div>$product->category</div>
         </div>
         <div>
            <strong>Description</strong>
            <div>$product->description</div>
         </div>
         <div>
            <strong>Image Thumb</strong>
            <div class="image-thumbnail">
               <img src="images/$product->image_thumbnail">
            </div>
         </div>
         <div>
            <strong>Image Other</strong>
            <div class="image-thumbs">$thumb_elements</div>
         </div>
         <div>
            <strong>Watering</strong>
            <div>$product->watering</div>
         </div>
         <div>
            <a href="product_item.php?id=$product->id" class="form-button">Visit</a>
         </div>
      </div>
   </div>
</div>
HTML;
}





// function showProductPage($product) {
// return <<<HTML
// <div>$product->product_name</div>
// <div>&dollar;$product->price</div>
// HTML;
// }





?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Administrator</title>
   <?php include "../parts/meta.php" ?>
</head>
<body>
   <!-- NAVBARS  -->
   <header class="navbar admin-top-nav">
      <div class="container display-flex flex-align-center">
         <div class="flex-none">
            <h1 class="brand-text">Product Admin</h1>
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex">
            <ul>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
            </ul>
         </nav>
      </div>
   </header>
   <div class="grid gap admin-side-nav">
      <div class="col-2">           
         <nav class="navbar side-var">
            <a class="brand-text" href="#">Product Admin</a>
            <ul class="nav">
               <a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li> 
            </ul>
         </nav>
      </div>
   </div>
   <!-- NAVBAR END  -->


   <div style="padding:0 2em 0 2em; ">
      <div class="side-var-spacer">

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

         <div class="grid gap">
            <div class="col-xs-12 col-md-4">
               <div class="card flat highlight">
                  <h3 class="text-center text-white">Total items in the store</h3>
                  <p class="text-center admin-gig-number"><?= $totalItems?></p>
               </div>
            </div>  
            <div class="col-xs-12 col-md-4">
               <div class="card flat">
                  <h3 class="text-center">On sale items</h3>
                  <p class="text-center admin-gig-number"><?= $totalItemsOnSale?></p>
               </div>
            </div>   
            <div class="col-xs-12 col-md-4">
               <div class="card flat ">
                  <h3 class="text-center">Recently added items</h3>
                  <div class="display-flex flex-justify-around">
                     <?php 
                     echo array_reduce($productsLast,'recentItemsThumbs');
                     ?>
                  </div>

               </div>
            </div>  
            <div class="card col-xs-12">
               <div class="card-section"><h2>Product List</h2></div>
               
               <?php echo array_reduce($products,'productListItem'); ?>

               <div class="display-flex">
                  <div class="flex-stretch"></div>
                  <a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">
                     <div class="circle-sm">
                        <h2 class="text-highlight text-center">+</h2 class="text-highlight">
                     </div>
                  </a>
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