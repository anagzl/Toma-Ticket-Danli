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
    include("funciones_mediacarrusel.php");

    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        // crear ventanilla
        echo json_encode($_FILES);
        if($_FILES["media"]["name"] !=""){
            subir_documento_expediente();
        }

        $stmt = $conexion->prepare("INSERT INTO mediacarrusel(
                                        ruta,
                                        activo,
                                        imagen
                                    )
                                    VALUES(
                                        :ruta,
                                        1,
                                        :imagen
                                    )");

        $stmt->bindParam(':ruta',$_POST['ruta']);
        $extensionArchivo = explode(".",$_POST['ruta']);
        /* Si no es mp4 entonces el archivo no es una imagen */
        if($extensionArchivo == "mp4"){
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
       
    }
?>