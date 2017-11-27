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
// include "login-user.php";

// PLAN ON REMOVING THE OPTION TO ALLOW USERS TO CREATE OWN USERNAME. ONLY
// TAKE EMAIL AND PASSWORD AS INPUTS SO EACH EMAIL CAN ONLY REGISTER ONCE AND
// NOT HAVE MULTIPLE USERNAMES

function noneofyourbusiness($string) {
  $salt = '42sq*$d4841jkg4';
  return password_hash($salt . $string, PASSWORD_BCRYPT);
}

  if($fp = fopen("en-42.csv","r+")) {
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
    }

    if(!$exists) { // if there is no registered email
      $arr[0] = $user;
      $arr[1] = "other";
      $arr[3] = $email;
    }
    fwrite($fp, $arr[0].';'.$arr[1].';'.$pass.';'.$arr[3]);

    header("Refresh: 3; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login");
    echo "<h1>Registration success! Redirecting to login...</h1>";
  } else {
    header("Refresh: 3; url=http://midn.cs.usna.edu/~m197116/IT350/IT350-Project/login/register.php");
    echo "<h1>Error: fopen failed, failed to register\n</h1>";
  }

  fclose($fp);
  die();
?>
  </body>
</html>
