<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 13/03/2022
 * @Fecha Revision: 
 * @Autor Revision:  
*/


/**
 * Funcion para obtener todos los registros de bitacora
 */

function obtener_registros_bitacora(){
    include('../../config/conexion.php');
    $stmt=$conexion->prepare("SELECT * FROM bitacora");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    return $stmt->rowCount();
}


?>