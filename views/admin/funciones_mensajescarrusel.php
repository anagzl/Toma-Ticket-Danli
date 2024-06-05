<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 20/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de mensajes carrusel
 */
    function obtener_todos_registros_mensajescarrusel(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idMensajesCarrusel,
                                    mensaje,
                                    activo
                                FROM
                                    mensajescarrusel;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }





?>