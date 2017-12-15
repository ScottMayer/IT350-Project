<?php
#DEBUG
session_start();

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('./includes/fpdf181/fpdf.php');
require_once('./includes/fpdi/src/autoload.php');

if(isset($_SESSION['filename'])){
  $fname = "./chits/" . $_SESSION['filename'];

  if(is_file($fname)){
    $raw_data = file_get_contents($fname);
    $data = unserialize($raw_data);

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
  echo "FILE NOT THERE";
  die;
  }

}
else{
  //filename is not set
  echo "FILENAME NOT SET";
  die;
}

#DEBUG
#$fname = "./chits/m183990_chit1.txt";
#$raw_data = file_get_contents($fname);
#$data = unserialize($raw_data);
#END DEBUG

$filename='./blank_chit.pdf';

$template_pdf=new Fpdi();
$template_pdf->AddPage();
$template_pdf->setSourceFile($filename);
$template_index=$template_pdf->importPage(1);
$template_pdf->useTemplate($template_index,-4);
$template_pdf->SetMargins(0,0,0);
$template_pdf->SetFont('Courier');
$template_pdf->SetFontSize(8);
$template_pdf->SetTextColor(0,0,0);


$template_pdf->SetXY(5, 29);
$template_pdf->Write(0, "".$data['TO_RANK']." ".$data['TO_NAME']." ".$data['TO_SERVICE']);

$template_pdf->SetXY(5, 32);
$template_pdf->Write(0, "".$data['TO_BILLET']);

$template_pdf->SetXY(105, 32);
$template_pdf->Write(0, "".$data['FROM_CLASS']." ".$data['FROM_FIRST_NAME']." ".$data['FROM_LAST_NAME']);

$template_pdf->SetXY(185, 32);
$template_pdf->Write(0, "".$data['FROM_ALPHA']);


$template_pdf->SetXY(10, 40);
$template_pdf->Write(0, "Chain-of-Command");

$template_pdf->SetXY(10, 50);
$template_pdf->Write(0, "".$data['REFERENCE']);

$template_pdf->SetXY(110, 42);
$template_pdf->Write(0, "".$data['FROM_CLASS_YEAR']);

$template_pdf->SetXY(135, 42);
$template_pdf->Write(0, "".$data['FROM_COMPANY']);

$template_pdf->SetXY(160, 42);
$template_pdf->Write(0, "".$data['FROM_ROOM_NUMBER']);

$template_pdf->SetXY(184, 42);
$template_pdf->Write(0, "".$data['FROM_RANK']);

$template_pdf->SetXY(110, 52);
$template_pdf->Write(0, "".$data['SQPR']);


$template_pdf->SetXY(5, 67);
$template_pdf->Write(0, "".$data['ADDRESS_1']);

$template_pdf->SetXY(41, 67);
$template_pdf->Write(0, "".$data['ADDRESS_2']);

$template_pdf->SetXY(106, 67);
$template_pdf->Write(0, "".$data['ADDRESS_CITY']);

$template_pdf->SetXY(152, 67);
$template_pdf->Write(0, "".$data['ADDRESS_STATE']);

$template_pdf->SetXY(160, 67);
$template_pdf->Write(0, "".$data['ADDRESS_ZIP']);

$template_pdf->SetXY(180, 67);
$template_pdf->Write(0, "".$data['PHONE']);

//
// $template_pdf->SetXY(10, 73);
// $template_pdf->Write(0, "".$data['REMARKS']);

$reference = str_split($data['REMARKS'], 115);
// $template_pdf->SetXY(10, 77);
// $template_pdf->Write(0, "".$reference[0]);

$x = 6;
$y = 74;
foreach ($reference as $string) {
	
	$template_pdf->SetXY($x, $y);
	$template_pdf->Write(0, "".$string);
	$y += 3;
}


$template_pdf->SetXY(135, 52);
$template_pdf->Write(0, "".$data['CQPR']);
$template_pdf->SetXY(160, 52);
$template_pdf->Write(0, "".$data['APTITUDE_GRADE']);
$template_pdf->SetXY(184, 52);
$template_pdf->Write(0, "".$data['CONDUCT_GRADE']);

if($data['REQUEST_TYPE'] == 'WEEKEND_LIBERTY'){
$template_pdf->SetXY(35, 61);
$template_pdf->Write(0, "X");

}else if($data['REQUEST_TYPE'] == 'DINING_OUT'){
$template_pdf->SetXY(65, 61);
$template_pdf->Write(0, "X");
}else if($data['REQUEST_TYPE'] == 'LEAVE'){
$template_pdf->SetXY(90, 61);
$template_pdf->Write(0, "X");
}else{
#OTHER
$template_pdf->SetXY(130, 61);
$template_pdf->Write(0, "".$data['X']);
$template_pdf->SetXY(145, 61);
$template_pdf->Write(0, "".$data['OTHER_DESCRIPTION']);
}

#ADDRESS


$template_pdf->SetXY(87, 123);
$template_pdf->Write(0, "".$data['DATE']);

$template_pdf->SetXY(112, 123);
$template_pdf->Write(0, "".$data['BEGIN_DATE_TIME']);

$template_pdf->SetXY(160, 123);
$template_pdf->Write(0, "".$data['END_DATE_TIME']);


$template_pdf->SetFontSize(6);

$template_pdf->SetXY(5,136);
$template_pdf->Write(0, "".$data['COC_1_NAME']);
$template_pdf->SetXY(5,138);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);

if( isset($data['COC_1_USERNAME']) && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,137);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_1_USERNAME']) && isset($data['COC_1_STATUS']) && $data['COC_1_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,137);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_1_USERNAME'])  && !empty($data['COC_1_USERNAME'])){
  $template_pdf->SetXY(37,137);
  $template_pdf->Write(0, "PENDING");
}


$template_pdf->SetXY(5,143);
$template_pdf->Write(0, "".$data['COC_2_NAME']);
$template_pdf->SetXY(5,145);
$template_pdf->Write(0, "".$data['COC_2_BILLET']);
if( isset($data['COC_2_USERNAME']) && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,144);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_2_USERNAME']) && isset($data['COC_2_STATUS']) && $data['COC_2_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,144);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_2_USERNAME'])  && !empty($data['COC_2_USERNAME'])){
  $template_pdf->SetXY(37,144);
  $template_pdf->Write(0, "PENDING");
}



$template_pdf->SetXY(5,150);
$template_pdf->Write(0, "".$data['COC_3_NAME']);
$template_pdf->SetXY(5,152);
$template_pdf->Write(0, "".$data['COC_3_BILLET']);
if( isset($data['COC_3_USERNAME']) && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,151);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_3_USERNAME']) && isset($data['COC_3_STATUS']) && $data['COC_3_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,151);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_3_USERNAME'])  && !empty($data['COC_3_USERNAME'])){
  $template_pdf->SetXY(37,151);
  $template_pdf->Write(0, "PENDING");
}


$template_pdf->SetXY(5,157);
$template_pdf->Write(0, "".$data['COC_4_NAME']);
$template_pdf->SetXY(5,159);
$template_pdf->Write(0, "".$data['COC_4_BILLET']);
if( isset($data['COC_4_USERNAME']) && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,158);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_4_USERNAME']) && isset($data['COC_4_STATUS']) && $data['COC_4_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,158);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_4_USERNAME'])  && !empty($data['COC_4_USERNAME'])){
  $template_pdf->SetXY(37,158);
  $template_pdf->Write(0, "PENDING");
}

$template_pdf->SetXY(5,170);
$template_pdf->Write(0, "".$data['COC_5_NAME']);
$template_pdf->SetXY(5,172);
$template_pdf->Write(0, "".$data['COC_5_BILLET']);
if( isset($data['COC_5_USERNAME']) && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,171);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_5_USERNAME']) && isset($data['COC_5_STATUS']) && $data['COC_5_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,171);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_5_USERNAME']) && !empty($data['COC_5_USERNAME'])){
  $template_pdf->SetXY(37,171);
  $template_pdf->Write(0, "PENDING");
}


$template_pdf->SetXY(5,177);
$template_pdf->Write(0, "".$data['COC_6_NAME']);
$template_pdf->SetXY(5,179);
$template_pdf->Write(0, "".$data['COC_6_BILLET']);
if( isset($data['COC_6_USERNAME']) && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,178);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_6_USERNAME']) && isset($data['COC_6_STATUS']) && $data['COC_6_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,178);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_6_USERNAME']) && !empty($data['COC_6_USERNAME'])){
  $template_pdf->SetXY(37,178);
  $template_pdf->Write(0, "PENDING");
}


$template_pdf->SetXY(5,185);
$template_pdf->Write(0, "".$data['COC_7_NAME']);
$template_pdf->SetXY(5,187);
$template_pdf->Write(0, "".$data['COC_7_BILLET']);
if( isset($data['COC_7_USERNAME']) && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,186);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_7_USERNAME']) && isset($data['COC_7_STATUS']) && $data['COC_7_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,186);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_7_USERNAME']) && !empty($data['COC_7_USERNAME'])){
  $template_pdf->SetXY(37,186);
  $template_pdf->Write(0, "PENDING");
}

$template_pdf->SetXY(5,191);
$template_pdf->Write(0, "".$data['COC_8_NAME']);
$template_pdf->SetXY(5,193);
$template_pdf->Write(0, "".$data['COC_8_BILLET']);
if( isset($data['COC_8_USERNAME']) && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,192);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_8_USERNAME']) && isset($data['COC_8_STATUS']) && $data['COC_8_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,192);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_8_USERNAME']) && !empty($data['COC_8_USERNAME'])){
  $template_pdf->SetXY(37,192);
  $template_pdf->Write(0, "PENDING");
}

$template_pdf->SetXY(5,198);
$template_pdf->Write(0, "".$data['COC_9_NAME']);
$template_pdf->SetXY(5,200);
$template_pdf->Write(0, "".$data['COC_9_BILLET']);
if( isset($data['COC_9_USERNAME']) && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "APPROVED"){
  $template_pdf->SetXY(62,199);
  $template_pdf->Write(0, "APPROVED");
}
elseif(isset($data['COC_9_USERNAME']) && isset($data['COC_9_STATUS']) && $data['COC_9_STATUS'] == "DENIED"){
  $template_pdf->SetXY(89,199);
  $template_pdf->Write(0, "DENIED");
}
elseif(isset($data['COC_9_USERNAME']) && !empty($data['COC_9_USERNAME'])){
  $template_pdf->SetXY(37,199);
  $template_pdf->Write(0, "PENDING");
}


$template_pdf->Output("D","Chit.pdf");

?>
