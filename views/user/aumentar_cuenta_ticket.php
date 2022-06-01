<?php
/**
 * Aumentar el registro por 1 para un ticket en especifico
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
 * Editar las veces que se llama el ticket
 * 
 */    
if(isset($_POST['direccion']) && isset($_POST['idTicket'])){
    switch(strtolower($_POST['direccion'])){
        case "catastro" :
            $stmt = $conexion->prepare("UPDATE
                                            ticketcatastro
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketcatastro.idTicketCatastro = :idTicket;");
            $resultado = $stmt->execute(
                array(
                    "idTicket" => $_POST['idTicket']
                    )
                );
            if ($resultado) {
                echo 'Registro actualizado';
            }
            break;

        case "regulacion predial" :
            $stmt = $conexion->prepare("UPDATE
                                            ticketpredial
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketpredial.Bitacora_idBitacora = :idTicket;");
            $resultado = $stmt->execute(
                array(
                    "idTicket" => $_POST['idTicket']
                    )
                );
            if ($resultado) {
                echo 'Registro actualizado';
            }
            break;
            case "propiedad intelectual" :
                $resultado = $stmt->fetchAll();
                $stmt = $conexion->prepare("UPDATE
                                                ticketpropiedadintelectual
                                            SET
                                                vecesLlamado = vecesLlamado + 1
                                            WHERE
                                                ticketpropiedadintelectual.Bitacora_idBitacora = :idTicket;");
                $resultado = $stmt->execute(
                    array(
                        "idTicket" => $_POST['idTicket']
                        )
                    );
                if (!empty($resultado)) {
                    echo 'Registro actualizado';
                }
                break;
            case "registro inmueble" :
                $resultado = $stmt->fetchAll();
                $stmt = $conexion->prepare("UPDATE
                                                ticketregistroinmueble
                                            SET
                                                vecesLlamado = vecesLlamado + 1
                                            WHERE
                                                ticketregistroinmueble.Bitacora_idBitacora = :idTicket;");
                $resultado = $stmt->execute(
                    array(
                        "idTicket" => $_POST['idTicket']
                        )
                    );
                if (!empty($resultado)) {
                    echo 'Registro actualizado';
                }
                break;
    }
}
    

?>