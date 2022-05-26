<?php 
/**
 * Formato de funcion para carga de informacion en el datetable de rol 
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento 
 */
include("../../config/conexion.php");

/**
 * Funcionalidad de la ejecucion de todos los regitros  
 * Si es una peticion GET devuelve un JSON con los datos
 * Si es POST solo asigna el resultado a una variable
 * Esto para poder usarlo en la impresion del ticket
 * 
 */    
require('../assets/fpdf184/fpdf.php');
include('../../assets/phpqrcode/qrlib.php');


if(isset($_POST["idBitacora"])){
    require('obtener_bitacora.php');
    $jsonObject = json_decode($json);
}


$idBitacora = $jsonObject->idBitacora;
$numeroTicket = $jsonObject->numeroTicket;
$nombreUsuario = "$jsonObject->primerNombre $jsonObject->primerApellido";
$fechaHora = "$jsonObject->fecha ($jsonObject->horaGeneracionTicket)";
//codigo de direccion
$codigoDireccion = $jsonObject->siglas;
// numero de ticket con zerofill
$numeroTicketZeroFill = sprintf("%03d", $numeroTicket);

//qr con id de bitacora
QRcode::png("$idBitacora",'../../files/QR/QRTicket.png', QR_ECLEVEL_L, 3);

//crear objeto FPDF
$pdf= new FPDF('P','mm',array(80,80));
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
$pdf->Text($mid_x - ($pdf->GetStringWidth("$jsonObject->siglas_ubicacion / $jsonObject->nombre_departamento") / 2), 30, "$jsonObject->siglas_ubicacion / $jsonObject->nombre_departamento");

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