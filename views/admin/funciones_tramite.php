<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 08/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ventanilla
 */
    function obtener_todos_registros_tramite(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idTramite,
                                    Direccion_idDireccion,
                                    nombreTramite,
                                    descripcionTramite,
                                    estado
                                FROM
                                    tramite");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }



?>