<?php include 'myCSVlib.php'; ?>
<?php


  // #Opens a given file in read mode
  // function writeChit($author, $name, $chit){
  //   //Variables from the Chit to write
  //   $filename=$name . ".txt";
  //   $description=$chit['des'];
  //   //COC string
  //   $coc="";
  //   $i=1;
  //
  //   //I want to take the name of the COC and search the user list for the username
  //   $userfile="../../admin/users.txt";
  //   $users=read_CSV($userfile);
  //
  //   while(isset($chit["toName".$i])){
  //
  //     $cocPerson=$users[$name]["uname"]."-0 ";
  //     $coc=$coc.$cocPerson;
  //     $i++;
  //   }
  //   //coc should now be populated RankName-0
  //
  //   //files to open
  //   $dir=fopen("chits/directory.txt", 'a');
  //   $newchit=fopen($filename, 'w');
  //   //what to write
  //   //write to chits/directory.txt uname, filename, coc1-0 coc2-0..etc, 0, description
  //   $newDir=$author. ", " . $filename . ", " . $coc . ", 0, " . $description ."\n";
  //   fwrite($dir, $newDir);
  //   $serializedChit=serialize($chit);
  //   fwrite($newchit, $serializedChit);
  //
  //   //Close Stuff
  //   fclose($dir);
  //   fclose($newchit);
  // }

  function validateUname($username)

 ?>
