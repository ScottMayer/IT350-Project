<!DOCTYPE html>
<?php
  session_start();
  $_SESSION['id'] = session_id();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>

  <body>
    <h1>E-Chits Login</h1>
    <form method=post action=login-user.php id=form1>
      Username: <input type=text name=username> <br>
      Password: <input type=password name=password> <br>
      <button type=submit form=form1 value=Login>Login</button>
    </form>

  </body>
</html>
