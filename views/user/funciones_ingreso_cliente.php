<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Ana Zavala 
 * @Fecha Creacion: 30/05/2022

*/

/**
 * Funcion para obtener todos los registros para el datatable
 */
function obtener_todos_registros_ingreso_cliente(){
    include('../../config/conexion.php');
  
    $stmt=$conexion->prepare("SELECT
        idUsuario
        
    FROM
        Usuario ");


    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}


?>