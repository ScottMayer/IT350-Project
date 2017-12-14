<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Chits Account Registration</title>
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./imgs/icon.ico"/>

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
    <form method=post action="login/register-user.php" id=reg-form onsubmit="return inputCheck(this)">
      <div class=well>
        <h1>E-Chits Register</h1>
        <input type=text class=form-control name=firstname placeholder="First name" required>
        <input type=text class=form-control name=lastname placeholder="Last name" required>
        <input type=email class=form-control name=email placeholder="Email" required>
        <input type=text class=form-control name=username placeholder="Username" required>
        <input type=password class=form-control name=password placeholder="Password" required>

        <!-- <a href=login.php><button type=button>Login</button></a> -->
        <!-- <button type=button class="btn btn-default" onclick="window.location.href='./login.php'">Login</button> -->
        <button type=submit class="btn btn-default" id=register-button form=reg-form value=Register>Register</button>
        <!-- <button type=button class="btn btn-default" onclick="window.location.href='./change.php'">Change password</button> -->
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
      <div class="alert alert-danger" id=error style="visibility:hidden;"></div>
    </form>

    <!-- Client-side check  -->
    <script type=text/javascript>
      function inputCheck($form) {
        if($form.elements['username'].value.indexOf(" ") != -1 || $form.elements['username'].value.indexOf("-") != -1) {
          // alert("Username should not contain \" \" or \"-\"!");
          document.getElementById("error").innerHTML = "Username should not contain \" \" or \"-\"!";
          document.getElementById("error").style.visibility = "visible";
          return false;
        } else if($form.elements['email'].value.indexOf("@usna.edu") == -1) { // email not in usna.edu domain
          document.getElementById("error").innerHTML = "Email not in USNA domain!";
          document.getElementById("error").style.visibility = "visible";
          return false;
        }
        return true;
      }

      // document.getElementById("register-button").focus();
    </script>
  </div>

  </body>
</html>
