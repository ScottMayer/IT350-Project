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

if (isset($_SESSION['chits'][$_SESSION['username']])){
	// TODO print as table all chits associated with username
	//TODO only display chits where filter does not apply
	echo "<div class='row'>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "<div class='col-md-8'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th>{$_SESSION['name']}'s chits</th></tr></thead>";
	foreach ($_SESSION['chits'][$_SESSION['username']] as $chit ){
		echo "<tr><td>$chit</td><td>TODO: Description</td>";

		echo "<td>TODO: STATUS</td>";



		//if approved...
		// echo "<td><button type=\"button\" class=\"btn btn-default\" onclick=\"location.href='generate_pdf.php';\">Print Chit</button></td>";

		//if pending

		echo "<td><form action=\"view.script.php\" method=\"post\"><input type=\"hidden\" name=\"filename\" value=\"$chit\" /><input type=\"submit\" class=\"btn btn-default\" name=\"viewbutton\" value=\"View Chit\"></form></td>";

		echo "</tr>";
	}

	echo "</table>";
	echo "</div>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "</div>";

}


//subordinate Chits

if (isset($_SESSION['chits'][$_SESSION['username']])){
// if (isset($_SESSION['chits']['subordinates'][$_SESSION['username']])){
	// TODO print as table all chits associated with username
	//TODO only display chits where filter does not apply
	echo "<div class='row'>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "<div class='col-md-8'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th cospan=2>{$_SESSION['name']}'s subordinates' chits</th></tr></thead>";
	foreach ($_SESSION['chits'][$_SESSION['username']] as $chit ){
		echo "<tr><td>$chit</td><td>TODO: Description</td>";

		echo "<td>TODO: STATUS</td>";



		//if approved...
		// echo "<td><button type=\"button\" class=\"btn btn-success\" onclick=\"location.href='generate_pdf.php';\">Print Chit</button></td>";

		//if pending
		echo "<td><button type=\"button\" class=\"btn btn-success\" onclick=\"approve(this);\">Approve</button></td>";
		echo "<td><button type=\"button\" class=\"btn btn-danger\" onclick=\"deny(this);\">Deny</button></td>";
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
