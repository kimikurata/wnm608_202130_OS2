<?php 
include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";
 
// $_SESSION['num'] = isset($_SESSION['num']) ?
//   $_SESSION['num']+1 :
//    0;
// pretty_dump([$_GET,$_POST]);

// $search = isset($_GET['s']) ? $_GET['s'] : "";



setDefault('s',''); // search
setDefault('t','products_all'); // type
setDefault('d','DESC'); // order direction
setDefault('o','date_create'); // order by
setDefault('l','12'); // limit

// pretty_dump($_GET);


function makeSortOptions() {
   $options = [
      ["date_create","DESC","Latest Products"],
      ["date_create","ASC","Oldest Products"],
      ["price","DESC","Highest Price"],
      ["price","ASC","Lowest Price"]
   ];
   foreach($options as [$orderby,$direction,$title]) {
      echo "
      <option data-orderby='$orderby' data-direction='$direction'
      ".($_GET['o']==$orderby && $_GET['d']==$direction ? "selected" : "").">
      $title</option>
      ";
   }
}


if(isset($_GET['t'])) {
   $result = makeStatement($_GET['t']);
   $products = isset($result['error']) ? [] : $result;

} else {
   $result = makeStatement("products_all");
   $products = isset($result['error']) ? [] : $result;
}
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
          <form class="hotdog" method="get" accept="product_list.php">
            <div class="flex-stretch">
              <input type="hidden" name="t" value="search">
              <input type="hidden" name="d" value="<?=$_GET['d']?>">
              <input type="hidden" name="o" value="<?=$_GET['o']?>">
              <input type="hidden" name="l" value="<?=$_GET['l']?>">
              <input type="search" name="s" placeholder="Search..." value="<?= $_GET['s'] ?>">
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
        <div class="display-flex flex-align-center overscroll-x">
          <p class="text-highlight ">Filters</p>
          <!-- <button class="chip-btn">Solid btn</button> -->
            <a id="terrarium" class="chip-btn active" href="product_list.php?t=products_by_category&category=Terrarium&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="form-button inline">Terrarium</a>
            <a id="echeveria"class="chip-btn" href="product_list.php?t=products_by_category&category=Echeveria&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="form-button inline">Echeveria</a>
            <a id="senecio" class="chip-btn" href="product_list.php?t=products_by_category&category=Senecio&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="form-button inline">Senecio</a>
            <a id="accesories" class="chip-btn" href="product_list.php?t=products_by_category&category=Accessory&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="form-button inline">Accesories</a>
            
            </script>

        </div>
      </div>
    </div>
    <div class="container">
      <form class="form-control display-flex flex-align-center" action="product_list.php" method="get">
        <input type="hidden" name="t" value="search">
        <input type="hidden" name="s" value="<?=$_GET['s']?>">
        <input type="hidden" name="d" value="<?=$_GET['d']?>">
        <input type="hidden" name="o" value="<?=$_GET['o']?>">
        <input type="hidden" name="l" value="<?=$_GET['l']?>">
        <div class="flex-stretch"></div>
        <div class="flex-none" ><label class="text-only-label" for="example8" >Sort by:</label></div>
        <div class="form-select onlytext">
          <select onChange="checkSort(this)">
             <? makeSortOptions() ?>
          </select>
        </div>
      </form>
  
    </div>
    <div class="container">    
        <div class="grid gap medium vertical-stretch top-padding-md bottom-padding-md">
        <?

         
        if(empty($products)) {
           echo "<p class='col-xs-12 col-md-12 text-center'>Sorry... No products found.</p>";
        } else {
           echo array_reduce($products,'makeProductList');
        }

        // pretty_dump($products);


        ?>
        </div>


   	</div>
	<?php include "parts/footer.php" ?>

</body>
</html>