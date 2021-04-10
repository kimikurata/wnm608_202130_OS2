<?php

 include "../lib/php/functions.php";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 	pretty_dump($_POST);
 	$file_name='users'. '.json';
 	$current_data=file_get_contents("$file_name");
 	$array_data=json_decode($current_data, true);

 	$user_id = $_POST['user_id_remove'];

 	$id_number= $user_id*1;
 	echo $user_id;
 	pretty_dump($array_data);

 	// unset($array_data[$id_number]);
 	\array_splice($array_data, $user_id, 1);
 	pretty_dump($array_data);

 	$newjson = json_encode($array_data);
 	file_put_contents($file_name, $newjson);
 	echo "json sent delete";


 }else{
 	echo "not a post method";
 }
  echo <<<HTML
        <p class="text-bold text-highlight bottom-padding-sm">Deleted</p>
        <a class="generic-btn outline" href="users_admin.php">Back to list</a>
    HTML;

?>