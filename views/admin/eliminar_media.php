<?php

/**
 * Formato de eliminacion de media
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 03/08/2022
*/

/**
 * Traer la conexion y la funciones
 */
    include("../../config/conexion.php");
    include("funciones_mediacarrusel.php");

	if(isset($_POST["idMedia"])){
			$query = $conexion->prepare("SELECT
											ruta
										FROM
											mediacarrusel
										WHERE
											idMedia  = :idMedia");
			$query->bindParam(":idMedia",$_POST["idMedia"],PDO::PARAM_INT);
            $query->execute();
			$data = $query->fetchall();
            //almacenar ruta de una variable para luego borrar el archivo en esta ruta
            $ruta = $data[0]["ruta"];

            //borrar archivo
            if(unlink("../../files/carruselmedia/$ruta")){
                //si se elimina exitosamente borrar registro de la bd
                $query = $conexion->prepare("DELETE
                                            FROM
                                                mediacarrusel
                                            WHERE
                                                idMedia  = :idMedia");
                $query->bindParam(":idMedia",$_POST["idMedia"],PDO::PARAM_INT);
                $resultado = $query->execute();   
                if ($resultado) echo "Archivo eliminado con exito";  
            }else{
                echo "No se pudo borrar el archivo.";
            }


}
?>