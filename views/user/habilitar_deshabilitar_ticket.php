<?php
/**
 * Desactivar o activar un ticket
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
 * Editar disponibilidad de ticket
 * 
 */    
if(isset($_POST['direccion']) && isset($_POST['idTicket']) && isset($_POST['disponibilidad']) && isset($_POST['marcarRellamado'])){
    switch($_POST['direccion']){
        case 1: //catastro
            $stmt = $conexion->prepare("UPDATE
                                            ticketcatastro
                                        SET
                                            disponibilidad = :disponibilidad,
                                            marcarRellamado = :marcarRellamado,
                                            llamando = :llamando
                                        WHERE
                                            idTicketCatastro = :idTicket");
            $resultado = $stmt->execute(
                array(
                    ':disponibilidad'  => $_POST["disponibilidad"],
                    ':idTicket'  => $_POST["idTicket"],
                    ':marcarRellamado' => $_POST['marcarRellamado'],
                    ':llamando' => $_POST['llamando']
                )
            );
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
        case 2: // regularizacion predial
            $stmt = $conexion->prepare("UPDATE
                                            ticketpredial
                                        SET
                                            disponibilidad = :disponibilidad,
                                            marcarRellamado = :marcarRellamado,
                                            llamando = :llamando
                                        WHERE
                                            idTicketPredial = :idTicket");
            $resultado = $stmt->execute(
                array(
                    ':disponibilidad'  => $_POST["disponibilidad"],
                    ':idTicket'  => $_POST["idTicket"],
                    ':marcarRellamado' => $_POST['marcarRellamado'],
                    ':llamando' => $_POST['llamando']
                )
            );
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
        case 3: // propiedad intelectual
            $stmt = $conexion->prepare("UPDATE
                                            ticketpropiedadintelectual
                                        SET
                                            disponibilidad = :disponibilidad,
                                            marcarRellamado = :marcarRellamado,
                                            llamando = :llamando
                                        WHERE
                                            idTiketPropiedadIntelectual = :idTicket");
            $resultado = $stmt->execute(
                array(
                    ':disponibilidad'  => $_POST["disponibilidad"],
                    ':idTicket'  => $_POST["idTicketCatastro"],
                    ':marcarRellamado' => $_POST['marcarRellamado'],
                    ':llamando' => $_POST['llamando']
                )
            );
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
        case 4: // registro inmueble
            $stmt = $conexion->prepare("UPDATE
                                            ticketregistroinmueble
                                        SET
                                            disponibilidad = :disponibilidad,
                                            marcarRellamado = :marcarRellamado,
                                            llamando = :llamando
                                        WHERE
                                            idTicketRegistroInmueble = :idTicket");
            $resultado = $stmt->execute(
                array(
                    ':disponibilidad'  => $_POST["disponibilidad"],
                    ':idTicket'  => $_POST["idTicket"],
                    ':marcarRellamado' => $_POST['marcarRellamado'],
                    ':llamando' => $_POST['llamando']
                )
            );
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
    }
}
?>