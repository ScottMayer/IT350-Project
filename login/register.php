<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>E-Chits Account Registration</title>
  </head>

  <body>
    <h1>E-Chits Login Register</h1>
    <form method=post action="register-user.php" id=reg-form>
      Email:    <input type=email name=email> <br>
      Username: <input type=text name=username required> <br>
      Password: <input type=password name=password required> <br>
      <button type=submit form=reg-form value=Register>Register</button>
    </form>

    <!-- JavaScript for client-side to ensure user inputs password twice, both match, before submitting -->

  </body>
</html>
