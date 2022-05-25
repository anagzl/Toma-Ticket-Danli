<?php 
require('../assets/fpdf184/fpdf.php');
include('../../assets/phpqrcode/qrlib.php');

$idBitacora = 18;
$numeroTicket = 999;
$nombreUsuario = "Jonathan Laux";
$fechaHora = "2022-05-27 (11:26)";
//codigo de direccion
$codigoDireccion = 'RI';
// numero de ticket con zerofill
$numeroTicketZeroFill = sprintf("%03d", $numeroTicket);

//qr con id de bitacora
QRcode::png("$idBitacora",'../../files/QR/QRTicket.png', QR_ECLEVEL_L, 3);

//crear objeto FPDF
$pdf= new FPDF('P','mm',array(80,100));
$mid_x = $pdf->GetPageWidth() / 2;

//titulo
$pdf->SetTitle("Ticket $codigoDireccion$numeroTicketZeroFill");

//establecer fuente para el documento
$pdf->SetFont('Helvetica','B',20);

//set up a page
$pdf->AddPage('P');

//qr generado anteriormente con el id de la bitacora
$pdf->Image('../../files/QR/QRTicket.png',60,5,15,0);
//logo centrado
$pdf->Image('../../img/logoInstitucion/LOGO IP 3-01.png',20,5,40,0);

//texto de bienvenido
$pdf->SetFontSize(10);
$pdf->Text($mid_x - ($pdf->GetStringWidth("Bienvenido $nombreUsuario") / 2), 22, "Bienvenido $nombreUsuario");

// sede
$pdf->SetXY (10,25);
$pdf->Write(5,'Francisco Morazan / Tegucigalpa');

// numero de ticket
$pdf->SetFontSize(60);
$pdf->Text($mid_x - ($pdf->GetStringWidth("$codigoDireccion$numeroTicketZeroFill") / 2), 50, "$codigoDireccion$numeroTicketZeroFill");

// hora
$pdf->SetFontSize(10);
$pdf->Text($mid_x - ($pdf->GetStringWidth("$fechaHora") / 2), 57, "$fechaHora");
// pagina web
$pdf->Text($mid_x - ($pdf->GetStringWidth("www.ip.gob.hn") / 2), 63, "www.ip.gob.hn");
// disclaimer
$pdf->SetFontSize(8);
$pdf->Text($mid_x - ($pdf->GetStringWidth("Tickets pueden no ser llamados en secuencia") / 2), 68, "Ticket pueden no ser llamados en secuencia");



//Output the document
$pdf->Output("ticket$codigoDireccion$numeroTicket.pdf",'I'); 
?>