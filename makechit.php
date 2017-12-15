<!DOCTYPE html>
<?php session_start();
  if (!isset($_SESSION['username'])) {
      //if username isn't set send them to a login page
      header("Location: ./login.php");
  }
 ?>
<script type="text/javascript">
  function redirect(location){
    window.location = location;
  }
</script>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Make Chit</title>
    <link rel="icon" href="./imgs/icon.ico"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="style.css" /> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <style>
    .box {
      padding: 0;
      border: 1px solid #000000 !important;
      margin: 0;
    }

    .courier{
      font-family: "Courier New", Courier, monospace;
    }

    </style>
  </head>
  <body>
<?php
require('nav.inc.php');
require('includes/php/myCSVlib.php');
require_once("nimitz.php");
require_once("error.inc.php");
nav();
// session_destroy();
// $_POST = array();
// $_REQUEST = array();
// die;

$debug = false;
// $debug = true;

if(!isset($_SESSION['visit'])){
  $_SESSION['visit'] = true;
}
else{
  $_SESSION['visit'] = false;
}

$_SESSION['submitted']=0;
?>
<div class="container">




  <div id="banner">

  </div>

  <?php
    function validateusername($username){
      //get user file
      //read in the csv serverside(security) as a 2D array
      //uname is first item on line so, if !isset(users[$uname])=> user does not exist
      //STATUS: THIS WORKS AS OF 1830 14DEC17
      $filename="login/en-42.csv";
      $users=read_csv($filename);
      if (!isset($users[$username])) {
        echo "<div class=\"alert alert-warning\">WARNING <em>$username IS NOT A REGISTERED USER</em></div>";
        return False;
      }
      else {
        return True;
      }
    }

    function validateCOC(){
      //validates given usernames
      //IF THE USERNAME IS SET, THE NAME IS NOT EMPTY, AND NONE OF THE OTHER NAMES HAVE FAILED
      //STATUS: THIS WORKS AS OF 1830 14DEC17
        if (isset($_POST['COC_1_USERNAME']) && !empty($_POST['COC_1_USERNAME'])) {
          $success=validateusername($_POST['COC_1_USERNAME']);
        }if (isset($_POST['COC_2_USERNAME']) && !empty($_POST['COC_2_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_2_USERNAME']);
        }if (isset($_POST['COC_3_USERNAME']) && !empty($_POST['COC_3_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_3_USERNAME']);
        }if (isset($_POST['COC_4_USERNAME']) && !empty($_POST['COC_4_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_4_USERNAME']);
        }if (isset($_POST['COC_5_USERNAME']) && !empty($_POST['COC_5_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_5_USERNAME']);
        }if (isset($_POST['COC_6_USERNAME']) && !empty($_POST['COC_6_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_6_USERNAME']);
        }if (isset($_POST['COC_7_USERNAME']) && !empty($_POST['COC_7_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_7_USERNAME']);
        }if (isset($_POST['COC_8_USERNAME']) && !empty($_POST['COC_8_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_8_USERNAME']);
        }if (isset($_POST['COC_9_USERNAME']) && !empty($_POST['COC_9_USERNAME']) && $success) {
          $success=validateusername($_POST['COC_9_USERNAME']);
        }
        return $success;
    }

  ?>

<?php
if($debug){
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
}

//IF EVERYTHING IS SET AND COC VALIDATES
//STATUS:  PERMISSIONS are weird
if(
    isset($_POST['SHORT_DESCRIPTION']) && isset($_POST['TO_RANK']) && isset($_POST['TO_NAME']) && isset($_POST['TO_SERVICE']) && isset($_POST['TO_BILLET']) && isset($_POST['FROM_CLASS']) && isset($_POST['FROM_FIRST_NAME']) && isset($_POST['FROM_LAST_NAME']) && isset($_POST['FROM_ALPHA']) && isset($_POST['FROM_CLASS_YEAR']) && isset($_POST['FROM_COMPANY']) && isset($_POST['FROM_ROOM_NUMBER']) && isset($_POST['FROM_RANK']) && isset($_POST['REFERENCE']) && isset($_POST['SQPR']) && isset($_POST['CQPR']) && isset($_POST['APTITUDE_GRADE']) && isset($_POST['CONDUCT_GRADE']) && isset($_POST['REQUEST_TYPE']) && isset($_POST['ADDRESS_1']) && isset($_POST['ADDRESS_2']) && isset($_POST['ADDRESS_3']) && isset($_POST['REMARKS']) && isset($_POST['DATE']) && isset($_POST['BEGIN_DATE_TIME']) && isset($_POST['END_DATE_TIME']) && isset($_POST['COC_1_BILLET']) && isset($_POST['COC_1_NAME']) && isset($_POST['COC_1_USERNAME']) && validateCOC() ){

      if(!is_file("./chits/directory.txt")){

        $contents = '';

        file_put_contents("./chits/directory.txt", $contents);

      }

      $count = 1;
      $filename = "./chits/" . $_SESSION['username'] . "_chit" . $count . ".txt";

      while(is_file($filename)){
        $count += 1;
        $filename = "./chits/" . $_SESSION['username'] . "_chit" . $count . ".txt";

      }

      $data = serialize($_POST);
      file_put_contents($filename, $data);

      $fp = fopen("./chits/directory.txt", "a");

      if($fp){
        $out = $_SESSION['username'] . "," . $_SESSION['username'] . "_chit" . $count . ".txt,";

        if(isset($_POST['COC_1_USERNAME']) && !empty($_POST['COC_1_USERNAME'])){
          $out = $out . "{$_POST['COC_1_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_2_USERNAME']) && !empty($_POST['COC_2_USERNAME'])){
          $out = $out . "{$_POST['COC_2_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_3_USERNAME']) && !empty($_POST['COC_3_USERNAME'])){
          $out = $out . "{$_POST['COC_3_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_4_USERNAME']) && !empty($_POST['COC_4_USERNAME'])){
          $out = $out . "{$_POST['COC_4_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_5_USERNAME']) && !empty($_POST['COC_5_USERNAME'])){
          $out = $out . "{$_POST['COC_5_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_6_USERNAME']) && !empty($_POST['COC_6_USERNAME'])){
          $out = $out . "{$_POST['COC_6_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_7_USERNAME']) && !empty($_POST['COC_7_USERNAME'])){
          $out = $out . "{$_POST['COC_7_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_8_USERNAME']) && !empty($_POST['COC_8_USERNAME'])){
          $out = $out . "{$_POST['COC_8_USERNAME']}" . "-0 ";
        }
        if(isset($_POST['COC_9_USERNAME']) && !empty($_POST['COC_9_USERNAME'])){
          $out = $out . "{$_POST['COC_9_USERNAME']}" . "-0 ";
        }

        $out = $out . "0," . "{$_POST['SHORT_DESCRIPTION']}" . "\n";

        fwrite($fp, $out);

        fclose($fp);
      }
      $_SESSION['submitted']=0;
      echo "<div class=\"alert alert-success\">Success! Chit has been submitted!</div>";
      $_SESSION['filename']=$_SESSION['username'] . "_chit" . $count . ".txt";

      //THIS ECHOS A JAVASCRIPT FUNCTION INVOCATION TO REDIRECT TO A READ-ONLY COPY OF THE SUBMITTED CHIT
      echo "<script type='text/javascript'>redirect('viewchit.php')</script>";
    }
    else{
      if(!($_SESSION['submitted']==0)){
        echo "<div class=\"alert alert-warning\">All fields must be filled out!</div>";
      }
      $_SESSION['submitted']=1;
    }

    ?>



  <form  class="courier" role="form" action="?" method="post">


    <div class="row" style="border: 1px solid #000000">
      <div class="col-sm-12">



  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
    <div class="col-sm-12">
      <strong>Special Request (Midshipman)</strong>
      <input required type="text" name="SHORT_DESCRIPTION" class="form-control-sm" placeholder="Briefly describe your request in one sentance." size="60" value="<?php if(isset($_POST['SHORT_DESCRIPTION'])){echo "{$_POST['SHORT_DESCRIPTION']}";}?>"/>
    </div>
  </div>


  <div class="row" style="border-bottom:1px solid #000000;">

    <div class="col-sm-6" style="border-left: 1px solid #000000; border-top: 1px solid #000000; ">
      <div class="row">
        <div class="col-sm-1">
          To:
        </div>
        <div class="col-sm-2">
          <select type="text" class="form-control-sm" name="TO_RANK" >
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "LT"){echo "selected";}?>>
              LT
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "LCDR"){echo "selected";}?>>
              LCDR
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "CDR"){echo "selected";}?>>
              CDR
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "CAPT"){echo "selected";}?>>
              CAPT
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "Capt"){echo "selected";}?>>
              Capt
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "Maj"){echo "selected";}?>>
              Maj
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "LtCol"){echo "selected";}?>>
              LtCol
            </option>
            <option <?php if(isset($_POST['TO_RANK']) && $_POST['TO_RANK'] == "Col"){echo "selected";}?>>
              Col
            </option>
          </select>
        </div>
        <div class="col-sm-7">
          <input required type="text" class="form-control-sm" name="TO_NAME" placeholder="Lastname" value="<?php if(isset($_POST['TO_NAME'])){echo "{$_POST['TO_NAME']}";}?>"/>
        </div>
        <div class="col-sm-2">
          <select type="text" class="form-control-sm" name="TO_SERVICE">
            <option <?php if(isset($_POST['TO_SERVICE']) && $_POST['TO_SERVICE'] == "USN"){echo "selected";}?>>
              USN
            </option>
            <option <?php if(isset($_POST['TO_SERVICE']) && $_POST['TO_SERVICE'] == "USMC"){echo "selected";}?>>
              USMC
            </option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-11">
          <input required type="text" class="form-control-sm" name="TO_BILLET" placeholder="Billet" value="<?php if(isset($_POST['TO_BILLET'])){echo "{$_POST['TO_BILLET']}";}?>"/>
          <br />
        </div>
      </div>
    </div>

    <div class="col-sm-6" style="border-right: 1px solid #000000; border-top: 1px solid #000000; ">
      <div class="row">
        <div class="col-sm-9"  style="border-left: 1px solid #000000;">
          <div class="row">
            <div class="col-sm-12">
              From:
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1">
              MIDN
            </div>
            <div class="col-sm-2">
              <select type="text" class="form-control-sm" name="FROM_CLASS">
                <option <?php if(isset($_POST['FROM_CLASS']) && $_POST['FROM_CLASS'] == " 1/C"){echo "selected";}?>>
                  1/C
                </option>
                <option <?php if(isset($_POST['FROM_CLASS']) && $_POST['FROM_CLASS'] == " 2/C"){echo "selected";}?>>
                  2/C
                </option>
                <option <?php if(isset($_POST['FROM_CLASS']) && $_POST['FROM_CLASS'] == " 3/C"){echo "selected";}?>>
                  3/C
                </option>
                <option <?php if(isset($_POST['FROM_CLASS']) && $_POST['FROM_CLASS'] == " 4/C"){echo "selected";}?>>
                  4/C
                </option>
            </select>
            </div>
            <div class="col-sm-4">
              <input required type="text" class="form-control-sm" name="FROM_FIRST_NAME" placeholder="First Name" size="15" value="<?php if(isset($_POST['FROM_FIRST_NAME'])){echo "{$_POST['FROM_FIRST_NAME']}";}?>"/>
            </div>
            <div class="col-sm-4">
              <input required type="text" class="form-control-sm" name="FROM_LAST_NAME" placeholder="Last Name" size="15" value="<?php if(isset($_POST['FROM_LAST_NAME'])){echo "{$_POST['FROM_LAST_NAME']}";}?>"/>
            </div>
          </div>
        </div>
        <div class="col-sm-3" style="border-left: 1px solid #000000; ">
          <div class="row">
            <div class="col-sm-12">
              Alpha Number
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <input required type="text" class="form-control-sm" name="FROM_ALPHA" placeholder="Alpha" maxlength="6" size="6" value="<?php if(isset($_POST['FROM_ALPHA'])){echo "{$_POST['FROM_ALPHA']}";}?>"/>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
      <div class="col-sm-6" style="border-left: 1px solid #000000;">
        <div class="row"  >
          <div class="col-sm-12">
            VIA:
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            Chain-of-Command
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">

              <div class="col-sm-3" style="border-left: 1px solid #000000;">
                <div class="row">
                  <div class="col-sm-12">
                    Class Year
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <input required type="text" class="form-control-sm" name="FROM_CLASS_YEAR" placeholder="20XX" size="4" maxlength="4" value="<?php if(isset($_POST['FROM_CLASS_YEAR'])){echo "{$_POST['FROM_CLASS_YEAR']}";}?>"/>
                  </div>
                </div>
              </div>
              <div class="col-sm-3" style="border-left: 1px solid #000000;  ">
                <div class="row">
                  <div class="col-sm-12">
                    Company
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <input required type="text" class="form-control-sm" name="FROM_COMPANY" placeholder="XX" size="2" maxlength="2" value="<?php if(isset($_POST['FROM_COMPANY'])){echo "{$_POST['FROM_COMPANY']}";}?>"/>
                  </div>
                </div>
              </div>
              <div class="col-sm-3" style="border-left: 1px solid #000000; ">
                <div class="row">
                  <div class="col-sm-12">
                    Room Number
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <input required type="text" class="form-control-sm" name="FROM_ROOM_NUMBER" placeholder="XXXX" size="4" maxlength="4" value="<?php if(isset($_POST['FROM_ROOM_NUMBER'])){echo "{$_POST['FROM_ROOM_NUMBER']}";}?>"/>
                  </div>
                </div>
              </div>
              <div class="col-sm-3" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
                <div class="row">
                  <div class="col-sm-12">
                    Rank
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <select type="text" class="form-control-sm" name="FROM_RANK">
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN 4/C"){echo "selected";}?>>
                        MIDN 4/C
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN 3/C"){echo "selected";}?>>
                        MIDN 3/C
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN 2/C"){echo "selected";}?>>
                        MIDN 2/C
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN 1/C"){echo "selected";}?>>
                        MIDN 1/C
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN ENS"){echo "selected";}?>>
                        MIDN ENS
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN LTJG"){echo "selected";}?>>
                        MIDN LTJG
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN LT"){echo "selected";}?>>
                        MIDN LT
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN LCDR"){echo "selected";}?>>
                        MIDN LCDR
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN CDR"){echo "selected";}?>>
                        MIDN CDR
                      </option>
                      <option <?php if(isset($_POST['FROM_RANK']) && $_POST['FROM_RANK'] == "MIDN CAPT"){echo "selected";}?>>
                        MIDN CAPT
                      </option>
                  </select>

                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>


        <div class="row">
          <div class="col-sm-6" style="border-left: 1px solid #000000; border-top:1px solid #000000;">
            <div class="row"  >
              <div class="col-sm-12">
                REF:
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <input required type="text" name="REFERENCE" class="form-control-sm" placeholder="(a) COMDTMIDNINST 5400.6N (16 Aug 11)" size="40" value="<?php if(isset($_POST['REFERENCE'])){echo "{$_POST['REFERENCE']}";}?>">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">

                  <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000;">
                    <div class="row">
                      <div class="col-sm-12">
                        SQPR
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <input required type="text" name="SQPR" class="form-control-sm" placeholder="X.XX" size="4" value="<?php if(isset($_POST['SQPR'])){echo "{$_POST['SQPR']}";}?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000; ">
                    <div class="row">
                      <div class="col-sm-12">
                        CQPR
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <input required type="text" name="CQPR" class="form-control-sm" placeholder="X.XX" size="4"  value="<?php if(isset($_POST['CQPR'])){echo "{$_POST['CQPR']}";}?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000;">
                    <div class="row">
                      <div class="col-sm-12">
                        Perf. Grade
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <select type="text" class="form-control-sm" name="APTITUDE_GRADE">
                          <option <?php if(isset($_POST['APTITUDE_GRADE']) && $_POST['APTITUDE_GRADE'] == "A"){echo "selected";}?>>
                            A
                          </option>
                          <option <?php if(isset($_POST['APTITUDE_GRADE']) && $_POST['APTITUDE_GRADE'] == "B"){echo "selected";}?>>
                            B
                          </option>
                          <option <?php if(isset($_POST['APTITUDE_GRADE']) && $_POST['APTITUDE_GRADE'] == "C"){echo "selected";}?>>
                            C
                          </option>
                          <option <?php if(isset($_POST['APTITUDE_GRADE']) && $_POST['APTITUDE_GRADE'] == "D"){echo "selected";}?>>
                            D
                          </option>
                          <option <?php if(isset($_POST['APTITUDE_GRADE']) && $_POST['APTITUDE_GRADE'] == "F"){echo "selected";}?>>
                            F
                          </option>
                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top:1px solid #000000;">
                    <div class="row">
                      <div class="col-sm-12">
                        Conduct Grade
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">

                          <select type="text" class="form-control-sm" name="CONDUCT_GRADE">
                            <option <?php if(isset($_POST['CONDUCT_GRADE']) && $_POST['CONDUCT_GRADE'] == "A"){echo "selected";}?>>
                              A
                            </option>
                            <option <?php if(isset($_POST['CONDUCT_GRADE']) && $_POST['CONDUCT_GRADE'] == "B"){echo "selected";}?>>
                              B
                            </option>
                            <option <?php if(isset($_POST['CONDUCT_GRADE']) && $_POST['CONDUCT_GRADE'] == "C"){echo "selected";}?>>
                              C
                            </option>
                            <option <?php if(isset($_POST['CONDUCT_GRADE']) && $_POST['CONDUCT_GRADE'] == "D"){echo "selected";}?>>
                              D
                            </option>
                            <option <?php if(isset($_POST['CONDUCT_GRADE']) && $_POST['CONDUCT_GRADE'] == "F"){echo "selected";}?>>
                              F
                            </option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>

<div class="form-check">
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
    <div class="col-sm-6">
      I Respectfully Request (Type):
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">
      (Specify)
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-sm-2">
      Weekend Liberty:
      <input class="form-check-input" name="REQUEST_TYPE" type="radio" name="WEEKEND_LIBERTY" value="WEEKEND_LIBERTY" <?php if(isset($_POST['REQUEST_TYPE']) && $_POST['REQUEST_TYPE'] == "WEEKEND_LIBERTY"){echo "checked";}?>>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Dining Out:
      <input class="form-check-input" name="REQUEST_TYPE" type="radio" name="DINING_OUT" value="DINING_OUT" <?php if(isset($_POST['REQUEST_TYPE']) && $_POST['REQUEST_TYPE'] == "DINING_OUT"){echo "checked";}?>>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Leave:
      <input class="form-check-input" name="REQUEST_TYPE" type="radio" name="LEAVE" value="LEAVE" <?php if(isset($_POST['REQUEST_TYPE']) && $_POST['REQUEST_TYPE'] == "LEAVE"){echo "checked";}?>>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-1">
      Other:
      <input class="form-check-input" name="REQUEST_TYPE" type="radio" name="OTHER" value="OTHER" <?php if(isset($_POST['REQUEST_TYPE']) && $_POST['REQUEST_TYPE'] == "OTHER"){echo "checked";}?>>
    </div>
    <div class="col-sm-2">
      <input type="text" name="OTHER_DESCRIPTION" class="form-control-sm" placeholder="" size="10"  value="<?php if(isset($_POST['OTHER_DESCRIPTION'])){echo "{$_POST['OTHER_DESCRIPTION']}";}?>">
    </div>
  </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-sm-3">
      Address (Care of:)
    </div>
    <div class="col-sm-3">
      (Street, P.O. Box, RFD)
    </div>
    <div class="col-sm-2">

    </div>
    <div class="col-sm-4">
      (City) (State) (Zip Code) (Phone)
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-sm-3">
      <input required type="text" name="ADDRESS_1" class="form-control-sm" placeholder="" size="10"  value="<?php if(isset($_POST['ADDRESS_1'])){echo "{$_POST['ADDRESS_1']}";}?>">
    </div>
    <div class="col-sm-3">
      <input required type="text" name="ADDRESS_2" class="form-control-sm" placeholder="" size="10" value="<?php if(isset($_POST['ADDRESS_2'])){echo "{$_POST['ADDRESS_2']}";}?>">
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">
      <input required type="text" name="ADDRESS_3" class="form-control-sm" placeholder="" size="20" value="<?php if(isset($_POST['ADDRESS_3'])){echo "{$_POST['ADDRESS_3']}";}?>">
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-md-12">
      <strong>Remarks or Reason</strong>
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-md-12">
      <textarea class="form-control" rows="10" name="REMARKS"><?php if(isset($_POST['REMARKS'])){echo "{$_POST['REMARKS']}";}?></textarea>
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-md-12">
      <strong>I am not in a duty status on the dates requested.</strong>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="row" style="border-left: 1px solid #000000;">
        <div class="col-sm-9" style="border-top: 1px solid #000000;">
          <div class="row" >
            <div class="col-sm-12">
              Signature (Midshipman)
            </div>
            <div class="col-sm-12">
              <input type="submit" class="btn btn-primary" value="Submit Chit">
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
            <div class="col-sm-12">
              Date
            </div>
            <div class="col-sm-12">
              <input required type="text" name="DATE" class="form-control-sm" placeholder="01DEC17" size="9" value="<?php if(isset($_POST['DATE'])){echo "{$_POST['DATE']}";}?>">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row" style="border-right:1px solid #000000; border-top: 1px solid #000000;">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12">
              Beginning (Time & Date)
              </div>
            <div class="col-sm-12">
              <input required type="text" name="BEGIN_DATE_TIME" class="form-control-sm" placeholder="1745 01DEC17" size="15" value="<?php if(isset($_POST['BEGIN_DATE_TIME'])){echo "{$_POST['BEGIN_DATE_TIME']}";}?>">

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row" style="border-left: 1px solid #000000;">
            <div class="col-sm-12">
              Ending (Time & Date)
            </div>
            <div class="col-sm-12">
              <input required type="text" name="END_DATE_TIME" class="form-control-sm" placeholder="2230 01DEC17" size="15" value="<?php if(isset($_POST['END_DATE_TIME'])){echo "{$_POST['END_DATE_TIME']}";}?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4" style="border-right: 1px solid #000000;">
          <div class="row">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              CHAIN-OF-COMMAND
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2" style="border-right: 1px solid #000000;">
          <div class="row" style="text-align: center; ">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              DATE
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3" >
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <em>CoC's Initials</em>
            </div>
            <div class="col-sm-12">
              RECOMMEND
            </div>
            <div class="col-sm-12">
              YES
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <em>CoC's Initials</em>
            </div>
            <div class="col-sm-12">
              RECOMMEND
            </div>
            <div class="col-sm-12">
              NO
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row" style="border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              CHAIN-OF-COMMAND
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              DATE
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <em>CoC's Initials</em>
            </div>
            <div class="col-sm-12">
              RECOMMEND
            </div>
            <div class="col-sm-12">
              YES
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <em>CoC's Initials</em>
            </div>
            <div class="col-sm-12">
              RECOMMEND
            </div>
            <div class="col-sm-12">
              NO
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input required type="text" name="COC_1_BILLET" placeholder="Billet--'Squad Leader'" value="<?php if(isset($_POST['COC_1_BILLET'])){echo "{$_POST['COC_1_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input required type="text" name="COC_1_NAME" placeholder="MIDN ENS Lastname, USN" value="<?php if(isset($_POST['COC_1_NAME'])){echo "{$_POST['COC_1_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input required type="text" name="COC_1_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_1_USERNAME'])){echo "{$_POST['COC_1_USERNAME']}";}?>"/>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row" style="border-right:1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              PRODEV
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">

            </div>
            <div class="col-sm-12">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6" style="border-right: 1px solid #000000;">
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_2_BILLET" placeholder="Billet--'Platoon Commander'" value="<?php if(isset($_POST['COC_2_BILLET'])){echo "{$_POST['COC_2_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_2_NAME" placeholder="MIDN LTJG Lastname, USN" value="<?php if(isset($_POST['COC_2_NAME'])){echo "{$_POST['COC_2_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_2_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_2_USERNAME'])){echo "{$_POST['COC_2_USERNAME']}";}?>"/>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_3_BILLET" placeholder="Billet--'Company XO'" value="<?php if(isset($_POST['COC_3_BILLET'])){echo "{$_POST['COC_3_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_3_NAME" placeholder="MIDN LTJG Lastname, USN" value="<?php if(isset($_POST['COC_3_NAME'])){echo "{$_POST['COC_3_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_3_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_3_USERNAME'])){echo "{$_POST['COC_3_USERNAME']}";}?>"/>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_4_BILLET" placeholder="Billet--'Company Commander'" value="<?php if(isset($_POST['COC_4_BILLET'])){echo "{$_POST['COC_4_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_4_NAME" placeholder="MIDN LT Lastname, USN" value="<?php if(isset($_POST['COC_4_NAME'])){echo "{$_POST['COC_4_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_4_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_4_USERNAME'])){echo "{$_POST['COC_4_USERNAME']}";}?>"/>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              Date
            </div>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              APPROVED
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              DISAPPROVED
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input required type="text" name="COC_5_BILLET" placeholder="Senior Enlisted" value="<?php if(isset($_POST['COC_5_BILLET'])){echo "{$_POST['COC_5_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input required type="text" name="COC_5_NAME" placeholder="GySgt Lastname, USMC"  value="<?php if(isset($_POST['COC_5_NAME'])){echo "{$_POST['COC_5_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input required type="text" name="COC_5_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_5_USERNAME'])){echo "{$_POST['COC_5_USERNAME']}";}?>"/>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_6_BILLET" placeholder="Company Officer" value="<?php if(isset($_POST['COC_6_BILLET'])){echo "{$_POST['COC_6_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_6_NAME" placeholder="LT Lastname, USN"  value="<?php if(isset($_POST['COC_6_NAME'])){echo "{$_POST['COC_6_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_6_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_6_USERNAME'])){echo "{$_POST['COC_6_USERNAME']}";}?>"/>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_7_BILLET" placeholder="Battalion Officer" value="<?php if(isset($_POST['COC_7_BILLET'])){echo "{$_POST['COC_5_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_7_NAME" placeholder="CDR Lastname, USN" value="<?php if(isset($_POST['COC_7_NAME'])){echo "{$_POST['COC_7_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_7_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_7_USERNAME'])){echo "{$_POST['COC_7_USERNAME']}";}?>"/>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_8_BILLET" placeholder="Deputy Commandant" value="<?php if(isset($_POST['COC_8_BILLET'])){echo "{$_POST['COC_8_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_8_NAME" placeholder="CAPT Lastname, USN" value="<?php if(isset($_POST['COC_8_NAME'])){echo "{$_POST['COC_8_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_8_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_8_USERNAME'])){echo "{$_POST['COC_8_USERNAME']}";}?>"/>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <input type="text" name="COC_9_BILLET" placeholder="Commandant" value="<?php if(isset($_POST['COC_9_BILLET'])){echo "{$_POST['COC_9_BILLET']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_9_NAME" placeholder="CAPT Lastname, USN" value="<?php if(isset($_POST['COC_9_NAME'])){echo "{$_POST['COC_9_NAME']}";}?>"/>
            </div>
            <div class="col-sm-12">
              <input type="text" name="COC_9_USERNAME" placeholder="username" value="<?php if(isset($_POST['COC_9_USERNAME'])){echo "{$_POST['COC_9_USERNAME']}";}?>"/>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
            <br />
            </div>
            <div class="col-sm-12">
            <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
            <div class="col-sm-12">
              <br />
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row" style="border-right:1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-12">
          <strong>Chain of Command Comments:</strong>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
        <div class="row">
          <div class="col-sm-6" style="border-right: 1px solid #000000;">
            <div class="row">
              <div class="col-sm-12">
                Departed (Time & Date)
              </div>
              <div class="col-sm-12">
                <br />
              </div>
            </div>
          </div>
          <div class="col-sm-6" style="border-right: 1px solid #000000;">
            <div class="row">
              <div class="col-sm-12">
                Returned (Time & Date)
              </div>
              <div class="col-sm-12">
                <br />
              </div>
            </div>
          </div>
        </div>
        <div class="row" style = "border-bottom: 1px solid #000000;">
          <div class="col-sm-6" style="border-right: 1px solid #000000; border-top: 1px solid #000000;">
            <div class="row">
              <div class="col-sm-12">
                Signature (CDO, MOOW, OOW)
              </div>
              <div class="col-sm-12">
                <br />
              </div>
            </div>
          </div>
          <div class="col-sm-6" style="border-right: 1px solid #000000; border-top: 1px solid #000000;">
            <div class="row">
              <div class="col-sm-12">
                Signature (CDO, MOOW, OOW)
              </div>
              <div class="col-sm-12">
                <br />
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row" style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;">
      <div class="col-sm-12">
        <strong>NDW-USNA-BBA-1050/09 (Rev. 4-92)</strong>
      </div>
    </div>

  </form>

</div>
</div>

  </div>

</div>
