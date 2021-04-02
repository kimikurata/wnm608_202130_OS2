<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Product list</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<base href="http://kimikurata.com/aau/wnm608/kurata.kimi/">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="lib/css/styleguide.css">
	<link rel="stylesheet" href="lib/css/gridsystem.css">
	<link rel="stylesheet" href="css/storetheme.css">


</head>
<body>
   <?php include "parts/navbar.php" ?>
   <div class="container">
      <div class="card soft">
         <h2>Product List</h2>

         <ul>
            <!-- li*10>a[href='?id=$]'>{Product $} -->
            <li><a href="?id=1">Product 1</a></li>
            <li><a href="?id=2">Product 2</a></li>
            <li><a href="?id=3">Product 3</a></li>
            <li><a href="?id=4">Product 4</a></li>
            <li><a href="?id=5">Product 5</a></li>
            <li><a href="?id=6">Product 6</a></li>
            <li><a href="?id=7">Product 7</a></li>
            <li><a href="?id=8">Product 8</a></li>
            <li><a href="?id=9">Product 9</a></li>
            <li><a href="?id=10">Product 10</a></li>
         </ul>
      </div>
   	</div>

	<?php include "parts/footer.php" ?>

</body>
</html>