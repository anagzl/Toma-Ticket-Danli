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
 * Editar hora de entrada
 * 
 */    
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    idTicketCatastro,
                                    Bitacora_idBitacora,
                                    Bitacora_Sede_idSede,
                                    disponibilidad,
                                    preferencia
                                FROM
                                    ticketcatastro
                                ORDER BY
                                    idTicketCatastro ASC
                                LIMIT 0, 1;");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idTicketCatastro"] = $fila["idTicketCatastro"];
        $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
        $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
        $salida["disponibilidad"] = $fila["disponibilidad"];
        $salida["preferencia"] = $fila["preferencia"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>