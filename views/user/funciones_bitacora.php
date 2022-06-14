<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 13/03/2022
 * @Fecha Revision: 
 * @Autor Revision:  
*/


/**
 * Funcion para obtener todos los registros de bitacora
 */

function obtener_registros_bitacora_cliente(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
    idBitacora,
    Sede_idSede,
    Usuario_idUsuario,
    Tramite_idTramite,
    Direccion_idDireccion,
    fecha,
    horaGeneracionTicket,
    horaEntrada,
    horaSalida,
    Observacion,
    numeroTicket
FROM
    bitacora AS b
    INNER JOIN usuario AS u
 ON
    b.Usuario_idUsuario = u.idUsuario");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}


?>