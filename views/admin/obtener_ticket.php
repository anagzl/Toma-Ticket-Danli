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
        case 1: //registro inmueble
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
            $salida["siglas_sede"] = $fila["siglas_sede"];
            $salida["numero"] = $fila["numero"];
            $salida["primerNombre"] = $fila["primerNombre"];
            $salida["siglas_sede"] = $fila["siglas_sede"];
            $salida["nombre_departamento"] = $fila["nombre_departamento"];
            $salida["primerApellido"] = $fila["primerApellido"];
            $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
            $salida["disponibilidad"] = $fila["disponibilidad"];
            $salida["preferencia"] = $fila["preferencia"];
            $salida["vecesLlamado"] = $fila["vecesLlamado"];
            $salida["fecha"] = $fila["fecha"];
            $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
            $salida["sigla_ticket"] = $fila["sigla_ticket"];
            $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
            $salida["llamando"] = $fila["llamando"];
            $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
            $salida["numeroTicket"] = $fila["numeroTicket"];
            $salida["nombreTramite"] = $fila["nombreTramite"];
            $salida["siglasTramite"] = $fila["siglasTramite"];
        }
        if(isset($_POST['idTicket'])){
            $json = json_encode($salida);
        }else{
            $json = json_encode($salida);
            echo $json;
        }
        break;


            case 2: //R.vEHICULAR
                $salida = array();
                $stmt = $conexion->prepare('SELECT
                                                tri.idTicketpropiedadintelectual AS idTicket,
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
                                                ticketpropiedadintelectual AS tri
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
                                                tri.idTicketpropiedadintelectual = :idTicket;');
              $stmt->execute(
                array(
                    ':idTicket'  => isset($_GET["idTicket"]) ? $_GET['idTicket'] : $_POST['idTicket']
                    )
            );
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $salida["idTicket"] = $fila["idTicket"];
                $salida["Bitacora_idBitacora"] = $fila["Bitacora_idBitacora"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["numero"] = $fila["numero"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["nombre_departamento"] = $fila["nombre_departamento"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["fecha"] = $fila["fecha"];
                $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
                $salida["sigla_ticket"] = $fila["sigla_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
                $salida["Direccion_idDireccion"] = $fila["Direccion_idDireccion"];
                $salida["numeroTicket"] = $fila["numeroTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
                $salida["siglasTramite"] = $fila["siglasTramite"];
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