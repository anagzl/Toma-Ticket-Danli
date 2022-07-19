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
function subir_documento_expediente(){
    echo json_encode($_FILES);
    if(isset($_FILES["media"])){
        /* Variable para obtener la extension */
        $nuevo_nombre = $_FILES["media"]["name"];
        /* Definiendo donde se guardara la img  */
        $ubicacion='../../files/carruselMedia/'.$nuevo_nombre;
/*         $ubicacion='//sync.ip.gob.hn/SuperIntendencia//Prueba_De_Generacion'.$nuevo_nombre; */
        /*Mover la img  a la carpeta destion dentro del servidor  */
        move_uploaded_file($_FILES["media"]["tmp_name"],$ubicacion);
        return $nuevo_nombre;
    }
}





?>