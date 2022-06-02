<?php
/**
 * Marcar o desmarcar un ticket para rellamado
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
 * Editar rellamado de ticket
 * 
 */    
if(isset($_POST['idTicket']) && isset($_POST['direccion']) && isset($_POST['marcarRellamado']) && isset($_POST['idUsuario'])){
    switch(strtolower($_POST['direccion'])){
        case "catastro":
            $stmt = $conexion->prepare("UPDATE
                                            ticketcatastro
                                        SET
                                            marcarRellamado = :marcarRellamado
                                        WHERE
                                            idTicketCatastro = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST['idTicket']
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case "regulacion predial":
            $stmt = $conexion->prepare("UPDATE
                                            ticketpredial
                                        SET
                                            marcarRellamado = :marcarRellamado
                                        WHERE
                                            idTicketPredial = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST["idTicket"]
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case "propiedad intelectual":
           $stmt = $conexion->prepare("UPDATE
                                            ticketpropiedadintelectual
                                        SET
                                            marcarRellamado = :marcarRellamado
                                        WHERE
                                            idTicketPropiedadIntelectual = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST["idTicket"]
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case "registro inmueble":
            $stmt = $conexion->prepare("UPDATE
                                            ticketregistroinmueble
                                        SET
                                            marcarRellamado = :marcarRellamado
                                        WHERE
                                            idTicketRegistroInmueble = :idTicket");
            $resultado = $stmt->execute(
            array(
            ':marcarRellamado' => $_POST['marcarRellamado'],
            ':idTicket'  => $_POST["idTicket"]
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
    }
    
}else{echo "hola";}

?>