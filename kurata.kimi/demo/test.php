
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../parts/meta.php" ?>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
       include "../lib/php/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   
    function get_data() {
        $name = $_POST['name'];
        $file_name='users'. '.json';

        
   
        if(file_exists("$file_name")) { 
            $current_data=file_get_contents("$file_name");
            $array_data=json_decode($current_data, true);
                               
            $extra=array(
                'name' => $_POST['name'],
                'type' => $_POST['type'],
                'email' => $_POST['email'],
                'classes' => $_POST['classes'],
            );
            $array_data[]=$extra;
            echo "file exist<br/>";
            pretty_dump($extra);

            return json_encode($array_data);
        }
        else {
            $datae=array();
            $datae[]=array(
                'name' => $_POST['name'],
                'type' => $_POST['type'],
                'email' => $_POST['email'],
                'classes' => $_POST['classes'],
            );
            echo "file not exist<br/>";

            return json_encode($datae);   
        }
    }
  
    $file_name='users'. '.json';
      
    if(file_put_contents("$file_name", get_data())) {
      
        echo <<<HTML
            <p class="text-bold text-highlight bottom-padding-sm">success</p>
            <a class="generic-btn outline" href="demo/users_admin.php">Back to list</a>
        HTML;
    }                
    else {
        echo 'There is some error';                
    }
}
       
?>