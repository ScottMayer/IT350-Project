<!DOCTYPE html>
<html>

<head>
	<!-- set charset -->
	<meta charset="utf-8">
	<meta name="description" content="eChits">
	<meta name="author" content="Scott Mayer" />
	<meta name="keywords" content="eChits" />
	<!-- page title -->
	<title>View Chits</title>


	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">

	<!-- TODO -->
	<!-- <link type="text/css" rel="stylesheet" href="../../style.css" /> -->

</head>

<body>
<h1>View Chits</h1>

<?php
session_start();
// session_destroy();
// $_POST = array();
// $_REQUEST = array();
// die;

require_once("nimitz.php");
require_once("error.inc.php");
//
// $v = 1/ 0;

$debug = true;



if (!isset($_SESSION['username'])) {
	// TODO Go to Login Page

	//FOR TESTING ONLY
	$_SESSION['username'] = 'm183990';
}


if (!isset($_SESSION['users']) || $debug){
	read_users();
}

if (!isset($_SESSION['chits']) || $debug){
	read_chits();
}


if (isset($_SESSION['chits'][$_SESSION['username']])){
	// TODO print as table all chits associated with username
	echo "<table>";
	foreach ($_SESSION['chits'][$_SESSION['username']] as $chit ){
		echo "<tr><td>$chit</td></tr>";
	}

	echo "</table>";

}

echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "SESSION: ";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>


<!-- <h1>View Chits</h1> -->

</body>

</html>
