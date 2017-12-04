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
    $filename=$name . ".txt";
    $dir=fopen("chits/directory.txt", 'a');
    fwrite($dir, $author . ", " . $filename . ", " .  $data['toName']);
    fclose($dir);

    $filename=$name . ".txt";
    $newchit=fopen($filename, 'w');
    fwrite($newchit, $data);
    fclose($newchit);
  }

 ?>
