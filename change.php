<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="./imgs/icon.ico"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Chits Account Change Password</title>
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <style>
      .center-div {
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 331px;
        height: 300px;
      }
      h1, body {
        font-family: Raleway;
      }
    </style>
  </head>
  <body>
<?php
  require('nav.inc.php');
  nav(1);
?>
  <div class="center-div">
      <form method=post action="login/change-pw.php" id=change-form onsubmit="return check(this)">
        <div class=well>
          <h1>E-Chits Change Password</h1>
          <input type=text class=form-control name=username placeholder="Username" required>
          <input type=password class=form-control name=cur_pass placeholder="Current password" required>
          <input type=password class=form-control name=new_pass placeholder="New password" required>
          <input type=password class=form-control name=chk_pass placeholder="Re-enter new password" required>

          <!-- <button type=button class="btn btn-default" onclick="window.location.href='./login.php'">Login</button> -->
          <!-- <button type=button class="btn btn-default" onclick="window.location.href='./register.php'">Register</button> -->
          <button type=submit class="btn btn-default" id=change-button form=change-form value=Change>Change password</button>
        </div>
        <?php
          session_start();
          if(isset($_SESSION['error'])) {
            echo "<div class=\"alert alert-danger\" id=error>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
          } else if(isset($_SESSION['success'])) {
            echo "<div class=\"alert alert-success\">".$_SESSION['success']."</div>";
            unset($_SESSION['success']);
          }
         ?>
        <div class="alert alert-danger" id=errormsg style="visibility:hidden;"></div>
      </form>
      <script type=text/javascript>
        function check(formElement) {
          var res = formElement.elements['new_pass'].value == formElement.elements['chk_pass'].value;
          if(!res) {
            document.getElementById("errormsg").innerHTML = "New passwords do not match!";
            document.getElementById("errormsg").style.visibility = "visible";
          }
          return res;
        }
      </script>
  </div>
  </body>
</html>
