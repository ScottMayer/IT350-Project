<?php
  // function storeChit($Chit){
  //   $serialString=serialize($Chit);
  //   $author=$Chit['MIDNName'];
  //
  //   if(!(fopen("chits/{$Chit['name']}", 'x'))){
  //     alert("")
  //   }
  // }

  function writeChit($author, $name, $data){
    $dir=fopen("chits/directory.txt", 'a');
    fwrite($dir, $author . ", " . $name . ", " . $data);
    fclose($dir);
  }

 ?>
