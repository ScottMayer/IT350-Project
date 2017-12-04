<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Action</title>
    <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
<?php
  require('../nav.inc.php');
  nav(1);
  // include "../nimitz.php";
  // NOTES:
  // - Copied read_users() from nimitz because stopped working
  //   - Working on fixing that so can remove read_users from here
  function read_users(){if($fp=fopen("../admin/users.txt", 'r')){while(($line = fgets($fp)) !== false){if(!isset($_SESSION['users'])){$_SESSION['users'] = array($line);}else{if(in_array($line, $_SESSION['users'])){/*duplicate user*/}else{array_push($_SESSION['users'], $line);}}}fclose($fp);}}

  function validateUser($user, $pass) {
    if($fp=fopen("en-42.csv", 'r')) {
      while($line=fgets($fp)) { // linear traversal through en-42
        $arr = explode(";", $line);

        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";
        // echo $user;

        if($exists=in_array($user, $arr)) { // users is registered
          // check to see if entered password matches registered password
          if(password_verify($pass, $arr[2])) {
            // entered password matches registered password
            $_SESSION['username'] = $user;
            $_SESSION['accesslevel'] = $arr[1];
            if(isset($_SESSION['redirect'])) unset($_SESSION['redirect']);
            header("Location:../index.php"); //http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
            echo "<h1>Login success. Redirecting you to the landing page...</h1>"; // . $_SESSION['username'];
            die();
          }
          break;
        }
      }
    }
    $_SESSION['redirect'] = true;
    header("Location:../login.php");
    echo "<h1>Login failed.</h1><br><h4>Make sure you've <a href=register.php>registered</a> before attempting to login. Redirecting you to the <a href=login.php>login page</a>...</h4>";
    die();
  }

  session_start();
  if(isset($_SESSION['id'])) {
    $salt = '42sq*$d4841jkg4';
    $pw = $_POST['password'];
    unset($_POST['password']);
    validateUser($_POST['username'], $salt.$pw);
  }
?>
  </body>
</html>
