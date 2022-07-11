<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 10/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ventanilla
 */
    function obtener_todos_registros_direccion(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idDireccion,
                                    nombre,
                                    siglas,
                                    descripcion
                                FROM
                                    direccion");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }



?>