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
   <div class="container navbar-spacer">
      <div class="card soft">
         <h2>Product List</h2>
         <ul>
            <!-- li*10>a[href='?id=$]'>{Product $} -->
            <li><a href="product_item.php?id=1">Product 1</a></li>
            <li><a href="product_item.php?id=2">Product 2</a></li>
            <li><a href="product_item.php?id=3">Product 3</a></li>
            <li><a href="product_item.php?id=4">Product 4</a></li>
            <li><a href="product_item.php?id=5">Product 5</a></li>
            <li><a href="product_item.php?id=6">Product 6</a></li>
            <li><a href="product_item.php?id=7">Product 7</a></li>
            <li><a href="product_item.php?id=8">Product 8</a></li>
            <li><a href="product_item.php?id=9">Product 9</a></li>
            <li><a href="product_item.php?id=10">Product 10</a></li>
         </ul>
      </div>
   	</div>
	<?php include "parts/footer.php" ?>

</body>
</html>