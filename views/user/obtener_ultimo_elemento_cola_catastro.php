<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Obtener ultimo elemento de la cola de catastro,
 * solo se podar obtener un ticket del area y tramite 
 * correspondiente mientras este disponible
 * 
 */    
if(isset($_GET['idTramite'])){
    $salida = array();
    $stmt = $conexion->prepare('SELECT
                                    tc.idTicketCatastro,
                                    tc.Bitacora_idBitacora,
                                    tc.Bitacora_Sede_idSede,
                                    tc.disponibilidad,
                                    tc.preferencia,
                                    b.idBitacora,
                                    b.Tramite_idTramite,
                                    b.Direccion_idDireccion,
                                    d.siglas
                                FROM
                                    ticketcatastro AS tc
                                INNER JOIN bitacora AS b
                                ON
                                    b.idBitacora = tc.Bitacora_idBitacora
                                INNER JOIN direccion AS d
                                ON
                                    d.idDireccion = b.Direccion_idDireccion
                                WHERE
                                    b.Tramite_idTramite = :idTramite
                                    AND 
                                    tc.disponibilidad = 1
                                ORDER BY
                                    idTicketCatastro ASC
                                LIMIT 0, 1;');
    $stmt->execute(
        array(
            ':idTramite'  => $_GET["idTramite"]
            )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idTicketCatastro"] = $fila["idTicketCatastro"];
        $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
        $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
        $salida["disponibilidad"] = $fila["disponibilidad"];
        $salida["preferencia"] = $fila["preferencia"];
        $salida["siglas"] = $fila["siglas"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>