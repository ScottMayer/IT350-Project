<?php
  function storeChit($Chit){
    $serialString=serialize($Chit);
    $author=$Chit['MIDNName'];

    if(!(fopen("chits/{$Chit['name']}", 'x'))){
      alert("")
    }
  }
 ?>
