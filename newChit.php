<!DOCTYPE html>
<?php require 'includes/php/functions.php'; ?>
<?php require 'includes/php/error.inc.php'; ?>
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
</script>

<script type="text/javascript">
  function newRef(){
    i++;
    var x = document.getElementById('ref');
    var inner=x.innerHTML;
    x.innerHTML=inner+"  "+i+":<input type='text' name='Ref' id=Ref"+i+" value=''>  ";
  }
  // function newVIA(){
  //   i++;
  //   var x = document.getElementById('via');
  //   var inner=x.innerHTML;
  //   x.innerHTML=(inner+"  "+i+":<input type='text' name='via' id=VIA"+i+" value=''>  ");
  // }

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



                  <th colspan="3">Make Chit</th>




                   <label for="ChitName">Chit Name</label>
                   <input type="ChitName" name="ChitName" value="">


                  <strong>Routed To</strong>


                   <label for="toName">Name:&nbsp;</label>
                   <input type="text" class="form-control" id="toName" name="toName" value="">
                   <label for="toBillet">Rank:&nbsp;</label>
                   <input type="text" class="form-control" id="toBillet" name="toBillet" value="">


                  <td colspan="3"><strong>Your Information</strong>

                <div class="input-group">

                     <label for="MIDNname" class="control-label">&nbsp;Name:&nbsp;</label>
                     <input type="text" class="form-control" id="MIDNname" name="MIDNname" value="">
                     <label for="MIDNrank" class="control-label">&nbsp;Rank:&nbsp;</label>

                      <select class="form-control" id="MIDNrank" name="MIDNrank">
                            <option value="NULL"></option>
                            <option value="4">4/C</option>
                            <option value="3">3/C</option>
                            <option value="2">2/C</option>
                            <option value="1">1/C</option>
                          </select>

                     <label for="MIDNalpha" class="control-label">&nbsp;Alpha:&nbsp;</label>
                     <input type="number" class="form-control" id="MIDNalpha" name="MIDNalpha" value="">

                </div>
                <div class="input-group">

                     <label for="MIDNclassyr">&nbsp;Graduating Year:&nbsp;</label>

                      <select class="form-control" id="MIDNclassyr" name="MIDNclassyr">
                          <option value="NULL"></option>
                          <?php
                            for ($i=2018; $i < 2022; $i++) {echo "<option value='$i'>$i</option>";}
                           ?>
                        </select>

                     <label for="MIDNcompany">&nbsp;Company:&nbsp;</label>

                      <select class="form-control" id="MIDNcompany" name="MIDNcompany">
                          <option value="NULL"></option>
                          <?php
                            for ($i=1; $i < 31; $i++) {echo "<option value='$i'>$i</option>";}
                           ?>
                        </select>

                     <label for="MIDNroom">Room Number:&nbsp;</label>
                     <input type="number" class="form-control" id="MIDNroom" name="MIDNroom" value="">

                </div>
                <div class="input-group">

                     <label for="MIDNSQPR"> SQPR:&nbsp;</label>
                     <input type="number" class="form-control" id="MIDNSQPR" name="MIDNSQPR" value="">
                     <label for="MIDNCQPR"> CQPR:&nbsp;</label>
                     <input type="number" class="form-control" id="MIDNCQPR" name="MIDNCQPR" value="">
                     <label for="MIDNPerf"> Performance Grade:&nbsp;</label>

                      <select class="form-control" id="MIDNPerf" name="MIDNPerf">
                          <option value="NULL"></option>
                          <?php
                            for ($i='A'; $i < 'G'; $i++) {echo "<option value='$i'>$i</option>";}
                           ?>
                        </select>


                </div>
                <div class="input-group">

                     <label for="MIDNCond">Conduct Grade:&nbsp;</label>

                      <select class="form-control" id="MIDNCond" name="MIDN">
                          <option value="NULL"></option>
                          <?php
                            for ($i='A'; $i < 'G'; $i++) {echo "<option value='$i'>$i</option>";}
                           ?>
                        </select>


                </div>

                   <label for="MIDNremarks">Remarks</label>
                   <textarea name="MIDNremarks" class="form-control" id="MIDNremarks" rows="8" cols="80"></textarea>


                   <br>

                <div class="form-group" id="ref">

                     <label for="Ref">References: &nbsp;</label>
                     <input type="button" name="Add Another Reference" value="Add Another Reference" onclick="newRef()">


                     1:&nbsp; <input type="text" name="Ref" id="Ref1" value="">

                </div>
                <!-- <div class="form-group" id="VIA">

                     <label for="VIA">VIA:</label>


                     <input type="button" name="Add Another Lj" value="" onclick="newRef()">

                </div> -->

                    <input type="hidden" name="AlltheData" value="AlltheData">
                    <input type="submit" name="submit" value="Submit">




          </form>
        </div>
      </div>
    </div>
    <?php
      if ($_SERVER['REQUEST_METHOD']==='POST'){
        $Serializedchit=$_POST('AlltheData');
        $author=$_SESSION('username');
        $name=$_POST['ChitName'];
        writeChit($author, $name, $serChit);
      }
     ?>
  </body>

</html>
