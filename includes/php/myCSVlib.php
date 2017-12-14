<?php
  #Opens a given file in read mode
    function openFile($filename){
      $fp=fopen($filename,'r');
      if (!$fp) {
        echo "There was an error loading file: $filename";
        echo "Make sure to check for proper spelling and file location";
        die;
      }
      return $fp;
    }

  #converts CSV file to 2-D array
  function CSV_to_array($file){
    while ($line = fgetcsv($file)) {
      if (!isset($headers)){
        $headers = $line;
      }else {
        $row=array();
        foreach ($line as $key => $value) {
          $row[$headers[$key]]=$value;
        }
        $data[$line[0]]=$row;
      }
      $data['headers']=$headers;
    }
    return $data;
  }

  function read_csv($filename){
    $fp=openFile($filename);
    $data=CSV_to_array($fp);
    return $data;
  }

  function writeCSV($filename, $csv, $row, $col, $val){

    //I'm having an issue visualizing how to make this work so I'm gonna do something terrible
    // //open file for editing
    // $fp=openFile($filename);
    // //this should search for intended row
    // for ($i=0; $i < $row; $i++) {
    //   if (($data = fgetcsv($handle, 1000, ",")) === FALSE) {
    //     break;
    //   }
    // }

    //You Don't want to see this.
    $fp=fopen($filename, "w");
    $csv[$row][$col]=$val;
    foreach ($csv as $rows) {
      fputcsv($fp, $rows);
    }
    fclose($fp);
    return true;
  }
 ?>
