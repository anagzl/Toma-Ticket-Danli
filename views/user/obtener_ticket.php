<?php
/**
 * Obtencion de datos de un registro de ticket de la base de datos
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
if(isset($_GET['idTicket']) && isset($_GET['direccion'])){
    switch($_GET['direccion']){
        case 1: //catastro
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tc.idTicketCatastro as idTicket,
                                            tc.Bitacora_idBitacora,
                                            tc.Bitacora_Sede_idSede,
                                            tc.disponibilidad,
                                            tc.preferencia,
                                            tc.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketcatastro AS tc
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tc.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            tc.idTicketCatastro = :idTicket');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET["idTicket"]
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 2:  //regulacion predial
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tp.idTicketPredial as idTicket,
                                            tp.Bitacora_idBitacora,
                                            tp.Bitacora_Sede_idSede,
                                            tp.disponibilidad,
                                            tp.preferencia,
                                            tp.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketpredial AS tp
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tp.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            tp.idTicketPredial = :idTramite');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET["idTicket"]
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            ti.idTicketPropiedadIntelectual as idTicket,
                                            ti.Bitacora_idBitacora,
                                            ti.Bitacora_Sede_idSede,
                                            ti.disponibilidad,
                                            ti.preferencia,
                                            ti.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketpropiedadintelectual AS ti
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = ti.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            ti.idTIcketPropiedadIntelectual = :idTicket');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET["idTicket"]
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tri.idTicketRegistroInmueble as idTicket,
                                            tri.Bitacora_idBitacora,
                                            tri.Bitacora_Sede_idSede,
                                            tri.disponibilidad,
                                            tri.preferencia,
                                            tri.vecesLlamado,
                                            b.idBitacora,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.siglas
                                        FROM
                                            ticketregistroinmueble AS tri
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tri.Bitacora_idBitacora
                                        INNER JOIN direccion AS d
                                        ON
                                            d.idDireccion = b.Direccion_idDireccion
                                        WHERE
                                            tri.idTicketRegistroInmueble = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => $_GET["idTicket"]
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["siglas"] = $fila["siglas"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
    }
    
}
?>