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
if (isset($_GET['idEmpleado']) && isset($_GET['direccion'])) {
    switch($_GET['direccion']){
        case 1: //catastro
            $stmt = $conexion->prepare("SELECT
                                            idTicketCatastro,
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            marcarRellamado,
                                            vecesLlamado
                                        FROM
                                            ticketcatastro 
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll();
            $datos = array();
            foreach($resultado as $fila){
                $salida["idTicketCatastro"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($stmt);
            echo $json;
        break;
        case 2: //regulacion predial
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            idTicketPredial,
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            marcarRellamado,
                                            vecesLlamado
                                        FROM
                                            ticketpredial 
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicketPredial"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
        break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            idTicketPropiedadIntelectual,
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            marcarRellamado,
                                            vecesLlamado
                                        FROM
                                            ticketpropiedadintelectual 
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicketPropiedadIntelectual"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
        break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare("SELECT
                                            idTicketRegistroInmueble,
                                            Bitacora_idBitacora,
                                            Bitacora_Sede_idSede,
                                            Empleado_idEmpleado,
                                            disponibilidad,
                                            preferencia,
                                            marcarRellamado,
                                            vecesLlamado
                                        FROM
                                            ticketregistroinmueble 
                                        WHERE
                                            Empleado_idEmpleado = :idEmpleado AND marcarRellamado = 1;");
            $stmt->execute(
                array(
                    ':idEmpleado' => $_GET['idEmpleado']
                )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicketCatastro"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
        break;
    }
    
}
?>