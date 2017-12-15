<?php
session_start();
if(!isset($_SESSION['username'])){
	//if username isn't set send them to a login page
	header("Location: ./login.php");
}


require_once("nimitz.php");
require_once("error.inc.php");

$debug = false;
if($debug){
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
}

$fp = fopen("./chits/directory.txt", "r");
$data_to_write_back = [];
if($fp){
	while(($line = fgets($fp)) !== false){

		$split = explode(",", $line);

		if($split[1] == $_SESSION['filename']){
			// echo "here";
			if(is_file("./chits/" . $_SESSION['filename'])){
				// echo "here2";
				unlink("./chits/" . $split[1] );

			}
		}
		else {
			array_push($data_to_write_back, $line);

		}

	}

	fclose($fp);

	// redirect("./index.php");
}


$fp = fopen("./chits/directory.txt", "w");
if($fp){
	foreach($data_to_write_back as $line){
		// echo "{$line}\n";

		fwrite($fp, $line);

	}

	fclose($fp);

	redirect("./index.php");
}


?>
