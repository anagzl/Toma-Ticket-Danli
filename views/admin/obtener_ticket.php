<?php
/**
 * Obtencion de datos de un registro de ticket de la base de datos
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 09/08/2022
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
                                            tc.idTicketCatastro AS idTicket,
                                            tc.Bitacora_idBitacora,
                                            tc.disponibilidad,
                                            tc.preferencia,
                                            tc.vecesLlamado,
                                            tc.sigla AS sigla_ticket,
                                            tc.numero,
                                            tc.llamando,
                                            tc.Empleado_idEmpleado,
                                            tc.marcarRellamado,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            b.numeroTicket,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            t.nombreTramite,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketcatastro AS tc
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tc.Bitacora_idBitacora
                                        LEFT JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tc.Empleado_idEmpleado
                                        LEFT JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        WHERE
                                            tc.idTicketCatastro = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => isset($_GET["idTicket"]) ? $_GET['idTicket'] : $_POST['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["numero"] = $fila["numero"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
            }
            $json = json_encode($salida);
            echo $json;
            break;
        case 2:  //regularizacion predial
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tp.idTicketPredial AS idTicket,
                                            tp.Bitacora_idBitacora,
                                            tp.disponibilidad,
                                            tp.preferencia,
                                            tp.vecesLlamado,
                                            tp.sigla AS sigla_ticket,
                                            tp.numero,
                                            tp.llamando,
                                            tp.Empleado_idEmpleado,
                                            tp.marcarRellamado,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            b.numeroTicket,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            t.nombreTramite,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketpredial AS tp
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tp.Bitacora_idBitacora
                                        LEFT JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tp.Empleado_idEmpleado
                                        LEFT JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        WHERE
                                            tp.idTicketPredial = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => isset($_GET["idTicket"]) ? $_GET['idTicket'] : $_POST['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["numero"] = $fila["numero"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
            }else{
                $json = json_encode($salida);
                echo $json;
            }
            break;
        case 3: //propiedad intelectual
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            ti.idTicketPropiedadIntelectual AS idTicket,
                                            ti.Bitacora_idBitacora,
                                            ti.disponibilidad,
                                            ti.preferencia,
                                            ti.vecesLlamado,
                                            ti.sigla AS sigla_ticket,
                                            ti.numero,
                                            ti.llamando,
                                            ti.Empleado_idEmpleado,
                                            ti.marcarRellamado,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            b.numeroTicket,
                                            t.nombreTramite,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketpropiedadintelectual AS ti
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = ti.Bitacora_idBitacora
                                        LEFT JOIN empleado AS e
                                        ON
                                            e.idEmpleado = ti.Empleado_idEmpleado
                                        LEFT JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        WHERE
                                            ti.idTicketPropiedadIntelectual = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => isset($_GET["idTicket"]) ? $_GET['idTicket'] : $_POST['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["numero"] = $fila["numero"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
            }else{
                $json = json_encode($salida);
                echo $json;
            }
            break;
        case 4: //registro inmueble
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tri.idTicketRegistroInmueble AS idTicket,
                                            tri.Bitacora_idBitacora,
                                            tri.disponibilidad,
                                            tri.preferencia,
                                            tri.vecesLlamado,
                                            tri.sigla AS sigla_ticket,
                                            tri.numero,
                                            tri.llamando,
                                            tri.Empleado_idEmpleado,
                                            tri.marcarRellamado,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            b.numeroTicket,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            t.nombreTramite,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketregistroinmueble AS tri
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tri.Bitacora_idBitacora
                                        LEFT JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tri.Empleado_idEmpleado
                                        LEFT JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
                                        INNER JOIN tramite AS t
                                        ON
                                            t.idTramite = b.Tramite_idTramite
                                        WHERE
                                            tri.idTicketRegistroInmueble = :idTicket;');
            $stmt->execute(
                array(
                    ':idTicket'  => isset($_GET["idTicket"]) ? $_GET['idTicket'] : $_POST['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["numero"] = $fila["numero"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
                $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
                $salida["marcarRellamado"] = $fila["marcarRellamado"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
            }else{
                $json = json_encode($salida);
                echo $json;
            }
            break;
    }
    
}
?>