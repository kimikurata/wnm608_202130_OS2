<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../parts/meta.php" ?>
    <title>new user added</title>
</head>
<body>
    <div class="container ">
        <div class="card display-flex">
            <h2 class="container text-bold text-highlight bottom-padding-sm">User successfully added</h2>
            <div class="flex-stretch"></div>
            <a class="generic-btn outline" href="demo/users_admin.php">Back to list</a>
        </div>
    </div>
</body>
</html>

<?php
    include "../lib/php/functions.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $file_name='users'. '.json';

        $classes = $_POST['classes'];
        $classes_explode = explode(", ", $classes);


        $current_data=file_get_contents("$file_name");
        $array_data=json_decode($current_data, true);
        

        $extra=array(
            'name' => $_POST['name'],
            'type' => $_POST['type'],
            'email' => $_POST['email'],
            'classes' => $classes_explode,
        );
        
        $array_data[]= $extra;


        $newjson = json_encode($array_data);
        pretty_dump($newjson);


        file_put_contents($file_name, $newjson);
        echo "json sent";

        pretty_dump($_POST);


    }else{
        echo "not a post method";
    }

?>
