<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION['username'])){
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
    <link rel="icon" href="./imgs/icon.ico"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Chits</title>
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



  </head>
  <body>
    <?php
      require('nav.inc.php');
      nav();
    ?>

    <?php 
       /****** approve and deny should only edit ./chit/directory.txt *******
        *  Description: when approving/denying a chit, 
        *
        *  find the name of the chit in column [1].
        *  then find the user's username in $line[2].
        *  - change # in "MXXXXXX-#" (# is the number following the user's username in $line[2])
        *    - if the user has denied the chit
        *      - change # in user's "MXXXXXX-#" in $line[2] to 2
        *      - change # in $line[3] to 2
        *    - else
        *      - change # in user's "MXXXXXX-#" in $line[2] to 1
        *      - if every # in "MXXXXXX-#" is 1 (every user has approved)
        *        - change $line[3] to 1 (chit is approved)
        */
      
      $chitname = $_POST['filename'];
      $action = $_POST['update'];

      /////$fp = fopen("./chits/directory.txt", "r");
      /////if($fp){
      /////  while(($line = fgets($fp)) !== false){
      /////    $split = explode(",", $line);
      /////    $coc_all = $split[2];


      /////    if($split[1] == $chitname && ($index = strpos($coc_all, $_SESSION['username']) !== false) ) {
      /////      if($action == "Approve") {
      /////        $res = 1;
      /////      } elseif($action == "Deny") {
      /////        $res = 2;
      /////      } else {
      /////        // ERROR
      /////        $res = "ERROR";
      /////      }
      /////      $coc_all = substr_replace($coc_all, $_SESSION['username'] . '-' . $res, $index, strlen($_SESSION['username'])+2);

      /////      
      /////      echo $split[2] . "<br>";
      /////      echo $coc_all . "<br>";
      /////      echo "index : $index";

      /////      echo "<pre>";
      /////      print_r($split);
      /////      echo "</pre>";
      /////    }

      /////    // $coc = explode(" ", $coc_all);

      /////    // foreach ($coc as $member) {
      /////    //   $uname = substr($member, 0, -2);

      /////    //   if($uname == $_SESSION['username']){
      /////    //     if($action == "Approve") {
      /////    //       // Change "MXXXXXX-0" to "MXXXXXX-1"
      /////    //       //
      /////    //       // if ( every USER-# is USER-1 ) {
      /////    //       //   change overall status of chit to "1" for
      /////    //       //   approved
      /////    //       // }
      /////    //       $member = substr($member, 0, -1) . 1;
      /////    //       echo $member;
      /////    //       $break = true;
      /////    //     } elseif($action == "Deny") {
      /////    //       // Change "MXXXXXX-0" to "MXXXXXX-2"
      /////    //       // Change overall status of chit to "2" for denied
      /////    //       $member = substr($member, 0, -1) . 2;
      /////    //       echo $member;
      /////    //       $break = true;
      /////    //     } else {
      /////    //       // error
      /////    //       // print to the web page and scream that there's an error
      /////    //     }
      /////    //   }
      /////    //   // echo "$member";
      /////    // }

      /////    // echo "<pre>";
      /////    // print_r($split);
      /////    // echo "</pre>";

      /////    // if($break) break;
      /////  }
      /////  fclose($fp);
      /////}
      //redirect to viewchit.php for this chit, aka $chitname

      // IGNORE FOLLOWING DEBUGGING {
      //   echo $SESSION['username'] . ' ' . $_POST['filename'];
      //   echo "<pre>";
      //   print_r($_POST);
      //   echo "</pre>";
      // }

      $fp = fopen("./chits/directory.txt", "r+");
      if($fp){
        while(($line = fgets($fp)) !== false){
          $split = explode(",", $line);

          if($split[1] == $chitname){

            $coc_all = $split[2];
            $coc = explode(" ", $coc_all);

            $newcoc = "";

            foreach ($coc as $member) {
              $member = explode("-", $member);
              if($member[0] == $_SESSION['username']){
                if($action == "Approve") {
                  $member[1] = 1;

                  $status = true;
                  $temp = explode(" ", $coc_all);
                  foreach ($temp as $uname) {
                    $uname = explode("-", $uname);
                    if($uname[0] == $_SESSION['username']) {
                      continue;
                    } elseif($uname[1] !== 1) {
                      $status = false;
                      break;
                    }
                  }

                  // if every $member[1] other than you is 1, then set overall chit status $split[3] to 1
                  if($status) { $split[3] = 1; }

                } elseif($action == "Deny") {
                  $member[1] = 2;
                  $split[3] = 2;
                } else {
                  // error
                }
              }
              // echo "$member";
              $newcoc .= $member[0] . '-' . $member[1] . ' ';
            }

            fseek($fp, -strlen($line), SEEK_CUR);
            $line = $split[0] . ',' . $split[1] . ',' . substr($newcoc, 0, -1) . ',' . $split[3] . ',' . $split[4];
            fwrite($fp, $line);
          }

          // write back to directory.txt
          // fwrite($fp, $line);
        }
        fclose($fp);
      }

      header("Location: ./index.php");
      die();
    ?>
  </body>
</html>
