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
        case 1: //catastro
            $stmt = $conexion->prepare("UPDATE
                                            ticketcatastro
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketcatastro.idTicketCatastro = :idTicket;");
            $stmt->bindParam(':idTicket',$_POST['idTicket'],PDO::PARAM_INT);
            $resultado = $stmt->execute();
            if ($resultado) {
                echo 'Registro actualizado';
            }
            break;
        case 2 :    //regulacion predial
            $stmt = $conexion->prepare("UPDATE
                                            ticketpredial
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketpredial.idTicketPredial = :idTicket;");
            $stmt->bindParam(':idTicket',$_POST['idTicket'],PDO::PARAM_INT);
            $resultado = $stmt->execute();
            if ($resultado) {
                echo 'Registro actualizado';
            }
            break;
        case 3 : //propiedad intelectual
            $stmt = $conexion->prepare("UPDATE
                                            ticketpropiedadintelectual
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketpropiedadintelectual.idTicketPropiedadIntelectual = :idTicket;");
            $stmt->bindParam(':idTicket',$_POST['idTicket'],PDO::PARAM_INT);
            $resultado = $stmt->execute();
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
        case 4: //registro inmueble
            $stmt = $conexion->prepare("UPDATE
                                            ticketregistroinmueble
                                        SET
                                            vecesLlamado = vecesLlamado + 1
                                        WHERE
                                            ticketregistroinmueble.idTicketRegistroInmueble = :idTicket;");
            $stmt->bindParam(':idTicket',$_POST['idTicket'],PDO::PARAM_INT);
            $resultado = $stmt->execute();
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
            break;
    }
}
    

?>