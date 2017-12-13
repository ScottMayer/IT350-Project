<!DOCTYPE html>
<?php session_start();
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
    <title>Chits-USNA</title>
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
          <div class="page-header">
            <?php // TODO: CHANGE TO ACTUAL TITLE ?>
            <h1>Online Chit Generation</h1>
          </div>
        </div>
      </div>
      <div class="main">
        <div class="row">
          <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-2">
          <h3>Welcome <?php echo $_SESSION['username'];?> </h3>
            <h4> &nbsp; What would you like to do?</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-sm-6 col-md-offset-1 col-sm-offset-2">
            <form class="form-inline" action="#" method="post">
              <input type="button" class="form-control" name="View a Chit" value="View Chits" onclick="redirect('viewchits.php')">
              <input type="button" class="form-control" name="Make a New Chit" value="Make a New Chit" onclick="redirect('makechit.php')">
            </form>
          </div>
        </div>
      </div>

    </div>
  </body>
</html>
