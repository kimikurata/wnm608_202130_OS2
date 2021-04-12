<?php

include "../lib/php/functions.php";

$users = file_get_json("users.json");

// pretty_dump($_SERVER);
// pretty_dump($_GET);


function showUserPage($user) {

$classes = implode(", ", $user->classes);
// pretty_dump($user);
// pretty_dump($_GET);

$user_id = $_GET["id"];
// echo $user_id ; 

echo <<<HTML
<nav class="crumbs">
   <ul>
      <li><a href="{$_SERVER['PHP_SELF']}" >Back</a></li>
   </ul>
</nav>
<div class=" ">
         <div class="display-flex">
            <h2 class="text-highlight bottom-margin-sm">$user->name</h2> 
            <div class="flex-stretch"></div>
            <form method="post" style="margin-right: 1.5em" class=" icon" action="demo/delete_user.php" >
               <input id="user_id_remove" name="user_id_remove" type="hidden" value="$user_id">   
               <input   class="form-button form-icon " type="submit" value="">
            </form>
         </div>  
         <h3>Personal information</h3>

         <form method="post" class="grid gap-column" action="demo/update_user.php" >
            <input id="user_id" name="user_id" type="hidden" value="$user_id">   
            <div class="col-md-12 col-xs-12">
               <div class="form-control">
                  <label for="name" class="form-label">Name</label>
                  <input id="name" name="name" type="text" placeholder="John" class="form-input" value="$user->name">
               </div>
            </div>
            <div class="col-md-6 col-xs-12">
               <div class="form-control">
                  <label for="type" class="form-label">Type</label>
                  <input id="type" name="type" type="text" placeholder="John" class="form-input" value="$user->type">
               </div>
            </div>
            <div class="col-md-6 col-xs-12">
               <div class="form-control">
                  <label for="classes" class="form-label">Classes</label>
                  <input id="classes" name="classes" type="text" placeholder="Doe" class="form-input" value="$classes">
               </div>
            </div>
            <div class="col-md-12 col-xs-12 bottom-margin-sm">
               <div class="form-control flex-layout">
                  <label for="useremail" class="form-label">Email</label>
                  <input id="user-email" name="email" type="email" placeholder="suculentina@gmail.com" class="form-input" value="$user->email"> 
               </div>
            </div>
          
            <input   class="form-button highlighted  col-md-12 col-xs-12" type="submit" value="Submit"  >
         </form>
         
      </div>
HTML;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <title>User Administrator</title>
   <?php include "../parts/meta.php" ?>

   <style>
      .user-link:hover{ text-decoration: underline; text-decoration-color: var(--color-highlight); font-weight: 400; }


      
   </style>
</head>
<body>
   <header class="navbar">
      <div class="container display-flex flex-align-center">
         <div class="flex-none">
            <h3 class="brand-text">User Admin</h3 class="brand-text">
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex">
            <ul>
               <li><a  href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
            </ul>
         </nav>
      </div>
   </header>

   <div class="container">
      <div class="card soft">

         <?php
         if(isset($_GET['id'])) {
            showUserPage($users[$_GET['id']]);
         } else {
         ?>

         <h4 class="text-bold text-hight" >User List</h4>

         <ul>
         <?php

         for($i=0; $i<count($users); $i++) {
            echo "<li>
            <a class='user-link' style='color:var(--color-black);' href='{$_SERVER['PHP_SELF']}?id=$i'>{$users[$i]->name}</a>
            </li>";
         }

         ?>
         </ul>
         <div class="display-flex">
            <div class="flex-stretch"></div>
            <a href="demo/add_new_user.php">
               <div class="circle-sm">
                  <h2 class="text-highlight text-center">+</h2 class="text-highlight">
               </div>
            </a>
         </div>
         <?php
         }
         ?>
         
         
      </div>
      
      
   </div>
</body>
</html>