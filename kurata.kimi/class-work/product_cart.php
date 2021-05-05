<?php

include "lib/php/functions.php";
include "parts/templates.php";

pretty_dump($_POST);


$cart = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` IN (5,9,13)
");

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Cart</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   

   <div class="container">
      <div class="card soft">
         <h2>Confirm Cart</h2>

         <?php

         echo array_reduce($cart,'makeCartList');

         ?>

         <div>
            <a class="form-button" href="class-work/product_checkout.php">Checkout</a>
         </div>
      </div>
   </div>
</body>
</html>