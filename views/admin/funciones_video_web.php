<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Luis Estrada
 * @Fecha Creacion: 10/08/2022
 * @Fecha Revision:
*/
@session_start();

/**
 * Funcion para obtener todos los registros para el datatable de mensajes carrusel
 */
    function obtener_todos_registros_video_web(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idMediaVideoWeb,
                                    direccionURL,
                                    descripcionDelVideo,
                                    activo
                                FROM
                                    mediavideoweb;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }





?>