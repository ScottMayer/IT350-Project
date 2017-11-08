<!DOCTYPE html>
<html>
  <head>
    <title>Generate PDF</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Douglas Alpuche">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <div id="banner">
      <!-- I chose absolute links because this div is going to be added to all of my webpages -->
      <a href="/~m190108/default.html"><img src="/~m190108/IT350/img/homeicon.png" alt="IT350 LOGO"><h1>Douglas Alpuche's Course Homepage</h1></a>
      <!-- Original Image Source: https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Go-home.svg/2000px-Go-home.svg.png -->
    </div>
    <div class="container">
    <h1>Page Title</h1>
    <a href="./">Lab Homepage</a>
    <?php
#DEBUG

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

include('./includes/php/error.inc.php');
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
$template_pdf->Write(0, 'This is just a simple text');

$template_pdf->Output("D","Chit.pdf");            

?>
