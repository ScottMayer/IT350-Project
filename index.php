<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['username'])){
  //if username isn't set send them to a login page
  header("Location: ./login.php");
      }
 ?>
<script type="text/javascript">
  function redirect(location){
    window.location = location;
  }
</script>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="./imgs/icon.ico"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Chits</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->



  </head>
  <body>
    <?php
    require('nav.inc.php');
    nav();
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>

<?php
// session_destroy();
// $_POST = array();
// $_REQUEST = array();
// die;

require_once("nimitz.php");
require_once("error.inc.php");
//
// $v = 1/ 0;

$debug = false;
// $debug = true;


if (!isset($_SESSION['username'])) {
	// TODO Go to Login Page
	header("Location: ./login.php");

	//FOR TESTING ONLY
	// $_SESSION['username'] = 'm183990';
}

// $_SESSION['username'] = 'm183990';

if (!isset($_SESSION['users']) || $debug){
	read_users();
}

if (!isset($_SESSION['chits']) || $debug){
	read_chits();
}

if(isset($_SESSION['username']) && !isset($_SESSION['name']) || $debug){
  $_SESSION['name'] = get_name($_SESSION['username']);

}

if($debug){
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
}

$mychitspresent = false;
$mychits = [];
$subordinatechitspresent = false;
$subordinatechits = [];

if(!is_file("./chits/directory.txt")){
	$contents = "";
	file_put_contents("./chits/directory.txt", $contents);
}

$fp = fopen("./chits/directory.txt", "r");
if($fp){
	while(($line = fgets($fp)) !== false){
        #FILTERING
        if(isset($_POST['FILTER']) && strlen($_POST['FILTER']) >0){
            if((stripos($line, $_POST['FILTER']) === false)){
                continue;
            }
        }
        #END FILTERING
		$split = explode(",", $line);

		if($split[0] == $_SESSION['username']){
            $mychitspresent = true;
			$thischit = [$split[1], $split[3], $split[4]];
			array_push($mychits, $thischit);
		}

		$coc_all = $split[2];
		$coc = explode(" ", $coc_all);
		foreach ($coc as $member) {
			$member = substr($member, 0, -2);

			if($member == $_SESSION['username']){
				$subordinatechitspresent = true;
				$thischit = [$split[1], $split[3], $split[4]];
				array_push($subordinatechits, $thischit);
			}
			// echo "$member";
		}



	}

	fclose($fp);
}





if ($mychitspresent){
	// TODO print as table all chits associated with username
	//TODO only display chits where filter does not apply
	echo "<div class='row'>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "<div class='col-md-8'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th>Your chits</th></tr></thead>";
	foreach ($mychits as $chit){
		echo "<tr><td>{$chit[0]}</td><td>{$chit[2]}</td>";

		if($chit[1] == 0){
			echo "<td>PENDING</td>";

		}

		if($chit[1] == 1){
			echo "<td>APPROVED</td>";
		}

		if($chit[1] == 2){
			echo "<td>DENIED</td>";
		}


		//if approved...
		// echo "<td><button type=\"button\" class=\"btn btn-default\" onclick=\"location.href='generate_pdf.php';\">Print Chit</button></td>";

		//if pending

		echo "<td><form action=\"view.script.php\" method=\"post\"><input type=\"hidden\" name=\"filename\" value=\"{$chit[0]}\" /><input type=\"submit\" class=\"btn btn-default\" name=\"viewbutton\" value=\"View Chit\"></form></td>";
		echo "<td><form action=\"print.script.php\" method=\"post\"><input type=\"hidden\" name=\"filename\" value=\"{$chit[0]}\" /><input type=\"submit\" class=\"btn btn-default\" name=\"viewbutton\" value=\"Print Chit\"></form></td>";

		echo "</tr>";
	}

	echo "</table>";
	echo "</div>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "</div>";

}


//subordinate Chits




if ($subordinatechitspresent){
// if (isset($_SESSION['chits']['subordinates'][$_SESSION['username']])){
	// TODO print as table all chits associated with username
	//TODO only display chits where filter does not apply
	echo "<div class='row'>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "<div class='col-md-8'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th cospan=2>Subordinate chits</th></tr></thead>";


	foreach ($subordinatechits as $chit){

			echo "<tr><td>{$chit[0]}</td><td>{$chit[2]}</td>";

			if($chit[1] == 0){
				echo "<td>PENDING</td>";

			}

			if($chit[1] == 1){
				echo "<td>APPROVED</td>";
			}

			if($chit[1] == 2){
				echo "<td>DENIED</td>";
			}

		//if approved...
		// echo "<td><button type=\"button\" class=\"btn btn-success\" onclick=\"location.href='generate_pdf.php';\">Print Chit</button></td>";

		//if pending
		echo "<td><form action=\"view.script.php\" method=\"post\"><input type=\"hidden\" name=\"filename\" value=\"{$chit[0]}\" /><input type=\"submit\" class=\"btn btn-default\" name=\"viewbutton\" value=\"View Chit\"></form></td>";

		echo "<td><form method=\"post\" action=\"update-chit.php\">
		<input type=\"hidden\" name=\"filename\" value=\"{$chit[0]}\" />
		<input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>
		<input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
		</form></td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "</div>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "</div>";

}



echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

if($debug){
	echo "<pre>";
	echo "SESSION: ";
	print_r($_SESSION);
	echo "</pre>";
}
?>

</div>


</body>

</html>
