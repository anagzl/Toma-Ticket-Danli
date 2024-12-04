<?php

/**
 * Formato de eliminacion de media De Youtube
 *
 * @Autor: Ana Zavala
 * @Fecha Creacion: 01/09/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_video_web.php");

	if(isset($_POST["idMediaVideoWeb"])){
			$query = $conexion->prepare("SELECT
			direccionURL
			FROM
			mediavideoweb
                                          idMediaVideoWeb  = :idMediaVideoWeb");
			$query->bindParam(":idMediaVideoWeb",$_POST["idMediaVideoWeb"],PDO::PARAM_INT);
            $query->execute();
			$data = $query->fetchall();
            //almacenar ruta de una variable para luego borrar el archivo en esta ruta
            $ruta = $data[0]["direccionURL"];

            //borrar archivo
      /*       if(unlink("../../files/mediavideoweb/$direccionURL")){ */
                //si se elimina exitosamente borrar registro de la bd
                $query = $conexion->prepare("DELETE
                                            FROM
                                            mediavideoweb
                                            WHERE
                                            idMediaVideoWeb  = :idMediaVideoWeb");
                $query->bindParam(":idMediaVideoWeb",$_POST["idMediaVideoWeb"],PDO::PARAM_INT);
                $resultado = $query->execute();   
                if ($resultado) echo "Archivo eliminado con exito";  
            }else{
                echo "No se pudo borrar el archivo.";
            }



?>