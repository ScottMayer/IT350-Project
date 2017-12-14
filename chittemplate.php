<!DOCTYPE html>
<?php session_start();
  if (!isset($_SESSION['username'])) {
      //if username isn't set send them to a login page
      header("Location: ./login/login.php");
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
    <link rel="icon" href="./imgs/icon.ico"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Make Chit</title>
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
    </style>
  </head>
  <body>
<?php
require('nav.inc.php');
require_once("nimitz.php");
require_once("error.inc.php");
nav();
// session_destroy();
// $_POST = array();
// $_REQUEST = array();
// die;

// $debug = false;
$debug = true;

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h1><em>Make Chit</em></h1>
      </div>
    </div>
  </div>



  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000;">
    <div class="col-sm-12">
      <strong>Special Request (Midshipman)</strong>
    </div>
  </div>


  <div class="row">

    <div class="col-sm-6" style="border-left: 1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
      <div class="row">
        <div class="col-sm-1">
          To:
        </div>
        <div class="col-sm-11">
          LT Garcia, USN
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-11">
          1st Company Officer
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-9"  style="border-left: 1px solid #000000; border-top: 1px solid #000000; ">
          <div class="row">
            <div class="col-sm-12">
              From:
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              MIDN 1/C Scott Mayer
            </div>
          </div>
        </div>
        <div class="col-sm-3" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
          <div class="row">
            <div class="col-sm-12">
              Alpha Number
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              183990
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--
   <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-12">

        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-12">

        </div>
      </div>
    </div>
  </div>
-->


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

              <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000;">
                <div class="row">
                  <div class="col-sm-12">
                    Class Year
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    2018
                  </div>
                </div>
              </div>
              <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000; ">
                <div class="row">
                  <div class="col-sm-12">
                    Company
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    01
                  </div>
                </div>
              </div>
              <div class="col-sm-3" style="border-left: 1px solid #000000; border-top: 1px solid #000000;">
                <div class="row">
                  <div class="col-sm-12">
                    Room Number
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    1026
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
                    MIDN LTJG
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
                (a) COMDTMIDNINST 5400.6N (16 Aug 11)
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
                        3.4
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
                        3.14
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
                        A
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
                        A
                      </div>
                    </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>

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
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Dining Out:
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-2">
      Leave:
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-sm-1">
      Other:
    </div>
    <div class="col-sm-2">

    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-sm-3">
      Address (Care of:)
    </div>
    <div class="col-sm-3">
      (Street, P.O. Box, RFD)
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">
      (City) (State) (Zip Code) (Phone)
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-sm-3">
      1 Wilson Rd
    </div>
    <div class="col-sm-3">
      #13681
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">
      Annapolis, MD, 21412, (513) 240-9398
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000;">
    <div class="col-md-12">
      <strong>Remarks or Reason</strong>
    </div>
  </div>
  <div class="row" style="border-left: 1px solid #000000; border-right:1px solid #000000; border-top: 1px solid #000000; border-bottom:1px solid #000000;">
    <div class="col-md-12">
      Sir, respectfully request permission to conduct a Platoon Outing on Friday December 1st with the members of Second Platoon. We will be departing from the Academy at 1800 and returning around 2200. Upon leaving, all parties will head to the Westfield Mall Food Court to grab a quick dinner. From there, we will depart for Quiet Waters Park, approximately 16 minutes away. Entry to the park is free for military members, and ice skating will cost $6 per person. On the way back we will stop at Double T Diner for hot chocolate and desserts. All transportation will be provided via upperclass POVs. Uniform will be appropriate liberty attire for 1/C and 2/C, and Blue over Khaki for 3/C and 4/C.
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
              01 DEC 17
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
              1745 01DEC17
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row" style="border-left: 1px solid #000000;">
            <div class="col-sm-12">
              Ending (Time & Date)
            </div>
            <div class="col-sm-12">
              2230 01DEC17
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
              Squad Leader
            </div>
            <div class="col-sm-12">
              MIDN ENS Parrish, USN
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
    <div class="col-sm-6">
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              Platoon Commander
            </div>
            <div class="col-sm-12">
              MIDN LTJG Erbach, USN
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

      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              Company XO
            </div>
            <div class="col-sm-12">
              MIDN LTJG Hogue, USN
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
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              Company Commander
            </div>
            <div class="col-sm-12">
              MIDN LT Germano, USN
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
          <div class="row" style="text-align: center; border-right: 1px solid #000000;">
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
              Senior Enlisted
            </div>
            <div class="col-sm-12">
              GySgt Khan, USMC
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
      <div class="row" style="border-left: 1px solid #000000; border-bottom:1px solid #000000;">
        <div class="col-sm-4">
          <div class="row" style="border-right: 1px solid #000000;">
            <div class="col-sm-12">
              Company Officer
            </div>
            <div class="col-sm-12">
              LT Garcia, USN
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
                Retruned (Time & Date)
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

  </div>

</div>
