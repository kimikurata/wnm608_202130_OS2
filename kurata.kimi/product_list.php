<?php 
include "lib/php/functions.php";
include "parts/templates.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Product list</title>

	<?php include "parts/meta.php"?>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-VLE3Z44F0K"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'G-VLE3Z44F0K');
   </script>

</head>
<body>
   <?php include "parts/navbar.php" ?>
   <div class="container navbar-spacer-sm ">
      <div class="grid gap top-margin-md">
        <h1 class="col-lg-4  col-xs-12 bottom-padding-sm product_list_title">Live succulents</h1>
        <div class="col-lg-8  col-xs-12">
          <form class="hotdog">
            <div class="flex-stretch">
              <input type="search" placeholder="Search..">
            </div>
            <div class="flex-none">
              <img src="images/icon/search.svg" alt="" class="icon">
            </div>
          </form>
        </div>
  
      </div>
    </div>
    <div class="filter_box top-margin-sm">
      <div class="container">
        <div class="display-flex flex-align-center">
          <p class="text-highlight">Filters</p>
          <button class="chip-btn">Solid btn</button>
        </div>
        
      </div>
    </div>
    <div class="container">
      <div class="form-control display-flex flex-align-center">
        <div class="flex-stretch"></div>
        <div class="flex-none" ><label class="text-only-label" for="example8" >Sort by:</label></div>
        <div class="form-select onlytext">
          <select>
            <option value="All">Display all</option>
            <option value="Lower price">Lower price</option>
            <option value="Most recent">Most recent</option>
          </select>
        </div>
      </div>
  
    </div>
    <div class="container">    
        <div class="grid gap medium vertical-stretch top-padding-md bottom-padding-md">
        <?

         $products = MYSQLIQuery("
           SELECT *
           FROM `products`
           ORDER BY `date_create` DESC
           LIMIT 15
        ");

         echo array_reduce($products,'makeProductList');

        // pretty_dump($products);


        ?>
        </div>


   	</div>
	<?php include "parts/footer.php" ?>

</body>
</html>