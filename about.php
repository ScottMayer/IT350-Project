<!DOCTYPE html>
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
    <title>About the Creators</title>
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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <style>
      body {
        font-family: Raleway;
      }
    </style>
  </head>
  <body>
<?php session_start();
  require('nav.inc.php');
  if(isset($_SESSION['username'])){
      nav();
  }else{
      nav(1);
  }
 ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1>About The Creators</h1>
          </div>
        </div>
      </div>
      <div class="main">
        <div class="row">
          <!-- <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-2"> -->
            <img src="./imgs/M183990.jpg" class=img-thumbnail style="float:left; width:24%; margin-right:1%; margin-bottom: 0.5em" onmouseover="about('M183990')"></img>
            <img src="./imgs/M190108.jpg" class=img-thumbnail style="float:left; width:24%; margin-right:1%; margin-bottom: 0.5em" onmouseover="about('M190108')"></img>
            <img src="./imgs/M197116.jpg" class=img-thumbnail style="float:left; width:24%; margin-right:1%; margin-bottom: 0.5em" onmouseover="about('M197116')"></img>
            <img src="./imgs/M201656.jpg" class=img-thumbnail style="float:left; width:24%; margin-right:1%; margin-bottom: 0.5em" onmouseover="about('M201656')"></img>
          <!-- </div> -->
        </div>

        <div id=about class="well" style="visibility:hidden"></div>
      </div>
    </div>

    <script type=text/javascript>
      function about(alpha) {
        var desc = "";

        // TODO Fill out your bio under your alpha
        if(alpha == "M183990") {
          desc = "MIDN 1/C Scott Mayer is a CS/IT major in 1st Company at USNA and is also the project lead for E-Chits.";
        } else if(alpha == "M190108") {
          desc = "MIDN 2/C Doug Alpuche is a CS/IT major in 13th Company at USNA.";
        } else if(alpha == "M197116") {
          desc = "MIDN 2/C Vincent Xu is a CS/IT major in 13th Company at USNA. He built the login and registration systems for E-Chits. He pleads with E-Chits users, with tears in his eyes, to not mess with or break the system, or he'll be forced to take retaliatory action against them all. He desires a commission into the Marine Corps after graduation. He really enjoys sleep, but Sleep has decided that it'd do both of them some good to take a temporary break.";
        } else if(alpha == "M201656") {
          desc = "MIDN 3/C Ryan Eilers is a CS/IT major in 20th Company at USNA.";
        } else {
          desc = "You broke us. Congrats.";
        }

        document.getElementById("about").innerHTML = "<h3>" + desc + "</h3>";
        document.getElementById("about").style.visibility = "visible";
      }
    </script>
  </body>
</html>
