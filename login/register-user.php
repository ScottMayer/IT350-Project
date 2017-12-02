<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Chit Register</title>
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
// include "login-user.php";

// PLAN ON REMOVING THE OPTION TO ALLOW USERS TO CREATE OWN USERNAME. ONLY
// TAKE EMAIL AND PASSWORD AS INPUTS SO EACH EMAIL CAN ONLY REGISTER ONCE AND
// NOT HAVE MULTIPLE USERNAMES

function noneofyourbusiness($string) {
  $salt = '42sq*$d4841jkg4';
  return password_hash($salt . $string, PASSWORD_BCRYPT);
}

  if($fp = fopen("en-42.csv","r+")) {
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email=$_POST['email'];
    $user=$_POST['username'];
    $pass=noneofyourbusiness($_POST['password']);
    unset($_POST['password']);

    while($line=fgets($fp)) { // linear traversal through en-42
      $arr = explode(";", $line);
      if($exists=in_array($email, $arr)) { // if there is already a registered email, then backtrack
        fseek($fp, -strlen($line), SEEK_CUR);
        break;
      } 
      elseif(in_array($user, $arr)) {
        header("Location:./login.php");
        echo "<h1>Username exists!</h1>";
        die();
      }
    }

    if(!$exists) { // if there is no registered email
      $arr[0] = $user;
      $arr[1] = "other";
      $arr[3] = $email;
      $arr[4] = $first;
      $arr[5] = $last;
    }
    fwrite($fp, $arr[0].';'.$arr[1].';'.$pass.';'.$arr[3] .';'.$arr[4].';'.$arr[5]);

    header("Location:.");
    echo "<h1>Registration success! Redirecting to login...</h1>";
  } else {
    header("Location:./register.php");
    echo "<h1>Error: fopen failed, failed to register\n</h1>";
  }

  fclose($fp);
  die();
?>
  </body>
</html>
