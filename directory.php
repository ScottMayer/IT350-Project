<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Chit-USNA</title>
    <link rel="icon" href="./imgs/icon.ico"/>

    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="default.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
          $('#sidebar').toggleClass('active');
        });
      });
    </script>

  </head>
  <body>
    <div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>File structure</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<ul>
						<li><a href="directory.php">Directory (This page)</a></li>
						<li><a href="generate_pdf.php">Generate PDF</a></li>
						<li><a href="index.php">Index.php</a></li>
						<li><a href="newChit.php">New Chit</a></li>
						<li><a href="viewchits.php">View my Chits</a></li>
						<li><a href="./login/login.php">Login</a></li>
						<li><a href="./login/register.php">Register</a></li>
					</ul>
				</div>
			</div>
		</div>

    <nav class="navbar navbar-default navbar-fixed-bottom ">
      <div class="container-fluid ">
        <li><a href="../../default.html">View All Chits</a></li>
        <li>You are currently logged in as: USERNAME</li>
      </div>
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>New Chit</li>
      </ol>
    </nav>
  </body>

</html>
