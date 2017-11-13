<!DOCTYPE html>
<?php if(!isset($_SESSION['username'])){
  //if username isn't set send them to a login page
  //header("Location: ./login/login.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Chits</title>
=======
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });
      });
    </script>
  </head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">E-Chits</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
<li><form class="navbar-form navbar-right" action="#" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Find Chit</button>
      </form>
</li>  
        <li><a href="./AllChits.php">View All Chits</a></li>
</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
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

$debug = false;



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
	echo "<div class='row'>";
	echo "<div class='col-md-3'>";
	echo "</div>";
	echo "<div class='col-md-6'>";
	echo "<table class='table table-hover'>";
	echo "<thead><tr><th>User {$_SESSION['username']} 's chits</th></tr></thead>";
	foreach ($_SESSION['chits'][$_SESSION['username']] as $chit ){
		echo "<tr><td>$chit</td></tr>";
	}

	echo "</table>";
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


<!-- <h1>View Chits</h1> -->
<nav class="navbar navbar-default navbar-fixed-bottom ">
	<div class="container-fluid ">
		<li><a href="../../default.html">View All Chits</a></li>
		<li>You are currently logged in as: USERNAME</li>
	</div>
	<ol class="breadcrumb">
		<li><a href="index.php">Home</a></li>
		<li>New Chit</li>
	</ol>
</nav>

</body>

</html>
