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

function redirect($url)
{
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
}

function read_users(){
	$fp = fopen("./login/en-42.csv", 'r');

	if($fp) {
		while(($line = fgets($fp)) !== false){
      $split = explode(";", $line);

    	if(!isset($_SESSION['users'])){
				$_SESSION['users'] = array($split[0]);
			}
			else{
				if(in_array($split[0], $_SESSION['users'])){
					//duplicate user`
				}
				else{
					array_push($_SESSION['users'], $split[0]);
				}
			}


		}

		fclose($fp);
	}

}

function get_name($username){
  $fp = fopen("./login/en-42.csv", "r");
  if($fp){
    while(($line = fgets($fp)) !== false){
			$split = explode(";", $line);
      if($split[0] == $username){
        $name = $split[4] . " " . $split[5];
        fclose($fp);
        return $name;
      }
    }
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
