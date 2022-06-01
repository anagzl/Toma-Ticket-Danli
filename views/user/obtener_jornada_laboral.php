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
if (isset($_GET["idUsuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT
                                    j.idJornadaLaboral,
                                    j.Usuario_idUsuario,
                                    u.primerNombre,
                                    u.primerApellido,
                                    j.Ventanilla_idVentanilla,
                                    v.nombre AS nombreVentanilla,
                                    v.Direccion_idDireccion,
                                    tv.descripcion AS tramites_habilitados,
                                    d.nombre AS nombreDireccion,
                                    j.TipoJornadaLaboral_idTipoJornadaLaboral,
                                    j.obs,
                                    j.minutosFueraVentanilla
                                FROM
                                    jornadalaboral AS j
                                INNER JOIN usuario AS u
                                ON
                                    u.idUsuario = j.Usuario_idUsuario
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
                                    u.idUsuario = :idUsuario;");
    $stmt->execute(
        array(
            "idUsuario" => $_GET["idUsuario"]
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idJornadaLaboral"] = $fila["idJornadaLaboral"];
        $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
        $salida["primerNombre"] = $fila["primerNombre"];
        $salida["primerApellido"] = $fila["primerApellido"];
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["nombreVentanilla"] = $fila["nombreVentanilla"];
        $salida["nombreDireccion"] = $fila["nombreDireccion"];
        $salida["TipoJornadaLaboral_idTipoJornadaLaboral"] = $fila["TipoJornadaLaboral_idTipoJornadaLaboral"];
        $salida["obs"] = $fila["obs"];
        $salida["tramites_habilitados"] = $fila["tramites_habilitados"];
        $salida["minutosFueraVentanilla"] = $fila["minutosFueraVentanilla"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>