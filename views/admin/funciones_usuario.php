<?php
/**
 * Formato de funcion para carga de informacion en el datetable de la tabla de Estado
 * 
 * @Autor:Ana Zavala
 * @Fecha Creacion: 07/09/2022
 * @Fecha Revision:
*/


/**
 * Funcion para obtener todos los registros para el datatable
 */
function obtener_todos_registros_usuarios(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT
    `idUsuario`,
    `primerNombre`,
    `segundoNombre`,
    `primerApellido`,
    `segundoApellido`,
    `numeroCelular`,
    /* `banderaWhastapp`,
    `banderaEncuesta`, */
    `correo`,
    `estado`
FROM
    `usuario` ");
                               
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}

?>