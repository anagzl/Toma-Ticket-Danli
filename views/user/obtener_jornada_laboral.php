<?php
/**
 * Obtencion de datos de un registro de bitacora para la base de datos
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 26/05/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de cone
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
if (isset($_GET["idEmpleado"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    j.idJornadaLaboral,
                                    j.Ventanilla_idVentanilla,
                                    v.nombre AS nombre_ventanilla,
                                    v.Direccion_idDireccion,
                                    tv.descripcion AS tramites_habilitados,
                                    d.nombre AS nombre_direccion,
                                    j.TipoJornadaLaboral_idTipoJornadaLaboral,
                                    j.Empleado_idEmpleado,
                                    em.Usuario_idUsuario,
                                    u.primerNombre,
                                    u.primerApellido,
                                    j.obs,
                                    j.horasFueraVentanilla,
                                    j.minutosFueraVentanilla,
                                    j.segundosFueraVentanilla,
                                    j.fecha
                                FROM
                                    jornadalaboral AS j
                                INNER JOIN empleado AS em
                                ON
                                    em.idEmpleado = j.Empleado_idEmpleado
                                INNER JOIN usuario AS u
                                ON
                                    u.idUsuario = em.Usuario_idUsuario
                                INNER JOIN ventanilla AS v
                                ON
                                    v.idVentanilla = j.Ventanilla_idVentanilla
                                INNER JOIN direccion AS d
                                ON
                                    d.idDireccion = v.Direccion_idDireccion
                                INNER JOIN tramiteshabilitadoventanilla AS tv
                                ON
                                    tv.Ventanilla_idVentanilla = j.Ventanilla_idVentanilla
                                WHERE
                                    j.Empleado_idEmpleado = :idEmpleado;");
    $stmt->execute(
        array(
            "idEmpleado" => $_GET["idEmpleado"]
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idJornadaLaboral"] = $fila["idJornadaLaboral"];
        $salida["Empleado_idEmpleado"] = $fila["Empleado_idEmpleado"];
        $salida["primerNombre"] = $fila["primerNombre"];
        $salida["primerApellido"] = $fila["primerApellido"];
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["nombre_ventanilla"] = $fila["nombre_ventanilla"];
        $salida["nombre_direccion"] = $fila["nombre_direccion"];
        $salida["TipoJornadaLaboral_idTipoJornadaLaboral"] = $fila["TipoJornadaLaboral_idTipoJornadaLaboral"];
        $salida["obs"] = $fila["obs"];
        $salida["tramites_habilitados"] = $fila["tramites_habilitados"];
        $salida["horasFueraVentanilla"] = $fila["horasFueraVentanilla"];
        $salida["minutosFueraVentanilla"] = $fila["minutosFueraVentanilla"];
        $salida["segundosFueraVentanilla"] = $fila["segundosFueraVentanilla"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>