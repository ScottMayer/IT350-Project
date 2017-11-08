<?php

function read_csv_as_associative_array($filename, $delimit=",", $reverse=false, $headers_present=true, $indexByFirst=true)
{
    if ($fp = fopen($filename, 'r')) {
        while ($line = fgetcsv($fp, $length=1000, $delimiter=$delimit)) {
            if ($headers_present) {
                if (!isset($headers)) {
                    $headers = $line;
                } else {
                    $row = array();
                    if ($reverse==false) {
                        foreach ($line as $key => $value) {
                            $row[$headers[$key]] = $value;
                        }
                        $data[$line[0]] = $row;
                    } else {
                        foreach ($line as $key => $value) {
                            $row[$headers[$key]] = $value;
                        }
                        $data[$line[1]] = $row;
                    }

                    //print_r($row);
                    //echo "<br />";
                }
            }
        }
    }
    return $data;
}


function print_chit_table($table)
{

	echo "<br />";
	echo "<table>";
	echo "<tr><th>Chit Name</th><th>Description</th><th>Status</th>";

	// TODO print out table

	echo "</table>";
}

function read_users(){
	$fp = fopen("./admin/users.txt", 'r');

	if($fp) {
		while(($line = fgets($fp)) !== false){
			if(!isset($_SESSION['users'])){
				$_SESSION['users'] = array($line);
			}
			else{
				if(in_array($line, $_SESSION['users'])){
					//duplicate user`
				}
				else{
					array_push($_SESSION['users'], $line);
				}
			}


		}

		fclose($fp);
	}

}

function read_chits(){
	$fp = fopen("./chits/directory.txt", "r");
	if($fp){
		while(($line = fgets($fp)) !== false){
			$split = explode(",", $line);
			if(isset($_SESSION['chits'][$split[0]])){
				if(!in_array($split[1], $_SESSION['chits'][$split[0]])){
					array_push( $_SESSION['chits'][$split[0]] , $split[1]);
				}
			}
			else{
				$_SESSION['chits'][$split[0]] = array($split[1]);
			}


		}

		fclose($fp);
	}
}


?>
