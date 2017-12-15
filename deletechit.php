<?php
session_start();
if(!isset($_SESSION['username'])){
	//if username isn't set send them to a login page
	header("Location: ./login.php");
}


require_once("nimitz.php");
require_once("error.inc.php");

$fp = fopen("./chits/directory.txt", "r");
$data_to_write_back = [];
if($fp){
	while(($line = fgets($fp)) !== false){

		$split = explode(",", $line);

		if($split[1] == $_SESSION['filename']){
			if(is_file($_SESSION['filename'])){

				if(!unlink("./chits/" . $split[1] )){
					//error, file could not be deleted
				}
			}
		}
		array_push($data_to_write_back, $line);

	}

	fclose($fp);

	// redirect("./index.php");
}


$fp = fopen("./chits/directory.txt", "w");
if($fp){
	foreach($data_to_write_back as $line){

		fwrite($fp, $line);

	}

	fclose($fp);

	// redirect("./index.php");
}


?>
