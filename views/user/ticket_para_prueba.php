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
// require('../../assets/fpdf184/fpdf.php');
include('../../assets/phpqrcode/qrlib.php');
require('pdf_js.php');

class PDF_AutoPrint extends PDF_JavaScript
{

    // function Close(){
    //     $script = "window.onfocus=function(){ window.close();}";
    //     $this->IncludeJS($script);
    // }

    function AutoPrint($printer='')
    {
        // Open the print dialog
        if($printer)
        {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
        }
        else{
            $script = 'print(true);';
            // $script .= "window.onfocus=function(){ window.close();}";
        }
        
        $this->IncludeJS($script);
    }
   
}

// $pdf = new PDF_AutoPrint();
// $pdf->AddPage();
// $pdf->SetFont('Arial', '', 20);
// $pdf->Text(90, 50, 'Print me!');
// $pdf->AutoPrint();
// $pdf->Output();


if(isset($_GET["idTicket"])){
    require('obtener_ticket_prueba_ticket.php');
    $jsonObject = json_decode($json);
}

$idBitacora = $jsonObject->Bitacora_idBitacora;
$numeroTicket = $jsonObject->idTicket;
$nombreUsuario = "$jsonObject->primerNombre $jsonObject->primerApellido";
$dateObject = new DateTime(`$jsonObject->fecha`);
$fechaEspanol = $dateObject->format('d-m-Y');
$fechaHora = "$fechaEspanol ($jsonObject->horaGeneracionTicket)";
//codigo de direccion
$codigoDireccion = $jsonObject->sigla;
// numero de ticket con zerofill
$numeroTicketZeroFill = sprintf("%03d", $numeroTicket);



//qr con id de bitacora
QRcode::png("$idBitacora",'../../files/QR/QRTicket.png', QR_ECLEVEL_L, 3);

//crear objeto FPDF
$pdf= new PDF_AutoPrint('P','mm',array(80,80));
// $pdf = new PDF_AutoPrint();
$mid_x = $pdf->GetPageWidth() / 2;

//titulo
$pdf->SetTitle("Ticket $codigoDireccion$numeroTicketZeroFill");

//establecer fuente para el documento
$pdf->SetFont('Helvetica','B',20);

//set up a page
$pdf->AddPage('P');


//titulo qr id
$pdf->SetFontSize(10);
$pdf->Text($pdf->GetPageWidth() - 4 - ($pdf->GetStringWidth("ID: $idBitacora")), 5, "ID: $idBitacora");

//qr generado anteriormente con el id de la bitacora
$pdf->Image('../../files/QR/QRTicket.png',60,5,18,0);
//logo centrado
$pdf->Image('../../img/logoInstitucion/LOGO NEGRO HORIZONTAL.png',4,6,75,0);

//texto de bienvenido
$pdf->SetFontSize(13);
$pdf->Text($mid_x - ($pdf->GetStringWidth("Bienvenido \"$nombreUsuario\"") / 2), 27, "Bienvenido \"$nombreUsuario\"");

// sede
$pdf->Text($mid_x - ($pdf->GetStringWidth("$jsonObject->nombre_departamento / $jsonObject->siglas_sede") / 2), 34, utf8_decode("$jsonObject->nombre_departamento / $jsonObject->siglas_sede"));



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
$pdf->AutoPrint();
// $pdf->Output("../../files/ticket.pdf",'F'); 
$pdf->Output("ticket$codigoDireccion$numeroTicket.pdf",'I'); 

// $pdf->Close();


?>

