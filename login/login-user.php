<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Action</title>
  </head>

  <body>
<?php
  // include "../nimitz.php";
  // NOTES:
  // - Copied read_users() from nimitz because stopped working
  //   - Working on fixing that so can remove read_users from here
  function read_users(){if($fp=fopen("../admin/users.txt", 'r')){while(($line = fgets($fp)) !== false){if(!isset($_SESSION['users'])){$_SESSION['users'] = array($line);}else{if(in_array($line, $_SESSION['users'])){/*duplicate user*/}else{array_push($_SESSION['users'], $line);}}}fclose($fp);}}

  function noneofyourbusiness($string) {
    $salt = '42sq*$d4841jkg4';
    return password_hash($salt . $string, PASSWORD_BCRYPT);
  }

  function validateUser($user, $pass) {
    if($fp=fopen("en-42.csv", 'r')) {
      while($line=fgets($fp)) { // linear traversal through en-42
        $arr = explode(";", $line);

        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";

        if($exists=in_array($user, $arr)) { // users is registered
          // check to see if entered password matches registered password
          // echo noneofyourbusiness($pass);
          if(password_verify($pass, $arr[2])) {
            // entered password matches registered password
            header("Refresh: 3;url=http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
            echo "Login success. Redirecting you to the landing page...";
            die();
          }
          break;
        }
      }

      //   // read_users(); // get /admin/users.txt
      //   // echo "<pre>";
      //   // print_r($_SESSION['users']);
      //   // echo "</pre>";

      //   // admin users read into $_SESSION['users'] correctly
      //   if(isset($_SESSION['users'])) {
      //     for($i=0; $i<count($_SESSION['users']); $i++) {
      //       // Checks for the username in /admin/users.txt
      //       echo $_SESSION['users'][$i] . "<br>";
      //       $res = strcmp(trim($_SESSION['users'][$i]), $user);
      //       if($res == 0) {
      //         $_SESSION['username'] = $user;
      //         //header("Refresh: 3;url=http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
      //         echo "Login success. Redirecting you to the landing page...";
      //         die();
      //       }
      //     }
      //   } else {
      //     echo "Error: /admin/users.txt not read correctly<br>";
      //   }

      // // if the input username was not in /admin/users.txt <-- for admin login
    }

    header("Refresh: 5; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login/login.php");
    echo "Login failed. Make sure you've registered before attempting to login. Redirecting you to the login page...";
    die();
  }

  session_start();
  if(isset($_SESSION['id'])) {
    $salt = '42sq*$d4841jkg4';
    // echo $_SESSION['id'] . "<br>";

    // $_SESSION['password'] = password_hash('42sq*$d4841jkg4' . $_SESSION['pw'] . $_SESSION['user'] . 'johncena');
    // $_SESSION['password'] = password_hash( $salt . $_POST['password'], PASSWORD_BCRYPT);
    // $_SESSION['password'] = noneofyourbusiness($_POST['password']);

    // $result = password_verify($salt . $_POST['password'], $_SESSION['password']);

    // echo "\$_SESSION['password']: ".$_SESSION['password']."<br>";
    $pw = $_POST['password'];
    // echo "\$_POST['password']: "   .$_POST['password'] . "<br>";
    unset($_POST['password']);
    // echo "Username: " . $_POST['username'] . "<br>Password: " . $_POST['password'] . "<br>";

    $result = validateUser($_POST['username'], $salt.$pw, noneofyourbusiness($pw));

    // unset($_POST['password']);
    if($result){ echo "password_verify() success"; }else{ echo "password_verify() fail"; } echo "<br>";

    // validateUser($_POST['username'], $_SESSION['password']); // See if username and password match
  }
?>
  </body>
</html>
