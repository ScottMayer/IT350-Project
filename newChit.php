<!DOCTYPE html>
<?php require 'includes/php/functions.php'; ?>
<?php require 'includes/php/error.inc.php'; ?>
<?php session_start() ?>
<?php if(!isset($_SESSION['username'])){
  //if username isn't set send them to a login page
  //header("Location: ./login/login.php");
      }
 ?>
<script type="text/javascript">
  function redirect(location){
    window.location = location;
  }
  var i=1;
  var j=1;
</script>

<script type="text/javascript">
  function newRef(){
    i++;
    var x = document.getElementById('ref');
    var inner=x.innerHTML;
    x.innerHTML=inner+"<input type='text' name='Ref' id=Ref"+i+" value='' placeholder=\"Reference "+i+"\"><br>";
  }
  function newVIA(){
    j++;
    var x = document.getElementById('via');
    var inner=x.innerHTML;
    x.innerHTML=(inner+"  "+j+":  <input type='text' class='form-control' id='toName'"+j+" name='toName'"+j+" placeholder='Name'><input type='text' class='form-control' id='toBillet'"+j+" name='toBillet'"+j+" placeholder='Rank'>");
  }

</script>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chits-USNA</title>
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <style> body { font-family: Raleway; } </style>
  </head>
  <body>
<?php
require('nav.inc.php');
nav();
?>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10">
          <div class="page-header">
            <h1><em>Make a New Chit</em></h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 col-md-10 col-sm-offset-1 col-md-offset-1">
          <form class="form-horizontal" name="chit" action="?" method="post">
                   <!-- <th colspan="3">Make Chit</th> -->
                   <br>
                   <!-- <label for="ChitName">Chit Name</label> -->
                   <input type="ChitName" class="form-control" name="ChitName" value="" placeholder="Chit Name">
                   <input type="text" class="form-control" name="des" placeholder="Please enter a brief description of your chit">
                   <br>
                   <strong>Routed To</strong>
                   <!-- <label for="toName">Name:&nbsp;</label> -->

                   <br>

                   <div id="via">
                     <input type="button" value="Add Another Link in the Chain" onclick="newVIA()">
                     <input type="text" class="form-control" id="toName" name="toName" value="" placeholder=Name>
                     <!-- <label for="toBillet">Rank:&nbsp;</label> -->
                     <input type="text" class="form-control" id="toBillet" name="toBillet" value="" placeholder=Rank>


                   </div>




                <strong>Your Information</strong>

                <div class="input-group">
                  <!-- <label for="MIDNname" class="control-label">&nbsp;Name:&nbsp;</label> -->
                  <input type="text" class="form-control" id="MIDNname" name="MIDNname" value="" placeholder=Name>

                  <!-- <label for="MIDNrank" class="control-label">&nbsp;Rank:&nbsp;</label> -->
                   <select class="form-control" id="MIDNrank" name="MIDNrank">
                     <option value="NULL">Select Rank</option>
                     <option value="4">4/C</option>
                     <option value="3">3/C</option>
                     <option value="2">2/C</option>
                     <option value="1">1/C</option>
                   </select>

                  <!-- <label for="MIDNalpha" class="control-label">&nbsp;Alpha:&nbsp;</label> -->
                  <input type="number" class="form-control" id="MIDNalpha" name="MIDNalpha" value="" placeholder=Alpha>
                </div>
                <div class="input-group">
                  <!-- <label for="MIDNclassyr">&nbsp;Graduating Year:&nbsp;</label> -->
                  <select class="form-control" id="MIDNclassyr" name="MIDNclassyr">
                    <option value="NULL">Graduating Year</option>
                    <?php
                      for ($i=2018; $i < 2022; $i++) {echo "<option value='$i'>$i</option>";}
                     ?>
                  </select>

                  <!-- <label for="MIDNcompany">&nbsp;Company:&nbsp;</label> -->
                  <select class="form-control" id="MIDNcompany" name="MIDNcompany">
                    <option value="NULL">Company</option>
                    <?php
                      for ($i=1; $i < 31; $i++) {echo "<option value='$i'>$i</option>";}
                     ?>
                  </select>

                  <!-- <label for="MIDNroom">Room Number:&nbsp;</label> -->
                  <input type="number" class="form-control" id="MIDNroom" name="MIDNroom" value="" placeholder="Room Number">
                </div>
                <div class="input-group">
                  <!-- <label for="MIDNSQPR"> SQPR:&nbsp;</label> -->
                  <input type="number" class="form-control" id="MIDNSQPR" name="MIDNSQPR" value="" placeholder="SQPR">
                  <!-- <label for="MIDNCQPR"> CQPR:&nbsp;</label> -->
                  <input type="number" class="form-control" id="MIDNCQPR" name="MIDNCQPR" value="" placeholder="CQPR">
                  <!-- <label for="MIDNPerf"> Performance Grade:&nbsp;</label> -->

                  <select class="form-control" id="MIDNPerf" name="MIDNPerf">
                    <option value="NULL">Performance</option>
                    <?php
                      for ($i='A'; $i < 'G'; $i++) {echo "<option value='$i'>$i</option>";}
                     ?>
                  </select>
                </div>
                <div class="input-group">
                  <!-- <label for="MIDNCond">Conduct Grade:&nbsp;</label> -->
                  <select class="form-control" id="MIDNCond" name="MIDN">
                    <option value="NULL">Conduct</option>
                    <?php
                      for ($i='A'; $i < 'G'; $i++) {echo "<option value='$i'>$i</option>";}
                     ?>
                    </select>
                </div>

                <label for="MIDNremarks">Remarks</label>
                <textarea name="MIDNremarks" class="form-control" id="MIDNremarks" rows="8" cols="80"></textarea>
                <br>

                <div class="form-group" id="ref">
                  <label for="Ref">References: &nbsp;</label><br>
                  <input type="button" name="Add Another Reference" value="Add Another Reference" onclick="newRef()"> <br>


                     <input type="text" name="Ref" id="Ref1" value="" placeholder="Reference 1"><br>

                </div>

                    <!-- <input type="hidden" name="AlltheData" value="AlltheData"> -->
                    <input type="submit" name="submit" value="Submit">




          </form>
        </div>
      </div>
    </div>
    <?php
      if ($_SERVER['REQUEST_METHOD']==='POST'){
        $chit=$_POST;
        $author="default";
        if (isset($_SESSION['username'])) {
          $author=$_SESSION['username'];
        }

        $name=$_POST['ChitName'];
        writeChit($author, $name, $chit);
      }
     ?>
  </body>

</html>
