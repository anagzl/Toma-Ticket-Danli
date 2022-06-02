<?php
/**
 * Obtener los ticket que el usuario marco para rellamar
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 02/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Funcionalidad para obtener tickets que el usuario
 * marco anteriormente para rellamar
 * 
 */    
if (isset($_GET['idUsuario']) && isset($_GET['direccion'])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    idTicketCatastro,
                                    Bitacora_idBitacora,
                                    Bitacora_Sede_idSede,
                                    Usuario_idUsuario,
                                    disponibilidad,
                                    preferencia,
                                    marcarRellamado,
                                    vecesLlamado
                                FROM
                                    ticketcatastro
                                WHERE
                                    Usuario_idUsuario = :idUsuario;");
    $stmt->execute(
        array(
            ':idUsuario' => $_POST['idUsuario']
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idTicketCatastro"] = $fila["idTicketCatastro"];
        $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
        $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
        $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
        $salida["disponibilidad"] = $fila["disponibilidad"];
        $salida["preferencia"] = $fila["preferencia"];
        $salida["marcarRellamado"] = $fila["marcarRellamado"];
        $salida["vecesLlamado"] = $fila["vecesLlamado"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>