<?php
/**
 * Modificar registros de bitacora
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 30/05/2022
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

if (isset($_POST["idTicketCatastro"])) {
    $stmt = $conexion->prepare("UPDATE
                                    ticketcatastro
                                SET
                                    Bitacora_idBitacora = :Bitacora_idBitacora,
                                    Bitacora_Sede_idSede = :Bitacora_Sede_idSede,
                                    disponibilidad = :disponibilidad,
                                    preferencia = :preferencia,
                                    vecesLlamado = :vecesLlamado
                                WHERE
                                    idTicketCatastro = :idTicketCatastro");
    $resultado = $stmt->execute(
        array(
            ':Bitacora_idBitacora'  => $_POST["Bitacora_idBitacora"],
            ':Bitacora_Sede_idSede'  => $_POST["Bitacora_Sede_idSede"],
            ':disponibilidad'  => $_POST["disponibilidad"],
            ':preferencia'  => $_POST["preferencia"],
            ':vecesLlamado'  => $_POST["vecesLlamado"],
            ':idTicketCatastro'  => $_POST["idTicketCatastro"]
        )
    );
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}
?>