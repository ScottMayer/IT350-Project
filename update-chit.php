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

    <?php 
       /****** approve and deny should only edit ./chit/directory.txt *******
        *  when approving/denying a chit, find the name of the chit in column [1]
        *  then find the user's username in $line[2]. 
        *  - change # in "MXXXXXX-#" (# is the number following the user's username in $line[2])
        *    - if the user has denied the chit
        *      - change # in user's "MXXXXXX-#" in $line[2] to 2
        *      - change # in $line[3] to 2
        *    - else
        *      - change # in user's "MXXXXXX-#" in $line[2] to 1
        *      - if every # in "MXXXXXX-#" is 1 (every user has approved)
        *        - change $line[3] to 1 (chit is approved)
        */
     ?>

  </body>

</html>
