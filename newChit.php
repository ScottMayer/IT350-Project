<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Chit-USNA</title>
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
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="page-header">
            <h1><em>Make a New Chit</em></h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <form class="form-horizontal" action="?" method="post">
              <table>
                <thead>
                  <tr>
                      <th colspan="3">Make Chit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td colspan="2"><strong>Routed To</strong></td>
                  </tr>
                  <tr>
                      <td><label for="toName">Name:&nbsp;</label></td>
                      <td><input type="text" class="form-control" id="toName" name="toName" value=""></td>
                      <td><label for="toBillet">&nbsp;Rank:&nbsp;</label></td>
                      <td><input type="text" class="form-control" id="toBillet" name="toBillet" value=""></td>
                    </tr>
                  <tr></tr>
                  <tr>
                      <td><strong>Your Information</strong></td>
                  </tr>
                  <tr>
                      <td><label for="MIDNname" class="control-label">&nbsp;Name:&nbsp;</label></td>
                      <td><input type="text" class="form-control" id="MIDNname" name="MIDNname" value=""></td>
                      <td><label for="MIDNrank" class="control-label">&nbsp;Rank:&nbsp;</label></td>
                      <td>
                        <select class="form-control" id="MIDNrank" name="MIDNrank">
                          <option value="NULL"></option>
                          <option value="4">4/C</option>
                          <option value="3">3/C</option>
                          <option value="2">2/C</option>
                          <option value="1">1/C</option>
                        </select>
                      </td>
                      <td><label for="MIDNalpha" class="control-label">&nbsp;Alpha:&nbsp;</label></td>
                      <td><input type="number" class="form-control" id="MIDNalpha" name="MIDNalpha" value=""></td>
                  </tr>
                  <tr>
                    <td><label for="MIDNclassyr">&nbsp;Graduating Year:&nbsp;</label></td>
                    <td>
                      <select class="form-control" id="MIDNclassyr" name="MIDNclassyr">
                        <option value="NULL"></option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                      </select>
                    </td>
                    <td><label for="MIDNcompany">&nbsp;Company:&nbsp;</label></td>
                    <td>
                      <select class="form-control" id="MIDNcompany" name="MIDNcompany">
                        <option value="NULL"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                      </select>
                    </td>
                    <td><label for="MIDNroom">&nbsp;Room Number:&nbsp;</label></td>
                    <td><input type="number" class="form-control" id="MIDNroom" name="MIDNroom" value=""></td>
                  </tr>
                  <tr>
                    <td><label for="MIDNSQPR">&nbsp; SQPR:&nbsp;</label></td>
                    <td><input type="number" class="form-control" id="MIDNSQPR" name="MIDNSQPR" value=""></td>
                    <td><label for="MIDNCQPR">&nbsp; CQPR:&nbsp;</label></td>
                    <td><input type="number" class="form-control" id="MIDNCQPR" name="MIDNCQPR" value=""></td>
                    <td><label for="MIDNPerf">&nbsp; Performance Grade:&nbsp;</label></td>
                    <td><input type="text" class="form-control" id="MIDNPerf" name="MIDNPerf" value=""></td>
                  </tr>
                  <tr>
                    <td><label for="MIDNremarks">Remarks</label></td>
                    <td><textarea name="MIDNremarks" class="form-control" id="MIDNremarks" rows="8" cols="80"></textarea></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="button" name="submit" value="submit">
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
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
