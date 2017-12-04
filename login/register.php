<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Chits Account Registration</title>
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

    <style>
      .center-div {
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 300px;
        height: 300px;
      }

    </style>
  </head>

  <body>
<?php
  require('../nav.inc.php');
  nav(1);
?>
  <div class="center-div">
    <h1>E-Chits Register</h1>
    <form method=post action="register-user.php" id=reg-form>
      <input type=text class=form-control name=firstname placeholder="First name" required> 
      <input type=text class=form-control name=lastname placeholder="Last name" required> 
      <input type=email class=form-control name=email placeholder="Email" required> 
      <input type=text class=form-control name=username placeholder="Username" required> 
      <input type=password class=form-control name=password placeholder="Password" required> 
      <a href=login.php><button type=button>Login</button></a>
      <button type=submit form=reg-form value=Register>Register</button>
    </form>
    <!-- JavaScript for client-side to ensure user inputs password twice, both match, before submitting -->
  </div>

  </body>
</html>
