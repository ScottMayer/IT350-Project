<?php
  // function storeChit($Chit){
  //   $serialString=serialize($Chit);
  //   $author=$Chit['MIDNName'];
  //
  //   if(!(fopen("chits/{$Chit['name']}", 'x'))){
  //     alert("")
  //   }
  // }

  function writeChit($author, $name, $chit){
    //Variables from the Chit to write
    $filename=$name . ".txt";
    $description=$chit['des'];
    //COC string
    $coc="";
    $i=1;
    while(isset($chit["toName".$i])){
      $cocName=$chit["toName".$i];
      $cocRank=$chit["toRank".$i];
      $cocPerson=$cocRank.$cocName."-0 ";
      $coc=$coc.$cocPerson;
      $i++;
    }
    //coc should now be populated RankName-0

    //files to open
    $dir=fopen("chits/directory.txt", 'a');
    $newchit=fopen($filename, 'w');
    //what to write
    //write to chits/directory.txt uname, filename, coc1-0 coc2-0..etc, 0, description
    $newDir=$author. ", " . $filename . ", " . $coc . ", 0, " . $description ."\n";
    fwrite($dir, $newDir);
    $serializedChit=serialize($chit);
    fwrite($newchit, $serializedChit);

    //Close Stuff
    fclose($dir);
    fclose($newchit);
  }

 ?>
