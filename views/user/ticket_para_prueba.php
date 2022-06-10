<?php 
/**
 * Formato de ticket 
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * COnfiguracion de conexion
 */
include("../../config/conexion.php");

/**
 * Funcionalidad para imprimir ticket
 * Para poder visualizar e imprimir el ticket
 * se debe hacer una peticion post y enviar
 * el id de la bitacora correspondiente al ticket
 * 
 */    
require('../../assets/fpdf184/fpdf.php');
include('../../assets/phpqrcode/qrlib.php');

// class PDF_JavaScript extends FPDF {

//     var $javascript;
//     var $n_js;

//     function IncludeJS($script) {
//         $this->javascript=$script;
//     }

//     function _putjavascript() {
//         $this->_newobj();
//         $this->n_js=$this->n;
//         $this->_out('<<');
//         $this->_out('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
//         $this->_out('>>');
//         $this->_out('endobj');
//         $this->_newobj();
//         $this->_out('<<');
//         $this->_out('/S /JavaScript');
//         $this->_out('/JS '.$this->_textstring($this->javascript));
//         $this->_out('>>');
//         $this->_out('endobj');
//     }

//     function _putresources() {
//         parent::_putresources();
//         if (!empty($this->javascript)) {
//             $this->_putjavascript();
//         }
//     }

//     function _putcatalog() {
//         parent::_putcatalog();
//         if (!empty($this->javascript)) {
//             $this->_out('/Names <</JavaScript '.($this->n_js).' 0 R>>');
//         }
//     }
// }

// class PDF_AutoPrint extends PDF_JavaScript
// {
// function AutoPrint($dialog=false)
// {
//     //Open the print dialog or start printing immediately on the standard printer
//     $param=($dialog ? 'true' : 'false');
//     $script="print($param);";
//     $this->IncludeJS($script);
// }

// function AutoPrintToPrinter($server, $printer, $dialog=false)
// {
//     //Print on a shared printer (requires at least Acrobat 6)
//     $script = "var pp = getPrintParams();";
//     if($dialog)
//         $script .= "pp.interactive = pp.constants.interactionLevel.full;";
//     else
//         $script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
//     $script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
//     $script .= "print(pp);";
//     $this->IncludeJS($script);
// }
// }

// $pdf=new PDF_AutoPrint();
// $pdf->AddPage();
// $pdf->SetFont('Arial','',20);
// $pdf->Text(90, 50, 'Print me!');
// //Open the print dialog
// $pdf->AutoPrint(true);
// $pdf->Output();


if(isset($_GET["idBitacora"])){
    require('obtener_bitacora_prueba_ticket.php');
    // echo $json;
    $jsonObject = json_decode($json);
}


$idBitacora = $jsonObject->idBitacora;
$numeroTicket = $jsonObject->numeroTicket;
$nombreUsuario = "$jsonObject->primerNombre $jsonObject->primerApellido";
$fechaHora = "$jsonObject->fecha ($jsonObject->horaGeneracionTicket)";
//codigo de direccion
$codigoDireccion = $jsonObject->siglas_direccion;
// numero de ticket con zerofill
$numeroTicketZeroFill = sprintf("%03d", $numeroTicket);



//qr con id de bitacora
QRcode::png("$idBitacora",'../../files/QR/QRTicket.png', QR_ECLEVEL_L, 3);

//crear objeto FPDF
$pdf= new FPDF('P','mm',array(80,90));
$mid_x = $pdf->GetPageWidth() / 2;

//titulo
$pdf->SetTitle("Ticket $codigoDireccion$numeroTicketZeroFill");

//establecer fuente para el documento
$pdf->SetFont('Helvetica','B',20);

//set up a page
$pdf->AddPage('P');


//titulo qr id
$pdf->SetFontSize(10);
$pdf->Text(62, 5, "ID:");

//qr generado anteriormente con el id de la bitacora
$pdf->Image('../../files/QR/QRTicket.png',60,5,18,0);
//logo centrado
$pdf->Image('../../img/logoInstitucion/LOGO NEGRO HORIZONTAL.png',4,6,75,0);

//texto de bienvenido
$pdf->SetFontSize(15);
$pdf->Text($mid_x - ($pdf->GetStringWidth("Bienvenido $nombreUsuario") / 2), 27, "Bienvenido $nombreUsuario");

// sede
$pdf->Text($mid_x - ($pdf->GetStringWidth("$jsonObject->siglas_sede / $jsonObject->nombre_departamento") / 2), 34, "$jsonObject->siglas_sede / $jsonObject->nombre_departamento");



// numero de ticket
$pdf->SetFontSize(65);
$pdf->Text($mid_x - ($pdf->GetStringWidth("$codigoDireccion$numeroTicketZeroFill") / 2), 55, "$codigoDireccion$numeroTicketZeroFill");

// hora
$pdf->SetFontSize(12);
$pdf->Text($mid_x - ($pdf->GetStringWidth("$fechaHora") / 2), 62, "$fechaHora");
// pagina web
$pdf->Text($mid_x - ($pdf->GetStringWidth("www.ip.gob.hn") / 2), 69, "www.ip.gob.hn");
// disclaimer
$pdf->SetFontSize(8);
$pdf->Text($mid_x - ($pdf->GetStringWidth("Tickets pueden no ser llamados en secuencia") / 2), 74, "Ticket pueden no ser llamados en secuencia");



//Output the document
$pdf->Output("ticket$codigoDireccion$numeroTicket.pdf",'I'); 
?>

