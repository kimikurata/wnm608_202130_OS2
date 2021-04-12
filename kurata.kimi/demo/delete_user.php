
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../parts/meta.php" ?>
    <title>new user added</title>
</head>
<body>
	<div class="container ">
		<div class="card display-flex">
		    <h2 class="container text-bold text-highlight bottom-padding-sm">User successfully deleted</h2>
		    <div class="flex-stretch"></div>
		    <a class="generic-btn outline" href="demo/users_admin.php">Back to list</a>
        </div>
    </div>
</body>
</html>
<?php

 include "../lib/php/functions.php";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 	pretty_dump($_POST);
 	$file_name='users'. '.json';
 	$current_data=file_get_contents("$file_name");
 	$array_data=json_decode($current_data, true);

 	$user_id = $_POST['user_id_remove'];

 	$id_number= $user_id*1;
 	// echo $user_id;
 	pretty_dump($array_data);

 	// unset($array_data[$id_number]);
 	\array_splice($array_data, $user_id, 1);
 	// pretty_dump($array_data);

 	$newjson = json_encode($array_data);
 	file_put_contents($file_name, $newjson);
 	// echo "json sent delete";


 }else{
 	echo "not a post method";
 }
  echo <<<HTML
        
    HTML;

?>