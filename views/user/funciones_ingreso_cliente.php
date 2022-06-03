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
        u.idUsuario,
        b.Instituciones_idInstituciones
    FROM
        Usuario as u
    INNER JOIN bitacora AS b
    ON
        u.TipoUsuario_idTipoUsuario = b.Usuario_idUsuario");


    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}


?>