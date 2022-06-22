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
if((isset($_GET['idTicket']) && isset($_GET['direccion'])) || (isset($_POST['idTicket']) && isset($_POST['direccion']))){
    switch(isset($_GET['direccion'])?$_GET['direccion']:$_POST['direccion']){
        case 1: //catastro
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tc.idTicketCatastro AS idTicket,
                                            tc.Bitacora_idBitacora,
                                            tc.Bitacora_Sede_idSede,
                                            s.siglas AS siglas_sede,
                                            tc.disponibilidad,
                                            tc.preferencia,
                                            tc.vecesLlamado,
                                            tc.sigla AS siglas_ticket,
                                            tc.numero,
                                            tc.llamando,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketcatastro AS tc
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tc.Bitacora_idBitacora
                                        INNER JOIN sede AS s
                                        ON
                                            s.idSede = b.Sede_idSede
                                        INNER JOIN municipio AS m
                                        ON
                                            m.idMunicipio = s.Municipio_idMunicipio
                                        INNER JOIN departamento AS d
                                        ON
                                            d.idDepartamento = m.Departamento_idDepartamento
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        INNER JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tc.Empleado_idEmpleado
                                        INNER JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
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
                $salida["siglas_ticket"] = $fila["siglas_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
            }else{
                $json = json_encode($salida);
                echo $json;
            }
            break;
        case 2:  //regularizacion predial
            $salida = array();
            $stmt = $conexion->prepare('SELECT
                                            tp.idTicketPredial AS idTicket,
                                            tp.Bitacora_idBitacora,
                                            tp.Bitacora_Sede_idSede,
                                            s.siglas AS siglas_sede,
                                            tp.disponibilidad,
                                            tp.preferencia,
                                            tp.vecesLlamado,
                                            tp.sigla AS siglas_ticket,
                                            tp.numero,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketpredial AS tp
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tp.Bitacora_idBitacora
                                        INNER JOIN sede AS s
                                        ON
                                            s.idSede = b.Sede_idSede
                                        INNER JOIN municipio AS m
                                        ON
                                            m.idMunicipio = s.Municipio_idMunicipio
                                        INNER JOIN departamento AS d
                                        ON
                                            d.idDepartamento = m.Departamento_idDepartamento
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        INNER JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tp.Empleado_idEmpleado
                                        INNER JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
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
                $salida["siglas_ticket"] = $fila["siglas_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
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
                                            ti.Bitacora_Sede_idSede,
                                            s.siglas AS siglas_sede,
                                            ti.disponibilidad,
                                            ti.preferencia,
                                            ti.vecesLlamado,
                                            ti.sigla AS siglas_ticket,
                                            ti.numero,
                                            ti.llamando,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketpropiedadintelectual AS ti
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = ti.Bitacora_idBitacora
                                        INNER JOIN sede AS s
                                        ON
                                            s.idSede = b.Sede_idSede
                                        INNER JOIN municipio AS m
                                        ON
                                            m.idMunicipio = s.Municipio_idMunicipio
                                        INNER JOIN departamento AS d
                                        ON
                                            d.idDepartamento = m.Departamento_idDepartamento
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        INNER JOIN empleado AS e
                                        ON
                                            e.idEmpleado = ti.Empleado_idEmpleado
                                        INNER JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
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
                $salida["siglas_ticket"] = $fila["siglas_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
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
                                            tri.Bitacora_Sede_idSede,
                                            s.siglas AS siglas_sede,
                                            tri.disponibilidad,
                                            tri.preferencia,
                                            tri.vecesLlamado,
                                            tri.sigla AS siglas_ticket,
                                            tri.numero,
                                            tri.llamando,
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            v.numero AS numero_ventanilla
                                        FROM
                                            ticketregistroinmueble AS tri
                                        INNER JOIN bitacora AS b
                                        ON
                                            b.idBitacora = tri.Bitacora_idBitacora
                                        INNER JOIN sede AS s
                                        ON
                                            s.idSede = b.Sede_idSede
                                        INNER JOIN municipio AS m
                                        ON
                                            m.idMunicipio = s.Municipio_idMunicipio
                                        INNER JOIN departamento AS d
                                        ON
                                            d.idDepartamento = m.Departamento_idDepartamento
                                        INNER JOIN usuario AS u
                                        ON
                                            u.idUsuario = b.Usuario_idUsuario
                                        INNER JOIN empleado AS e
                                        ON
                                            e.idEmpleado = tri.Empleado_idEmpleado
                                        INNER JOIN ventanilla AS v
                                        ON
                                            v.idVentanilla = e.Ventanilla_idVentanilla
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
                $salida["siglas_ticket"] = $fila["siglas_ticket"];
                $salida["numero_ventanilla"] = $fila["numero_ventanilla"];
                $salida["llamando"] = $fila["llamando"];
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