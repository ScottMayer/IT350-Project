<?php
session_start();
if(!isset($_SESSION['username'])){
	//if username isn't set send them to a login page
	header("Location: ./login.php");
}


require_once("nimitz.php");
require_once("error.inc.php");

$fp = fopen("./chits/directory.txt", "r+");
if($fp){
	while(($line = fgets($fp)) !== false){

		$split = explode(",", $line);

		if($split[1] == $_SESSION['filename']){
			if(!unlink("./chits/" . $split[1] )){
				//error, file could not be deleted
			}

		}
		else{
			fwrite($fp, $line);
		}




	}

	fclose($fp);

	redirect("./index.php");
}


?>
