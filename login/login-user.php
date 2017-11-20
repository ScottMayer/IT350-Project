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
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });
      });
    </script>
  </head>

  <body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">E-Chits</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
<li><form class="navbar-form navbar-right" action="#" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Find Chit</button>
      </form>
</li>  
        <li><a href="./AllChits.php">View All Chits</a></li>
        <?php if(isset($_SESSION['username'])) echo "<li><a href=\"./logout.php\">Logout</a></li>"; ?>
</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php
  // include "../nimitz.php";
  // NOTES:
  // - Copied read_users() from nimitz because stopped working
  //   - Working on fixing that so can remove read_users from here
  function read_users(){if($fp=fopen("../admin/users.txt", 'r')){while(($line = fgets($fp)) !== false){if(!isset($_SESSION['users'])){$_SESSION['users'] = array($line);}else{if(in_array($line, $_SESSION['users'])){/*duplicate user*/}else{array_push($_SESSION['users'], $line);}}}fclose($fp);}}

  function validateUser($user, $pass) {
    if($fp=fopen("en-42.csv", 'r')) {
      while($line=fgets($fp)) { // linear traversal through en-42
        $arr = explode(";", $line);

        if($exists=in_array($user, $arr)) { // users is registered
          // check to see if entered password matches registered password
          if(password_verify($pass, $arr[2])) {
            // entered password matches registered password
            $_SESSION['username'] = $user;
            header("Refresh: 3;url=../index.php"); //http://midn.cs.usna.edu/~m183990/IT350/IT350-Project/index.php");
            echo "<h1>Login success. Redirecting you to the landing page...</h1>"; // . $_SESSION['username'];
            die();
          }
          break;
        }
      }
    }
    header("Refresh: 5; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login/login.php");
    echo "<h1>Login failed. Make sure you've registered before attempting to login. Redirecting you to the login page...</h1>";
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
