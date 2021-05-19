<?php
 
@include_once "../lib/php/functions.php";


function getRequires($props) {
   foreach($props as $prop) {
      if(!isset($_GET[$prop])) return false;
   }
   return true;
}


function makeStatement($type) {
   switch($type) {
      case "products_all":
         if(!getRequires(['o','d','l']))
            return ["error"=>"Missing Properties1"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;

      case "products_admin_all":
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            ORDER BY `date_create` DESC
         ");
         break;
         
         
      case "product_by_id":
         if(!getRequires(['id']))
            return ["error"=>"Missing Properties2"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE `id` = '{$_GET['id']}'
         ");
         break;
         
      case "products_by_category":
         if(!getRequires(['category']))
            return ["error"=>"Missing Properties3"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE
               (`product_name` LIKE '%{$_GET['s']}%' OR
               `description` LIKE '%{$_GET['s']}%') AND
               `category` = '{$_GET['category']}'
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;



      case "search":
         if(!getRequires(['s','o','d','l']))
            return ["error"=>"Missing Properties4"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE
               `product_name` LIKE '%{$_GET['s']}%' OR
               `category` LIKE '%{$_GET['s']}%' OR
               `description` LIKE '%{$_GET['s']}%'
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;

      // CRUD
      case "product_update":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("UPDATE `products`
            SET
               `product_name` = ?,
               `category` = ?,
               `image_main` = ?,
               `image_thumbnail` = ?,
               `image_other` = ?,
               `price` = ?
               `description` = ?
               `dimentions` = ?
               `planter_type` = ?
               `plant_care` = ?
               `watering` = ?
               `on_sale` = ?
               `discount` = ?
            WHERE `id` = ?
            ");
         $stmt->bind_param("sssssdssssssii",
            $_POST['product_name'],
            $_POST['product-category'],
            $_POST['image_main'],
            $_POST['product-image_thumbnail'],
            $_POST['product-image_other'],
            $_POST['product-price'],
            $_POST['product-description'],
            $_POST['product-dimentions'],
            $_POST['product-planter_type'],
            $_POST['product-plant_care'],
            $_POST['product-watering'],
            $_POST['product-on_sale'],
            $_POST['product-discount'],
            $_POST['id']
         );
         $stmt->execute();
      case "product_insert":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("INSERT INTO `products`
            (
               `title`,
               `price`,
               `category`,
               `image_other`,
               `image_thumb`,
               `description`,
               `quantity`,
               `date_create`,
               `date_modify`
            )
            VALUES
            (
               ?,
               ?,
               ?,
               ?,
               ?,
               ?,
               ?,
               NOW(),
               NOW()
            )
            ");
         $stmt->bind_param("sdssssi",
            $_POST['product-title'],
            $_POST['product-price'],
            $_POST['product-category'],
            $_POST['product-image_other'],
            $_POST['product-image_thumb'],
            $_POST['product-description'],
            $_POST['product-quantity']
         );
         $stmt->execute();
         return $conn;


      default: return ["error"=>"No Matched Type"];
   }
}