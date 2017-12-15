<?php
#DEBUG

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('./includes/fpdf181/fpdf.php');
require_once('./includes/fpdi/src/autoload.php');
    
if(isset($_SESSION['filename'])){
  $fname = "./chits/" . $_SESSION['filename'];

  if(is_file($fname)){
    $raw_data = file_get_contents($fname);
    $data = unserialize($raw_data);

    if($debug){

      echo "<pre>";
      print_r($data);
      echo "</pre>";

    }


    if($debug){

      echo "<pre>";
      print_r($_SESSION);
      echo "</pre>";

    }

  }
  else{
    //file doesn't exist
  }

}
else{
  //filename is not set
}

#DEBUG
$fname = "./chits/m180594_chit1.txt";

$raw_data = file_get_contents($fname);
$data = unserialize($raw_data);
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
$template_pdf->SetXY(120, 32);
$template_pdf->Write(0, "".$data['FROM_CLASS']." ".$data['FROM_FIRST_NAME']." ".$data['FROM_LAST_NAME']);

$template_pdf->SetXY(185, 32);
$template_pdf->Write(0, "".$data['FROM_ALPHA']);


$template_pdf->SetXY(20, 40);
$template_pdf->Write(0, "Chain-of-Command");

$template_pdf->SetXY(120, 42);
$template_pdf->Write(0, "".$data['FROM_CLASS_YEAR']);

$template_pdf->SetXY(145, 42);
$template_pdf->Write(0, "".$data['FROM_COMPANY']);

$template_pdf->SetXY(165, 42);
$template_pdf->Write(0, "".$data['FROM_ROOM_NUMBER']);

$template_pdf->SetXY(184, 42);
$template_pdf->Write(0, "".$data['FROM_RANK']);

$template_pdf->SetXY(120, 50);
$template_pdf->Write(0, "".$data['SQPR']);

$template_pdf->SetXY(145, 50);
$template_pdf->Write(0, "".$data['CQPR']);
$template_pdf->SetXY(165, 50);
$template_pdf->Write(0, "".$data['APTITUDE_GRADE']);
$template_pdf->SetXY(195, 50);
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


$template_pdf->SetXY(90, 123);
$template_pdf->Write(0, "".$data['DATE']);

$template_pdf->SetXY(118, 123);
$template_pdf->Write(0, "".$data['BEGIN_DATE_TIME']);

$template_pdf->SetXY(118, 123);
$template_pdf->Write(0, "".$data['BEGIN_DATE_TIME']);

$template_pdf->SetXY(165, 123);
$template_pdf->Write(0, "".$data['END_DATE_TIME']);


$template_pdf->SetXY(5,136);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);
$template_pdf->SetXY(5,138);
$template_pdf->Write(0, "".$data['COC_1_NAME']);


$template_pdf->SetXY(5,140);
$template_pdf->Write(0, "".$data['COC_2_BILLET']);
$template_pdf->SetXY(5,142);
$template_pdf->Write(0, "".$data['COC_2_NAME']);

$template_pdf->SetXY(5,146);
$template_pdf->Write(0, "".$data['COC_3_BILLET']);
$template_pdf->SetXY(5,148);
$template_pdf->Write(0, "".$data['COC_3_NAME']);


$template_pdf->SetXY(5,152);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);

$template_pdf->SetXY(5,156);
$template_pdf->Write(0, "".$data['COC_1_NAME']);

$template_pdf->SetXY(5,152);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);

$template_pdf->SetXY(5,156);
$template_pdf->Write(0, "".$data['COC_1_NAME']);
$template_pdf->SetXY(5,152);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);

$template_pdf->SetXY(5,156);
$template_pdf->Write(0, "".$data['COC_1_NAME']);
$template_pdf->SetXY(5,152);
$template_pdf->Write(0, "".$data['COC_1_BILLET']);

$template_pdf->SetXY(5,156);
$template_pdf->Write(0, "".$data['COC_1_NAME']);



$template_pdf->Output("D","Chit.pdf");            

?>
