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
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });
      });
    </script>
  </head>

  <body>
<?php
  require('../nav.inc.php');
  nav(1);
?>
    <h1>E-Chits Login Register</h1>
    <form method=post action="register-user.php" id=reg-form>
      First name: <input type=text name=firstname required> <br>
      Last name: <input type=text name=lastname required> <br>
      User email: <input type=email name=email required> <br>
      Username: <input type=text name=username required> <br>
      Password: <input type=password name=password required> <br>
      <button type=submit form=reg-form value=Register>Register</button>
    </form>

    <!-- JavaScript for client-side to ensure user inputs password twice, both match, before submitting -->

  </body>
</html>
