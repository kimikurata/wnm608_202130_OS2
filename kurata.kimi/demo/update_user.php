
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

	    pretty_dump($array_data);

	    pretty_dump($classes_explode);

	    $array_data[]=$extra;
	    echo "file exist<br/>";
	    pretty_dump($extra);


	    $newjson = json_encode($array_data);
		pretty_dump($newjson);


		file_put_contents($file_name, $newjson);
		echo "json sent";


    }else{
    	echo "not a post method";
    }

    echo <<<HTML
            <p class="text-bold text-highlight bottom-padding-sm">success</p>
            <a class="generic-btn outline" href="demo/users_admin.php">Back to list</a>
        HTML;
                   


?>