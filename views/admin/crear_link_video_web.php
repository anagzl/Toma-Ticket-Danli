<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Ana Zavala
     * @Fecha Creacion: 30/11/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");


    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        // crear ventanilla
        $stmt = $conexion->prepare("INSERT INTO mediavideoweb(
                                        direccionURL,
                                        activo
                                    )
                                    VALUES(
                                        :direccionURL,
                                        1
                                    )");

        $stmt->bindParam(':direccionURL',$_POST['direccionURL']);
        

        $resultado = $stmt->execute();

        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro creado.";
        }else{
            echo "Error al crear registro";
        }
       
    }

?>