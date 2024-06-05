<?php
/**
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 14/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */

/**
 * Funcion para marcar un ticket como llamando
 * De esta forma se sabe si un ticket esta siendo llamado por un empleado
 * 
 */    

 function editar_llamando_ticket_catastro($idTicket,$llamando,$idEmpleado,$conn){
    $stmt = $conn->prepare("UPDATE
                                ticketcatastro
                            SET
                                llamando = :llamando,
                                Empleado_idEmpleado = :idEmpleado 
                            WHERE
                                idTicketCatastro = :idTicket");
    $stmt->bindParam(":llamando",$llamando,PDO::PARAM_INT);
    $stmt->bindParam(":idTicket",$idTicket,PDO::PARAM_INT);
    $stmt->bindParam(":idEmpleado",$idEmpleado,PDO::PARAM_INT);
    $stmt->execute();
    if(!empty($stmt)){
        echo "Registro actualizado";
    }
 }

 function editar_llamando_ticket_predial($idTicket,$llamando,$idEmpleado,$conn){
    $stmt = $conn->prepare("UPDATE
                                ticketpredial
                            SET
                                llamando = :llamando,
                                Empleado_idEmpleado = :idEmpleado
                            WHERE
                                idTicketPredial = :idTicket");
    $stmt->bindParam(":llamando",$llamando,PDO::PARAM_INT);
    $stmt->bindParam(":idTicket",$idTicket,PDO::PARAM_INT);
    $stmt->bindParam(":idEmpleado",$idEmpleado,PDO::PARAM_INT);

    $stmt->execute();
    if(!empty($stmt)){
        echo "Registro actualizado";
    }
 }

 function editar_llamando_ticket_propiedad_intelectual($idTicket,$llamando,$idEmpleado,$conn){
    $stmt = $conn->prepare("UPDATE
                                ticketpropiedadintelectual
                            SET
                                llamando = :llamando,
                                Empleado_idEmpleado = :idEmpleado
                            WHERE
                                idTicketPropiedadIntelectual = :idTicket");
    $stmt->bindParam(":llamando",$llamando,PDO::PARAM_INT);
    $stmt->bindParam(":idTicket",$idTicket,PDO::PARAM_INT);
    $stmt->bindParam(":idEmpleado",$idEmpleado,PDO::PARAM_INT);
    $stmt->execute();
    if(!empty($stmt)){
        echo "Registro actualizado";
    }
 }

 function editar_llamando_ticket_registro_inmueble($idTicket,$llamando,$idEmpleado,$conn){
    $stmt = $conn->prepare("UPDATE
                                ticketregistroinmueble
                            SET
                                llamando = :llamando,
                                Empleado_idEmpleado = :idEmpleado
                            WHERE
                                idTicketRegistroInmueble = :idTicket");
    $stmt->bindParam(":llamando",$llamando,PDO::PARAM_INT);
    $stmt->bindParam(":idTicket",$idTicket,PDO::PARAM_INT);
    $stmt->bindParam(":idEmpleado",$idEmpleado,PDO::PARAM_INT);
    $stmt->execute();
    if(!empty($stmt)){
        echo "Registro actualizado";
    }
 }

 if(isset($_POST['direccion']) && isset($_POST['idTicket']) && isset($_POST['idEmpleado'])){
    // configuracion de conexion
    include("../../config/conexion.php");
    switch($_POST['direccion']){
        case 1: //catastro
            editar_llamando_ticket_catastro($_POST['idTicket'],$_POST['llamando'],$_POST['idEmpleado'],$conexion);
        break;
        case 2: //regularizacion predial
            editar_llamando_ticket_predial($_POST['idTicket'],$_POST['llamando'],$_POST['idEmpleado'],$conexion);
        break;
        case 3: //propiedad intelectual
            editar_llamando_ticket_propiedad_intelectual($_POST['idTicket'],$_POST['llamando'],$_POST['idEmpleado'],$conexion);
        break;
        case 4: //registro inmueble
            editar_llamando_ticket_registro_inmueble($_POST['idTicket'],$_POST['llamando'],$_POST['idEmpleado'],$conexion);
        break;
    }
 }

?>