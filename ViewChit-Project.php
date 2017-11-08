<!-- THIS CODE IS HOW THE CHITS WILL DISPLAY TO THE USER WHEN THEY CLICK "VIEW CHIT" -->

<?php
  function OpenChit($ChitLocation){
    $chit = fopen($ChitLocation, 'r');
    if(!$Chit){
      echo "ERROR: There does not appear to be a chit at that location";
      die;
    }
    else {
      readchit($chit);
    }
  }

  function readchit($chit){
    
  }

 ?>
