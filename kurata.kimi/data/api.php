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

      // CRUD  create, read, update, delete
      case "product_update":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("UPDATE `products`
            SET
               `product_name` = ?,
               `category` = ?,
               `image_main` = ?,
               `image_thumbnail` = ?,
               `image_other` = ?,
               `price` = ?,
               `description` = ?,
               `dimentions` = ?,
               `planter_type` = ?,
               `plant_care` = ?,
               `watering` = ?,
               `on_sale` = ?,
               `discount` = ?,
               `date_modify` = NOW()

            WHERE `id` = ?
            ");
         // pretty_dump([$_POST,$stmt,isset($_POST['product-on_sale'])]); die;
         $onsale = isset($_POST['product-on_sale']) ? 1 : 0;
         $stmt->bind_param("sssssdsssssiii",
            $_POST['product-product_name'],
            $_POST['product-category'],
            $_POST['product-image_main'],
            $_POST['product-image_thumbnail'],
            $_POST['product-image_other'],
            $_POST['product-price'],
            $_POST['product-description'],
            $_POST['product-dimentions'],
            $_POST['product-planter_type'],
            $_POST['product-plant_care'],
            $_POST['product-watering'],
            $onsale,
            $_POST['product-discount'],
            $_POST['id']
         );
         $stmt->execute();
         break;


      case "product_insert":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("INSERT INTO `products`
            (
               `product_name`,
               `category`,
               `image_main`,
               `image_thumbnail`,
               `image_other`,
               `price`,
               `description`,
               `dimentions`,
               `planter_type`,
               `plant_care`,
               `watering`,
               `on_sale`,
               `discount`,
               `date_create`,
               `date_modify`,
               `sale_start_date`,
               `sale_end_date`
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
               ?,
               ?,
               ?,
               ?,
               ?,
               ?,
               NOW(),
               NOW(),
               NOW(),
               NOW()
            )
            ");
         $stmt->bind_param("sssssdsssssii",
            $_POST['product-product_name'],
            $_POST['product-category'],
            $_POST['product-image_main'],
            $_POST['product-image_thumbnail'],
            $_POST['product-image_other'],
            $_POST['product-price'],
            $_POST['product-description'],
            $_POST['product-dimentions'],
            $_POST['product-planter_type'],
            $_POST['product-plant_care'],
            $_POST['product-watering'],
            $_POST['product-on_sale'],
            $_POST['product-discount']

         );
         // pretty_dump([$_POST,$stmt]); die;
         $stmt->execute();
         return $conn;


      case "product_delete":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("DELETE FROM `products`
            WHERE `id` = ?
            ");
         $stmt->bind_param("i",$_GET['id']);
         $stmt->execute();
         break;

      


      default: return ["error"=>"No Matched Type"];
   }
}