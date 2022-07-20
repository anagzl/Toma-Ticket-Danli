<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 19/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ventanilla
 */
    function obtener_todos_registros_mediacarrusel(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idMedia,
                                    ruta,
                                    activo
                                FROM
                                    mediacarrusel;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }


/* Funcion para subir una imagen  */
function subir_media(){
    $ubicacion = "../../files/carruselMedia/";
    $archivoDestino = $ubicacion . basename($_FILES["ruta"]["name"]);
    if (file_exists($archivoDestino)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
    move_uploaded_file($_FILES["ruta"]["tmp_name"], $archivoDestino);
    return basename($_FILES["ruta"]["name"]);

}





?>