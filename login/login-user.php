<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Action</title>
  </head>

  <body>
<?php
  include "../nimitz.php";
  // NOTES:
  // - Copied read_users() from nimitz because stopped working
  //   - Working on fixing that so can remove read_users from here
  // function read_users(){if($fp=fopen("../admin/users.txt", 'r')){while(($line = fgets($fp)) !== false){if(!isset($_SESSION['users'])){$_SESSION['users'] = array($line);}else{if(in_array($line, $_SESSION['users'])){/*duplicate user*/}else{array_push($_SESSION['users'], $line);}}}fclose($fp);}}

  function validateUser($user) {
    read_users(); // get /admin/users.txt

    if(isset($_SESSION['users'])) {
      for($i=0; $i<count($_SESSION['users']); $i++) {
        // Checks for the username in /admin/users.txt
        $res = strcmp(trim($_SESSION['users'][$i]), $user);
        if($res == 0) {
          $_SESSION['username'] = $user;
          header("Refresh: 5; url=http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
          echo "Login success. Redirecting you to the landing page...";
          die();
        }
      }
    } else {
      echo "Error: /admin/users.txt not read correctly<br>";
    }

    // if the input username was not in /admin/users.txt
    header("Refresh: 5; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login/login.php");
    echo "Login failed. Make sure you've registered before attempting to login. Redirecting you to the login page...";
    die();
  }

  session_start();
  if(isset($_SESSION['id'])) {
    // echo $_SESSION['id'] . "<br>";
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['pw'] = $_POST['password'];
    // echo "Username: " . $_SESSION['user'] . "<br>Password: " . $_SESSION['pw'] . "<br>";

    validateUser($_SESSION['user']); // See if username is in /admin/users.txt
  }
?>
  </body>
</html>
