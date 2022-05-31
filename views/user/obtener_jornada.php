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
                                    idJornadaLaboral,
                                    Usuario_idUsuario,
                                    Ventanilla_idVentanilla,
                                    TipoJornadaLaboral_idTipoJornadaLaboral,
                                    obs,
                                    tiempoFueraVentanilla
                                FROM
                                    jornadalaboral
                                WHERE
                                    Usuario_idUsuario = :idUsuario;");
    $stmt->execute(
        array(
            "idUsuario" => $_GET["idUsuario"]
        )
    );
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["idJornadaLaboral"] = $fila["idJornadaLaboral"];
        $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
        $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
        $salida["TipoJornadaLaboral_idTipoJornadaLaboral"] = $fila["TipoJornadaLaboral_idTipoJornadaLaboral"];
        $salida["obs"] = $fila["obs"];
        $salida["tiempoFueraVentanilla"] = $fila["tiempoFueraVentanilla"];
    }

    $json = json_encode($salida);
    echo $json;
}
?>