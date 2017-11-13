<?php
#DEBUG

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once('./includes/fpdf181/fpdf.php');
require_once('./includes/fpdi/src/autoload.php');
    
    
$filename='./blank_chit.pdf';

$template_pdf=new Fpdi();
$template_pdf->AddPage();
$template_pdf->setSourceFile($filename);
$template_index=$template_pdf->importPage(1);
$template_pdf->useTemplate($template_index,10,10,100);

$template_pdf->SetFont('Helvetica');
$template_pdf->SetTextColor(255, 0, 0);
$template_pdf->SetXY(30, 30);
$template_pdf->Write(0, 'NAME');

$template_pdf->Output("D","Chit.pdf");            

?>
