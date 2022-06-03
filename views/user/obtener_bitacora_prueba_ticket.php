<?php
/**
 * Obtencion de datos de un registro de bitacora para la base de datos
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    include("../../config/conexion.php");

/**
 * Funcionalidad de la ejecucion de registro unico  
 * Si es una peticion GET devuelve un JSON con los datos
 * Si es POST no hace echo, solo asigna el resultado a una variable
 * Esto para poder usarlo en la impresion del ticket
 * 
 */    
$json = "";
if (isset($_POST["idBitacora"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                        b.idBitacora,
                                        b.Sede_idSede,
                                        b.Usuario_idUsuario,
                                        u.primerNombre,
                                        u.primerApellido,
                                        b.Instituciones_idInstituciones,
                                        i.nombreInstitucion,
                                        b.Tramite_idTramite,
                                        t.nombreTramite,
                                        b.Direccion_idDireccion,
                                        d.siglas,
                                        b.fecha,
                                        b.horaGeneracionTicket,
                                        b.horaEntrada,
                                        b.horaSalida,
                                        b.Observacion,
                                        b.numeroTicket
                                    FROM
                                        bitacora AS b
                                    INNER JOIN usuario AS u
                                    ON
                                        b.Usuario_idUsuario = u.idUsuario
                                    INNER JOIN institucion AS i
                                    ON
                                        i.idInstituciones = b.Instituciones_idInstituciones
                                    INNER JOIN tramite AS t
                                    ON
                                        t.idTramite = b.Tramite_idTramite
                                    INNER JOIN direccion AS d
                                    ON
                                        d.idDireccion = b.Direccion_idDireccion
                                    WHERE
                                        idBitacora = '".$_GET["idBitacora"]."'");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idBitacora"] = $fila["idBitacora"];
        $salida["Sede_idSede"] = $fila["Sede_idSede"];
        $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
        $salida["primerNombre"] = $fila["primerNombre"];
        $salida["primerApellido"] = $fila["primerApellido"];
        $salida["Instituciones_idInstituciones"] = $fila["Instituciones_idInstituciones"];
        $salida["nombreInstitucion"] = $fila["nombreInstitucion"];
        $salida["Tramite_idTramite"] = $fila["Tramite_idTramite"];
        $salida["nombreTramite"] = $fila["nombreTramite"];
        $salida["siglas"] = $fila["siglas"];
        $salida["fecha"] = $fila["fecha"];
        $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
        $salida["horaEntrada"] = $fila["horaEntrada"];
        $salida["horaSalida"] = $fila["horaSalida"];
        $salida["Observacion"] = $fila["Observacion"];
        $salida["numeroTicket"] = $fila["numeroTicket"];
    }

    $json = json_encode($salida);
    echo $json;
}else{
    if (isset($_GET["idBitacora"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        b.idBitacora,
                                        b.Sede_idSede,
                                        s.nombreLocalidad,
                                        ub.nombreUbicacion,
                                        ub.siglas AS siglas_ubicacion,
                                        de.nombre AS nombre_departamento,
                                        b.Usuario_idUsuario,
                                        u.primerNombre,
                                        u.primerApellido,
                                        b.Instituciones_idInstituciones,
                                        i.nombreInstitucion,
                                        b.Tramite_idTramite,
                                        t.nombreTramite,
                                        b.Direccion_idDireccion,
                                        d.siglas,
                                        b.fecha,
                                        b.horaGeneracionTicket,
                                        b.horaEntrada,
                                        b.horaSalida,
                                        b.Observacion,
                                        b.numeroTicket
                                    FROM
                                        bitacora AS b
                                    INNER JOIN usuario AS u
                                    ON
                                        b.Usuario_idUsuario = u.idUsuario
                                    INNER JOIN institucion AS i
                                    ON
                                        i.idInstituciones = b.Instituciones_idInstituciones
                                    INNER JOIN tramite AS t
                                    ON
                                        t.idTramite = b.Tramite_idTramite
                                    INNER JOIN direccion AS d
                                    ON
                                        d.idDireccion = b.Direccion_idDireccion
                                    INNER JOIN sede AS s
                                    ON
                                        s.idSede = b.Sede_idSede
                                    INNER JOIN ubicacion AS ub
                                    ON
                                        ub.idUbicacion = s.Ubicacion_idUbicacion
                                    INNER JOIN municipio AS m
                                    ON
                                        m.idMunicipio = ub.Municipio_idMunicipio
                                    INNER JOIN departamento AS de
                                    ON
                                        de.idDepartamento = m.Departamento_idDepartamento
                                    WHERE
                                        idBitacora = '".$_GET["idBitacora"]."'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idBitacora"] = $fila["idBitacora"];
            $salida["Sede_idSede"] = $fila["Sede_idSede"];
            $salida["nombreLocalidad"] = $fila["nombreLocalidad"];
            $salida["siglas_ubicacion"] = $fila["siglas_ubicacion"];
            $salida["nombre_departamento"] = $fila["nombre_departamento"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["primerNombre"] = $fila["primerNombre"];
            $salida["primerApellido"] = $fila["primerApellido"];
            $salida["Instituciones_idInstituciones"] = $fila["Instituciones_idInstituciones"];
            $salida["nombreInstitucion"] = $fila["nombreInstitucion"];
            $salida["Tramite_idTramite"] = $fila["Tramite_idTramite"];
            $salida["nombreTramite"] = $fila["nombreTramite"];
            $salida["siglas"] = $fila["siglas"];
            $salida["fecha"] = $fila["fecha"];
            $salida["horaGeneracionTicket"] = $fila["horaGeneracionTicket"];
            $salida["horaEntrada"] = $fila["horaEntrada"];
            $salida["horaSalida"] = $fila["horaSalida"];
            $salida["Observacion"] = $fila["Observacion"];
            $salida["numeroTicket"] = $fila["numeroTicket"];
        }
    
        $json = json_encode($salida);
    }
}
?>