<?php 
require('../assets/fpdf184/fpdf.php');

//create a FPDF object
$pdf= new FPDF('P','mm',array(80,100));

$pdf->SetTitle("Ticket");

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);

//set up a page
$pdf->AddPage('P');

//qr
$pdf->Image('../../img/logoInstitucion/LOGO IP 3-01.png',20,5,40,0);
//logo centrado
$pdf->Image('../../img/logoInstitucion/LOGO IP 3-01.png',20,5,40,0);

//texto de bienvenido
$pdf->SetXY (20,18);
$pdf->SetFontSize(10);
$pdf->Write(5,'Bienvenido Usuario');
// sede
$pdf->SetXY (10,25);
$pdf->Write(5,'Francisco Morazan / Tegucigalpa');
// numero de ticket
$pdf->SetXY (25,35);
$pdf->SetFontSize(65);
$pdf->Write(5,'C005');
// hora
$pdf->SetXY (25,55);
$pdf->SetFontSize(10);
$pdf->Write(5,'2022-23-05 (11:26)');
// pagina web
$pdf->SetXY(25,60);
$pdf->Write(5,'www.ip.gob.hn');
// disclaimer
$pdf->SetXY(5,65);
$pdf->SetFontSize(8);
$pdf->Write(5,'Tickets pueden no ser llamados en secuencia');


//Output the document
$pdf->Output('ticket.pdf','I'); 
?>