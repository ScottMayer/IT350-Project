<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Action</title>
  </head>

  <body>
<?php
  include "nimitz.php";

  function validateUser($user) {
    read_users(); // get /admin/users.txt

    if(isset($_SESSION['users'])) {
      // echo "> SESSION['users'] set<br>";
      // echo "<pre>";
      // print_r($_SESSION['users']);
      // echo "</pre>";

      for($i=0; $i<count($_SESSION['users']); $i++) {
        // echo ">$i: '" . $_SESSION['users'][$i] . "','" . $user ."'<br>";

        $res = strcmp(trim($_SESSION['users'][$i]), $user);
        if($res == 0) {
          // ob_start();
          //   echo "Login success. Redirecting you to the landing page...";
          //   ob_end_flush();
          //   flush();
          //   usleep(5000000);
          //   header("Location: http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
          //   die();

          $_SESSION['username'] = $user;
          header("Refresh: 5; url=http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
          echo "Login success. Redirecting you to the landing page...";
          die();
        } 
        // else {
        //   echo ">$i MATCH: FALSE $res<br>";
        // }
      }
    } else {
      echo "Error: /admin/users.txt not read correctly<br>";
    }

    // ob_start();
    //       echo "Login failed. Redirecting you to the login page...";
    //       ob_end_flush();
    //       flush();
    //       usleep(5000000);
    //       header("Location: /~m197116/IT350/IT350-Project/login.php");
    //       die();
    echo "Login failed. Redirecting you to the login page...";
  }

  session_start();
  if(isset($_SESSION['id'])) {
    // echo $_SESSION['id'] . "<br>";
    //
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['pw'] = $_POST['password'];
    // echo "Username: " . $_SESSION['user'] . "<br>Password: " . $_SESSION['pw'] . "<br>";

    validateUser($_SESSION['user']); // See if username is in /admin/users.txt
  }
?>
  </body>
</html>
