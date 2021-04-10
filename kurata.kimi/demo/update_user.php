
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
        $user_id = $_POST['user_id'];



	    $extra=array(
	        'name' => $_POST['name'],
	        'type' => $_POST['type'],
	        'email' => $_POST['email'],
	        'classes' => $classes_explode,
	    );
	    $extra_object = '['.$user_id.']=>';
		echo $extra_object;
	    $array_data[$user_id]= $extra;
	    echo "file exist<br/>";


	    $newjson = json_encode($array_data);
		pretty_dump($newjson);


		file_put_contents($file_name, $newjson);
		echo "json sent";

		pretty_dump($_POST);


    }else{
    	echo "not a post method";
    }

    echo <<<HTML
            <p class="text-bold text-highlight bottom-padding-sm">success</p>
            <a class="generic-btn outline" href="demo/users_admin.php">Back to list</a>
        HTML;
                   


?>