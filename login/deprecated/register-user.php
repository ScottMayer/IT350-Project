<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>E-Chit Register</title>
  </head>

  <body>
<?php
// include "login-user.php";
//
// PLAN ON REMOVING THE OPTION TO ALLOW USERS TO CREATE OWN USERNAME. ONLY
// TAKE EMAIL AND PASSWORD AS INPUTS SO EACH EMAIL CAN ONLY REGISTER ONCE AND
// NOT HAVE MULTIPLE USERNAMES

function noneofyourbusiness($string) {
  $salt = '42sq*$d4841jkg4';
  return password_hash($salt . $string, PASSWORD_BCRYPT);
}

if($fp = fopen("en-42.csv","r+")) {
  // echo "fopen success";

  $email=$_POST['email'];
  $user=$_POST['username'];
  $pass=noneofyourbusiness($_POST['password']);

  // echo "salted and hashed<br>";

  // echo $email . ' ' . $user . ' ' . $pass . ' ' . $_POST['password'] . '<br>';
  unset($_POST['password']);
  // echo $email . ' ' . $user . ' ' . $pass . ' ' . $_POST['password'] . '<br>';

  // If $user is in $fp
  //   change the third field to $pass
  // Else
  //   add a newline => $user::other::$pass::email

  // echo "1";
  while($line=fgets($fp)) { // linear traversal through en-42
    $arr = explode(";", $line);

    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";

    if($exists=in_array($user, $arr)) {
      fseek($fp, -strlen($line), SEEK_CUR);
      // fwrite($fp, $arr[0].';'.$arr[1].';'.$pass.';'.$arr[3]."\n");
      break;
    }
  }
  // echo "2";

  if(!$exists) {
    $arr[0] = $user;
    $arr[1] = "other";
    $arr[3] = $email;
  }
  fwrite($fp, $arr[0].';'.$arr[1].';'.$pass.';'.$arr[3]);

  header("Refresh: 5; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login");
  echo "Registration success! Redirecting to login...";
} else {
  header("Refresh: 5; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login/register.php");
  echo "Error: fopen failed, failed to register\n";
}
fclose($fp);
die();
?>
  </body>
</html>
