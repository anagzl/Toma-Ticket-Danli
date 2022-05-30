<?php
/**
 * Desactivar ticket
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
 * Editar disponibildad de ticket
 * 
 */    

if (isset($_POST["idTicketCatastro"])) {
    $stmt = $conexion->prepare("UPDATE
                                    ticketcatastro
                                SET
                                    disponibilidad = :disponibilidad
                                WHERE
                                    idTicketCatastro = :idTicketCatastro");
    $resultado = $stmt->execute(
        array(
            ':disponibilidad'  => $_POST["disponibilidad"],
            ':idTicketCatastro'  => $_POST["idTicketCatastro"]
        )
    );
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}
?>