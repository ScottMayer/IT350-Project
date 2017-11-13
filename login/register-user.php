<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>

  <body>
<?php
include "login-user.php";

if($fp = fopen("en-42","w+")) {
  $user=$_POST['username'];
  $pass=noneofyourbusiness($_POST['password']);
  unset($_POST['password']);

  if $user is in $fp
    change the third field to $pass
  else
    add a newline => $user::other::$pass::email

} else {
  echo "Error: failed to register\n";
}
fclose($fp);
?>
  </body>
</html>
