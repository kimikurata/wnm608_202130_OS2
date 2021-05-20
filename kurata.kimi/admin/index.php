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



switch(@$_GET['crud']) {
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
}


function productListItem($r, $product) {
return $r.<<<HTML
<div>
   <div class="display-flex flex-align-center" >
      <div class=""><img class="image-contain img96x96" src="images/$product->image_thumbnail"></div>
      
      <div>$product->product_name</div>
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
               <label class="form-label" for="product_name">Product Name</label>
               <input class="form-input" type="text" id="product-product_name" name="product_name" value="$product->product_name">
            </div>
            <div class="form-control col-md-6 col-xs-12">
               <label class="form-label" for="product_category">Category</label>
               <input class="form-input" type="text" id="product-category" name="product_category" value="$product->category">
            </div>
            <div class="form-control col-xs-12">
               <label class="form-label" for="product-description">Description</label>
               <textarea class="form-input" id="product-description" name="product-description"  rows="4">$product->description</textarea>
            </div>

            <h3 class="col-xs-12 top-padding-xs">2 Pricing</h3>
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
            <h3 class="col-xs-12 top-padding-xs">3 Aditional information</h3>
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
            <h3 class="col-xs-12 top-padding-xs">4 Product images</h3>
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

   <div class="col-xs-12 col-md-6 col-lg-6">
      
      <div class="top-padding-sm ">
         
            
         <div class="display-flex flex-align-center ">
            
            <h2 class="">$product->product_name</h2>
            <div class="flex-stretch" ></div>
            <div class="display-flex flex-align-center">
               <a href="{$_SERVER['PHP_SELF']}?id=$id&crud=delete"><img src="images/icon/trash-green.svg" class="icon" style="font-size:1.5em"></a>
               <div style="margin-left: 1em;">
                  <a href="product_item.php?id=$product->id" class="form-button" target="_blank">Visit</a>
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
            <hr style="margin:0em 1em; margin-top: 1em;">
            <div>
          
               <div class="card flat">
                  <div>
                     <p class="text-bold ">Price</p>
                     <p>&dollar;$product->price</p>
                  </div>
                  <div calss="">
                     <p class="text-bold ">On sale</p>
                     <p>$product->on_sale</p>
                  </div>
                  <div calss="">
                     <p class="text-bold ">Discount</p>
                     <p>$product->discount %</p>
                  </div>
               </div>
               <hr>
               <div class=" card flat">
                  <div class="">
                     <p class="text-bold">Image main</p>
                     <div class="image-thumbnail ">
                        <img class="img300x300" src="images/$product->image_main">
                     </div>
                  </div>
                  <div class="">
                     <div>
                        <p class="text-bold">Image Thumb</p>
                        <div class="image-thumbnail display-flex flex-justify-center" >
                           <img class="img120x120" src="images/$product->image_thumbnail">
                        </div>
                     </div>
                     <div>
                        <p class="text-bold ">Image Other</p>
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
<body class="checkout_page_bg">
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
               <li><a href="product_list.php" target="_blank">Store</a></li>
            </ul>
         </nav>
      </div>
   </header>
   <div class="grid gap admin-side-nav">
      <div class="col-2">           
         <nav class="navbar side-var">
            <a class="brand-text" href="#">Product Admin</a>
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
         <h2>ADMIN SUMMARY</h2>
         <div class="grid gap">
            <div class="col-xs-12 col-md-3">
               <div class=" card flat highlight">
                  <h3 class="text-center text-white">Total items in the store</h3>
                  <p class="text-center admin-gig-number"><?= $totalItems?></p>
               </div>
            </div>  
            <div class="col-xs-12 col-md-3">
               <div class="card flat">
                  <h3 class="text-center">On sale items</h3>
                  <p class="text-center admin-gig-number"><?= $totalItemsOnSale?></p>
               </div>
            </div>
            <div class="col-xs-12 col-md-3">
               <div class="card flat">
                  <h3 class="text-center">Sold out</h3>
                  <p class="text-center admin-gig-number">2</p>
               </div>
            </div>   
            <div class="col-xs-12 col-md-3">
               <div class="card flat ">
                  <h3 class="text-center">Recently added items</h3>
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
            <div class="card col-xs-12 col-md-3">
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