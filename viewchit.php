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
    <title>View Chit</title>
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
require_once("nimitz.php");
require_once("error.inc.php");
nav();
// session_destroy();
// $data = array();
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

?>
<div class="container courier">

  <div id="banner">

  </div>

<?php


// $_SESSION['filename'] = "m183990_chit1.txt";

if(isset($_SESSION['filename'])){
  $filename = "./chits/" . $_SESSION['filename'];

  if(is_file($filename)){
    $raw_data = file_get_contents($filename);
    $data = unserialize($raw_data);

    if($debug){

      echo "<pre>";
      print_r($data);
      echo "</pre>";

    }


    if($debug){

      echo "<pre>";
      print_r($_SESSION);
      echo "</pre>";

    }

    $coc_data = [];
    $fp = fopen("./chits/directory.txt", "r");
    if($fp){
    	while(($line = fgets($fp)) !== false){

    		$split = explode(",", $line);

    		if($split[1] == $_SESSION['filename']){
          $coc_all = $split[2];
      		$coc = explode(" ", $coc_all);
      		foreach ($coc as $member) {
            $member = explode("-", $member);

            // print_r($member);
            // echo "$member[1]";

            if(empty($member[0])){
              continue;
            }


            if($member[0] == $data['COC_1_USERNAME'] && $member[1] == 1){
              $data['COC_1_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_2_USERNAME'] && $member[1] == 1){
              $data['COC_2_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_3_USERNAME'] && $member[1] == 1){
              $data['COC_3_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_4_USERNAME'] && $member[1] == 1){
              $data['COC_4_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_5_USERNAME'] && $member[1] == 1){
              $data['COC_5_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_6_USERNAME'] && $member[1] == 1){
              $data['COC_6_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_7_USERNAME'] && $member[1] == 1){
              $data['COC_7_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_8_USERNAME'] && $member[1] == 1){
              $data['COC_8_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_9_USERNAME'] && $member[1] == 1){
              $data['COC_9_STATUS'] = "APPROVED";
            }
            elseif($member[0] == $data['COC_1_USERNAME'] && $member[1] == 2){
              $data['COC_1_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_2_USERNAME'] && $member[1] == 2){
              $data['COC_2_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_3_USERNAME'] && $member[1] == 2){
              $data['COC_3_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_4_USERNAME'] && $member[1] == 2){
              $data['COC_4_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_5_USERNAME'] && $member[1] == 2){
              $data['COC_5_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_6_USERNAME'] && $member[1] == 2){
              $data['COC_6_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_7_USERNAME'] && $member[1] == 2){
              $data['COC_7_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_8_USERNAME'] && $member[1] == 2){
              $data['COC_8_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_9_USERNAME'] && $member[1] == 2){
              $data['COC_9_STATUS'] = "DENIED";
            }
            elseif($member[0] == $data['COC_1_USERNAME'] && $member[1] == 0){
              $data['COC_1_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_2_USERNAME'] && $member[1] == 0){
              $data['COC_2_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_3_USERNAME'] && $member[1] == 0){
              $data['COC_3_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_4_USERNAME'] && $member[1] == 0){
              $data['COC_4_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_5_USERNAME'] && $member[1] == 0){
              $data['COC_5_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_6_USERNAME'] && $member[1] == 0){
              $data['COC_6_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_7_USERNAME'] && $member[1] == 0){
              $data['COC_7_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_8_USERNAME'] && $member[1] == 0){
              $data['COC_8_STATUS'] = "PENDING";
            }
            elseif($member[0] == $data['COC_9_USERNAME'] && $member[1] == 0){
              $data['COC_9_STATUS'] = "PENDING";
            }

      			// echo "$member";
      		}
    		}

    	}

    	fclose($fp);
    }





  }
  else{
    //file doesn't exist
  }

}
else{
  //filename is not set
}
//
// echo "<pre>";
// print_r($data);
// echo "</pre>";


?>

  <div class="row" style="border: 1px solid #000000">
    <div class="col-sm-12">

      <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
        <div class="col-sm-12">
          <strong>Special Request (Midshipman)</strong>
          Summary: <?php if(isset($data['SHORT_DESCRIPTION'])){echo "{$data['SHORT_DESCRIPTION']}";}?>
        </div>
      </div>


      <div class="row" style="border-bottom:1px solid #000000;">

        <div class="col-sm-6" style="border-left: 1px solid #000000; border-top: 1px solid #000000; ">
          <div class="row">
        <div class="col-sm-1">
          To:
        </div>
        <div class="col-sm-10">
          <?php if(isset($data['TO_RANK'])){echo $data['TO_RANK'];}?>
          <?php if(isset($data['TO_NAME'])){echo "{$data['TO_NAME']}";}?>
          <?php if(isset($data['TO_SERVICE'])){echo ", " . $data['TO_SERVICE'];}?>
        </div>
        <div class="col-sm-1">

        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-11">
          <?php if(isset($data['TO_BILLET'])){echo "{$data['TO_BILLET']}";}?>
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
            <div class="col-sm-10">
              <?php if(isset($data['FROM_CLASS'])) {echo "   " ; echo $data['FROM_CLASS'];} ?>
              <?php if(isset($data['FROM_FIRST_NAME'])){echo "{$data['FROM_FIRST_NAME']}";}?>
              <?php if(isset($data['FROM_LAST_NAME'])){echo "{$data['FROM_LAST_NAME']}";}?>

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
              <?php if(isset($data['FROM_ALPHA'])){echo "{$data['FROM_ALPHA']}";}?>
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
                    <?php if(isset($data['FROM_CLASS_YEAR'])){echo "{$data['FROM_CLASS_YEAR']}";}?>
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
                    <?php if(isset($data['FROM_COMPANY'])){echo "{$data['FROM_COMPANY']}";}?>
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
                    <?php if(isset($data['FROM_ROOM_NUMBER'])){echo "{$data['FROM_ROOM_NUMBER']}";}?>
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
                    <?php if(isset($data['FROM_RANK'])){ echo $data['FROM_RANK'];}?>
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
                <?php if(isset($data['REFERENCE'])){echo "{$data['REFERENCE']}";}?>
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
                        <?php if(isset($data['SQPR'])){echo "{$data['SQPR']}";}?>
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
                        <?php if(isset($data['CQPR'])){echo "{$data['CQPR']}";}?>
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
                        <?php if(isset($data['APTITUDE_GRADE'])){ echo $data['APTITUDE_GRADE']; }?>
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

                        <?php if(isset($data['CONDUCT_GRADE'])){ echo $data['CONDUCT_GRADE']; }?>

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
      <?php if(isset($data['REQUEST_TYPE']) && $data['REQUEST_TYPE'] == "WEEKEND_LIBERTY"){echo " X";}?>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Dining Out:
      <?php if(isset($data['REQUEST_TYPE']) && $data['REQUEST_TYPE'] == "DINING_OUT"){echo " X";}?>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Leave:
      <?php if(isset($data['REQUEST_TYPE']) && $data['REQUEST_TYPE'] == "LEAVE"){echo " X";}?>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-1">
      Other:
      <?php if(isset($data['REQUEST_TYPE']) && $data['REQUEST_TYPE'] == "OTHER"){echo " X";}?>
    </div>
    <div class="col-sm-2">
      <?php if(isset($data['OTHER_DESCRIPTION'])){echo "{$data['OTHER_DESCRIPTION']}";}?>
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
    <div class="col-sm-1">

    </div>
    <div class="col-sm-5 text-right">
      (City) (State) (Zip Code) (Phone)
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-sm-3">
    <?php if(isset($data['ADDRESS_1'])){echo "{$data['ADDRESS_1']}";}?>
    </div>
    <div class="col-sm-3">
      <?php if(isset($data['ADDRESS_2'])){echo "{$data['ADDRESS_2']}";}?>
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-5 text-right">
      <?php if(isset($data['ADDRESS_CITY'])){echo "{$data['ADDRESS_CITY']}";}?>,
      <?php if(isset($data['ADDRESS_STATE'])){echo "{$data['ADDRESS_STATE']}";}?>,
      <?php if(isset($data['ADDRESS_ZIP'])){echo "{$data['ADDRESS_ZIP']}";}?>,
      <?php if(isset($data['PHONE'])){echo "{$data['PHONE']}";}?>
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-md-12">
      <strong>Remarks or Reason</strong>
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-md-12">
      <?php if(isset($data['REMARKS'])){echo "{$data['REMARKS']}";}?>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
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

            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
            <div class="col-sm-12">
              Date
            </div>
            <div class="col-sm-12">
            <?php if(isset($data['DATE'])){echo "{$data['DATE']}";}?>
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
              <?php if(isset($data['BEGIN_DATE_TIME'])){echo "{$data['BEGIN_DATE_TIME']}";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row" style="border-left: 1px solid #000000;">
            <div class="col-sm-12">
              Ending (Time & Date)
            </div>
            <div class="col-sm-12">
            <?php if(isset($data['END_DATE_TIME'])){echo "{$data['END_DATE_TIME']}";}?>
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
              <?php if(isset($data['COC_1_BILLET'])&& !empty($data['COC_1_BILLET'])){echo "{$data['COC_1_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_1_NAME'])&& !empty($data['COC_1_NAME'])){echo "{$data['COC_1_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_1_USERNAME'])&& !empty($data['COC_1_USERNAME'])){echo "{$data['COC_1_USERNAME']}";}else{echo "<br>";}?>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
            <?php
            if(isset($data['COC_1_USERNAME']) && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "PENDING" ){
              echo "<br><strong>PENDING</strong>";
            }
             ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">

          <div class="col-sm-12 text-center">
              <?php
                if(isset($data['COC_1_USERNAME']) && $data['COC_1_USERNAME'] == $_SESSION['username'] && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "PENDING"){
                  echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
              		<input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
              		<input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                }
                elseif(isset($data['COC_1_USERNAME']) && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "APPROVED"){
                  echo "<br><strong>APPROVED</strong>";
                }
                ?>

            </div>

          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_1_USERNAME']) && $data['COC_1_USERNAME'] == $_SESSION['username'] && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "PENDING"){
                    echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                		</form>";
                  }
                  elseif(isset($data['COC_1_USERNAME']) && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "DENIED"){
                    echo "<br><strong>DENIED</strong>";
                  }
                  ?>

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
              <?php if(isset($data['COC_2_BILLET'])&& !empty($data['COC_2_BILLET'])){echo "{$data['COC_2_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_2_NAME'])&& !empty($data['COC_2_NAME'])){echo "{$data['COC_2_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_2_USERNAME'])&& !empty($data['COC_2_USERNAME'])){echo "{$data['COC_2_USERNAME']}";}else{echo "<br>";}?>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_2_USERNAME']) && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_2_USERNAME']) && $data['COC_2_USERNAME'] == $_SESSION['username'] && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_2_USERNAME']) && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_2_USERNAME']) && $data['COC_2_USERNAME'] == $_SESSION['username'] && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_2_USERNAME']) && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_3_BILLET'])&& !empty($data['COC_3_BILLET'])){echo "{$data['COC_3_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_3_NAME'])&& !empty($data['COC_3_NAME'])){echo "{$data['COC_3_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_3_USERNAME']) && !empty($data['COC_3_USERNAME'])){echo "{$data['COC_3_USERNAME']}";}else{echo "<br>";}?>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12 text-center">
              <?php
              if(isset($data['COC_3_USERNAME']) && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>



              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_3_USERNAME']) && $data['COC_3_USERNAME'] == $_SESSION['username'] && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_3_USERNAME']) && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>


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
              <?php
                if(isset($data['COC_3_USERNAME']) && $data['COC_3_USERNAME'] == $_SESSION['username'] && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "PENDING"){
                  echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                  </form>";
                }
                elseif(isset($data['COC_3_USERNAME']) && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "DENIED"){
                  echo "<br><strong>DENIED</strong>";
                }
                ?>
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
              <?php if(isset($data['COC_4_BILLET'])&& !empty($data['COC_4_BILLET'])){echo "{$data['COC_4_BILLET']}";}else{ echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_4_NAME'])&& !empty($data['COC_4_NAME'])){echo "{$data['COC_4_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_4_USERNAME'])&& !empty($data['COC_4_USERNAME'])){echo "{$data['COC_4_USERNAME']}";}else{echo "<br>";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_4_USERNAME']) && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>


            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_4_USERNAME']) && $data['COC_4_USERNAME'] == $_SESSION['username'] && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_4_USERNAME']) && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_4_USERNAME']) && $data['COC_4_USERNAME'] == $_SESSION['username'] && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_4_USERNAME']) && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_5_BILLET'])&& !empty($data['COC_5_BILLET'])){echo "{$data['COC_5_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_5_NAME'])&& !empty($data['COC_5_NAME'])){echo "{$data['COC_5_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_5_USERNAME']) && !empty($data['COC_5_USERNAME'])){echo "{$data['COC_5_USERNAME']}";}else{echo "<br>";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_5_USERNAME']) && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>


            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_5_USERNAME']) && $data['COC_5_USERNAME'] == $_SESSION['username'] && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_5_USERNAME']) && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_5_USERNAME']) && $data['COC_5_USERNAME'] == $_SESSION['username'] && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_5_USERNAME']) && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_6_BILLET'])&& !empty($data['COC_6_BILLET'])){echo "{$data['COC_6_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_6_NAME'])&& !empty($data['COC_6_NAME'])){echo "{$data['COC_6_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_6_USERNAME'])&& !empty($data['COC_6_USERNAME'])){echo "{$data['COC_6_USERNAME']}";}else{echo "<br>";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_6_USERNAME']) && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_6_USERNAME']) && $data['COC_6_USERNAME'] == $_SESSION['username'] && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_6_USERNAME']) && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_6_USERNAME']) && $data['COC_6_USERNAME'] == $_SESSION['username'] && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_6_USERNAME']) && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_7_BILLET']) && !empty($data['COC_7_BILLET'])){echo "{$data['COC_7_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_7_NAME']) && !empty($data['COC_7_NAME'])){echo "{$data['COC_7_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_7_USERNAME']) && !empty($data['COC_7_USERNAME'])){echo "{$data['COC_7_USERNAME']}";}else{echo "<br>";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_7_USERNAME']) && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_7_USERNAME']) && $data['COC_7_USERNAME'] == $_SESSION['username'] && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_7_USERNAME']) && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_7_USERNAME']) && $data['COC_7_USERNAME'] == $_SESSION['username'] && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_7_USERNAME']) && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_8_BILLET']) && !empty($data['COC_8_BILLET'])){echo "{$data['COC_8_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_8_NAME']) && !empty($data['COC_8_NAME'])){echo "{$data['COC_8_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_8_USERNAME']) && !empty($data['COC_8_USERNAME'])){echo "{$data['COC_8_USERNAME']}";}else{echo "<br>";}?>

            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_8_USERNAME']) && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_8_USERNAME']) && $data['COC_8_USERNAME'] == $_SESSION['username'] && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_8_USERNAME']) && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_8_USERNAME']) && $data['COC_8_USERNAME'] == $_SESSION['username'] && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_8_USERNAME']) && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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
              <?php if(isset($data['COC_9_BILLET']) && !empty($data['COC_9_BILLET'])){echo "{$data['COC_9_BILLET']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php if(isset($data['COC_9_NAME']) && !empty($data['COC_9_NAME'])){echo "{$data['COC_9_NAME']}";}else{echo "<br>";}?>
            </div>
            <div class="col-sm-12">
              <?php
              // if(isset($data['COC_9_USERNAME']) && !empty($data['COC_9_USERNAME'])){echo "{$data['COC_9_USERNAME']}";}else{echo "<br>";}?>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <?php
              if(isset($data['COC_9_USERNAME']) && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "PENDING" ){
                echo "<br><strong>PENDING</strong>";
              }
               ?>
            </div>
            <div class="col-sm-12">
              <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row" style="text-align: center;border-left: 1px solid #000000; border-right: 1px solid #000000;">
            <div class="col-sm-12 text-center">
                <?php
                  if(isset($data['COC_9_USERNAME']) && $data['COC_9_USERNAME'] == $_SESSION['username'] && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "PENDING"){
                    echo "<br><form style=\"float: left; \" method=\"post\" action=\"update-chit.php\">
                    <input type=\"hidden\" name=\"filename\" value=\"{$_SESSION['filename']}\" />
                    <input class=\"btn btn-success\" type=\"submit\" value=\"Approve\" Name=\"update\"/>";
                  }
                  elseif(isset($data['COC_9_USERNAME']) && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "APPROVED"){
                    echo "<br><strong>APPROVED</strong>";
                  }
                  ?>

              </div>

            </div>
          </div>
          <div class="col-sm-3">
            <div class="row" style="text-align: center; border-right: 1px solid #000000;">
              <div class="col-sm-12 text-center">
                  <?php
                    if(isset($data['COC_9_USERNAME']) && $data['COC_9_USERNAME'] == $_SESSION['username'] && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "PENDING"){
                      echo "<br><input class=\"btn btn-danger\" type=\"submit\" value=\"Deny\" Name=\"update\"/>
                      </form>";
                    }
                    elseif(isset($data['COC_9_USERNAME']) && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "DENIED"){
                      echo "<br><strong>DENIED</strong>";
                    }
                    ?>

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


<div class="row">
  <div class="col-sm-4">
  </div>
  <div class="col-sm-4 text-center">


    <div class="col-xs-4 text-left">
      <div class="previous">
        <form action="editchit.php" method="post">
          <input type="hidden" value="<?php echo "{$_SESSION['filename']}"; ?>" name="filename">
          <input type="submit" class="btn btn-secondary" value="Edit Chit" />
        </form>
      </div>
    </div>
    <div class="col-xs-4 text-center">
      <form action="print.script.php" method="post">
        <input type="hidden" name="filename" value="<?php echo "{$_SESSION['filename']}"; ?>"/>
        <input type="submit" class="btn btn-default" name="viewbutton" value="Print Chit">
      </form>
    </div>
    <div class="col-xs-4 text-right">
      <div class="next">

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete Chit</button>

      </div>
    </div>





		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Are you sure you want to delete this chit?</h4>
					</div>
					<div class="modal-footer">

						<div class="col-xs-6 text-left">
							<div class="previous">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							</div>
						</div>
						<div class="col-xs-6 text-right">
							<div class="next">

								<form action="deletechit.php" method="post">
									<input type="submit" class="btn btn-danger" value="Delete">
								</form>
							</div>
						</div>


					</div>
				</div>

			</div>
		</div>

  </div>
  <div class="col-sm-4">
  </div>

</div>


  </div>

</div>
