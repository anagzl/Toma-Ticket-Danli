<?php
/**
 * Obtencion de datos de un registro de bitacora para la base de datos
 * 
 * @Autor: Ana  Zavala
 * @Fecha Creacion: 14/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de cone
 */
    include("../../config/conexion.php");

/**
 * Funcionalidad de la ejecucion de registro unico  
 * Si es una peticion GET devuelve un JSON con los datos
 * Si es POST no hace echo, solo asigna el resultado a una variable
 * Esto para poder usarlo en la impresion del ticket
 * 
 */    
$json = "";
if (isset($_GET["idUsuario"])) {
    $salida = array();
    $stmt = $conexion->prepare(" SELECT
    b.Sede_idSede,
    b.Usuario_idUsuario,
    b.Tramite_idTramite,
    b.Direccion_idDireccion,
    b.fecha,
    b.horaGeneracionTicket,
    b.horaEntrada,
    b.horaSalida,
    b.Observacion
    FROM
        bitacora AS b
    INNER JOIN usuario AS u 
    ON B.Usuario_idUsuario = U.idUsuario
    WHERE U.idUsuario ");
   
    $stmt->execute(
        array(
            'idBitacora' => $_GET['idBitacora']
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        /* $salida["idBitacora"]                = $fila["idBitacora"]; */
        $salida["Sede_idSede"]               = $fila["Sede_idSede"];
        $salida["Usuario_idUsuario"]         = $fila["Usuario_idUsuario"];
        $salida["Tramite_idTramite"]         = $fila["Tramite_idTramite"];
        $salida["Direccion_idDireccion"]     = $fila["Direccion_idDireccion"];
        $salida["fecha"]                     = $fila["fecha"];
        $salida["horaGeneracionTicket"]      = $fila["horaGeneracionTicket"];
        $salida["horaEntrada"]               = $fila["horaEntrada"];
        $salida["horaSalida"]                = $fila["horaSalida"];
        $salida["Observacion"]               = $fila["Observacion"];/* 
        $salida["numeroTicket"]              = $fila["numeroTicket"]; */
    }

    $json = json_encode($salida);
    echo $json;
}else{
    if (isset($_POST["idUsuario"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT
        b.Sede_idSede,
        b.Usuario_idUsuario,
        b.Tramite_idTramite,
        b.Direccion_idDireccion,
        b.fecha,
        b.horaGeneracionTicket,
        b.horaEntrada,
        b.horaSalida,
        b.Observacion
    FROM
        bitacora AS b
    INNER JOIN usuario AS u ");

        $stmt->execute(
            array(
                'idBitacora' => $_POST['idBitacora']
            )
        );
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){

     /*  $salida["idBitacora"]                = $fila["idBitacora"]; */
        $salida["Sede_idSede"]               = $fila["Sede_idSede"];
        $salida["Usuario_idUsuario"]         = $fila["Usuario_idUsuario"];
        $salida["Tramite_idTramite"]         = $fila["Tramite_idTramite"];
        $salida["Direccion_idDireccion"]     = $fila["Direccion_idDireccion"];
        $salida["fecha"]                     = $fila["fecha"];
        $salida["horaGeneracionTicket"]      = $fila["horaGeneracionTicket"];
        $salida["horaEntrada"]               = $fila["horaEntrada"];
        $salida["horaSalida"]                = $fila["horaSalida"];
        $salida["Observacion"]               = $fila["Observacion"];
 /*        $salida["numeroTicket"]              = $fila["numeroTicket"]; */
    }
    
        $json = json_encode($salida);
    }
}
?>