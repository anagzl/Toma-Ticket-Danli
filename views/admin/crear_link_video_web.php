<?php
    /**
     * Formato de funcion 
     *
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 19/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");
    include("funciones_video_web.php");


    /* Validar operacion Crear*/

        // subir archivo y guardar nombre
        $direccionURL = "";
        if($_FILES["direccionURL"]["name"] !=""){
            $direccionURL = subir_media();
        }

        $stmt = $conexion->prepare("INSERT INTO mediavideoweb(
                                        direccionURL,
                                        activo,
                                        imagen
                                    )
                                    VALUES(
                                        :direccionURL,
                                        1,
                                        :imagen
                                    )");

        $stmt->bindParam(':direccionURL',$direccionURL);
        $extensionArchivo = explode(".",$direccionURL);
        /* Si no es mp4 entonces el archivo no es una imagen */
        if($extensionArchivo[1] == "mp4"){
            $imagen = 0;
            $stmt->bindParam(':imagen',$imagen);
        }else{
            $imagen = 1;
            $stmt->bindParam(':imagen',$imagen); 
        }

        $resultado = $stmt->execute();

        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro creado.";
        }else{
            echo "Error al crear registro";
        }
       
?>