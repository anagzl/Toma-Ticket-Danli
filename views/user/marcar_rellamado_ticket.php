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
if(isset($_POST['idTicket']) && isset($_POST['direccion']) && isset($_POST['marcarRellamado']) && isset($_POST['idEmpleado'])){
    switch($_POST['direccion']){
        case 1: //catastro
            $stmt = $conexion->prepare("UPDATE
                                            ticketcatastro
                                        SET
                                            marcarRellamado = :marcarRellamado,
                                            Empleado_idEmpleado = :idEmpleado,
                                            disponibilidad = 0,
                                            vecesLlamado = 0
                                        WHERE
                                            idTicketCatastro = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST['idTicket'],
                'idEmpleado' => $_POST['idEmpleado']
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case 2: //regularizacion predial
            $stmt = $conexion->prepare("UPDATE
                                            ticketpredial
                                        SET
                                            marcarRellamado = :marcarRellamado,
                                            Empleado_idEmpleado = :idEmpleado,
                                            disponibilidad = 0,
                                            vecesLlamado = 0
                                        WHERE
                                            idTicketPredial = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST["idTicket"],
                'idEmpleado' => $_POST['idEmpleado']
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case 3: //propiedad intelectual
           $stmt = $conexion->prepare("UPDATE
                                            ticketpropiedadintelectual
                                        SET
                                            marcarRellamado = :marcarRellamado,
                                            Empleado_idEmpleado = :idEmpleado,
                                            disponibilidad = 0,
                                            vecesLlamado = 0
                                        WHERE
                                            idTicketPropiedadIntelectual = :idTicket");
            $resultado = $stmt->execute(
            array(
                ':marcarRellamado' => $_POST['marcarRellamado'],
                ':idTicket'  => $_POST["idTicket"],
                'idEmpleado' => $_POST['idEmpleado']
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
        case 4: //registro inmueble
            $stmt = $conexion->prepare("UPDATE
                                            ticketregistroinmueble
                                        SET
                                            marcarRellamado = :marcarRellamado,
                                            Empleado_idEmpleado = :idEmpleado,
                                            disponibilidad = 0,
                                            vecesLlamado = 0
                                        WHERE
                                            idTicketRegistroInmueble = :idTicket");
            $resultado = $stmt->execute(
            array(
            ':marcarRellamado' => $_POST['marcarRellamado'],
            ':idTicket'  => $_POST["idTicket"],
            'idEmpleado' => $_POST['idEmpleado']
            )
            );
            if (!empty($resultado)) {
            echo 'Registro actualizado';
            }
            break;
    }
    
}else{
    echo "hola";
}

?>