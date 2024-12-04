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
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            t.nombreTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            tc.sigla
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
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["nombre_departamento"] = $fila["nombre_departamento"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["fecha"] = $fila["fecha"];
                $salida["sigla"] = $fila["sigla"];
                $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
                echo $json;
            }else{
                $json = json_encode($salida);  
            }
            break;
      /*  case 2:  //regulacion predial
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
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            t.nombreTramite,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            tp.sigla
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
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["nombre_departamento"] = $fila["nombre_departamento"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["fecha"] = $fila["fecha"];
                $salida["sigla"] = $fila["sigla"];
                $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
                echo $json;
            }else{
                $json = json_encode($salida);  
            }
            break;*/
      case 2: //propiedad intelectual
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
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            u.primerNombre,
                                            t.nombreTramite,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            ti.sigla
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
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["nombre_departamento"] = $fila["nombre_departamento"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["fecha"] = $fila["fecha"];
                $salida["sigla"] = $fila["sigla"];
                $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
                echo $json;
            }else{
                $json = json_encode($salida);  
            }
            break;
        /*case 4: //registro inmueble
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
                                            b.idBitacora,
                                            b.fecha,
                                            b.horaGeneracionTicket,
                                            b.Tramite_idTramite,
                                            b.Usuario_idUsuario,
                                            t.nombreTramite,
                                            u.primerNombre,
                                            u.primerApellido,
                                            b.Tramite_idTramite,
                                            b.Direccion_idDireccion,
                                            d.nombre AS nombre_departamento,
                                            tri.sigla
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
                $salida["primerNombre"] = $fila["primerNombre"];
                $salida["siglas_sede"] = $fila["siglas_sede"];
                $salida["nombre_departamento"] = $fila["nombre_departamento"];
                $salida["primerApellido"] = $fila["primerApellido"];
                $salida["Bitacora_Sede_idSede"] = $fila["Bitacora_Sede_idSede"];
                $salida["disponibilidad"] = $fila["disponibilidad"];
                $salida["preferencia"] = $fila["preferencia"];
                $salida["vecesLlamado"] = $fila["vecesLlamado"];
                $salida["fecha"] = $fila["fecha"];
                $salida["sigla"] = $fila["sigla"];
                $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
                $salida["nombreTramite"] = $fila["nombreTramite"];
            }
            if(isset($_POST['idTicket'])){
                $json = json_encode($salida);
                echo $json;
            }else{
                $json = json_encode($salida);  
            }
            break;
    */}
    
}
?>