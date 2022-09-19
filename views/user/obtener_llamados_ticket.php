<?php
/**
 * Obtencion de registro de las veces que ha sido llamado un ticket en la pantalla de dashboard que muestra los tickets
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 03/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Funcionalidad de la ejecucion de registro unico de ticket
 * dependiendo la direccion
 * 
 */    
if((isset($_GET['idTicket']) && isset($_GET['direccion']))){
    switch($_GET['direccion']){
        case 1: //catastro
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            vecesLlamado
                                        FROM
                                            ticketcatastro
                                        WHERE
                                            idTicketCatastro = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  =>  $_GET['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
                echo $salida["vecesLlamado"];
            break;
        case 2:  //regularizacion predial
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            vecesLlamado
                                        FROM
                                            ticketpredial
                                        WHERE
                                            idTicketPredial = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
                echo $salida["vecesLlamado"];
            break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            vecesLlamado
                                        FROM
                                            ticketpropiedadintelectual
                                        WHERE
                                            idTicketPropiedadIntelectual = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
                echo $salida["vecesLlamado"];
            break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            vecesLlamado
                                        FROM
                                            ticketregistroinmueble
                                        WHERE
                                            idTicketRegistroInmueble = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
                echo $salida["vecesLlamado"];
            break;
    }

}
?>