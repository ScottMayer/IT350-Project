<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Chits Change Password</title>
    <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
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

  function noneofyourbusiness($string) {
    $salt = '42sq*$d4841jkg4';
    return password_hash($salt . $string, PASSWORD_BCRYPT);
  }

  session_start();
  unset($_SESSION['error']);

  if($fp = fopen("en-42.csv","r+")) {
    $user=$_POST['username'];
    $cur_pass=noneofyourbusiness($_POST['cur_pass']);
    $new_pass=noneofyourbusiness($_POST['new_pass']);
    unset($_POST['username']);
    unset($_POST['cur_pass']);
    unset($_POST['new_pass']);

    while($line=fgets($fp)) { // linear traversal through en-42

      $arr = explode(";", $line);

      if($exists=in_array($user, $arr)) { // if user exists
        fseek($fp, -strlen($line), SEEK_CUR); // then backtrack in file to beginning of entry

        if(password_verify($cur_pass, $arr[2])) { // if current password does not match, then set $_SESSION['error']
          $_SESSION['error'] = "Entered password does not match!"; // . $cur_pass . "<br>" . $arr[2];
          break;
        } else { // else current password matches, rewrite the entry with the new password
          fwrite($fp, $arr[0].';'.$arr[1].';'.$new_pass.';'.$arr[3] .';'.$arr[4].';'.$arr[5]);
          break;
        }
      }
    }

    if(!$exists) { $_SESSION['error'] = "User does not exist!"; }

    if(isset($_SESSION['error'])) {
      header("Location:../change.php");
      echo "<h1>Error: Password change failed, redirecting to previous page...</h1>";
      die();
    }

    header("Location:../login.php");
    echo "<h1>Password change success. Redirecting to login page...</h1>";
  } else {
    header("Location:../change.php");
    echo "<h1>Error: fopen failed, failed to change password\n</h1>";
  }

  fclose($fp);
  die();
?>
  </body>
</html>
