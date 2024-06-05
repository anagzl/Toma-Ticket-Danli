<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 20/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");


    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        // crear ventanilla
        $stmt = $conexion->prepare("INSERT INTO mensajescarrusel(
                                        mensaje,
                                        activo
                                    )
                                    VALUES(
                                        :mensaje,
                                        1
                                    )");

        $stmt->bindParam(':mensaje',$_POST['mensaje']);
        

        $resultado = $stmt->execute();

        /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro creado.";
        }else{
            echo "Error al crear registro";
        }
       
    }
    /* Validar operacion editar   */
    if ($_POST["operacion"] == "Editar") {

        $stmt = $conexion->prepare("UPDATE
                                        mensajescarrusel
                                    SET
                                        mensaje = :mensaje
                                    WHERE
                                        idMensajesCarrusel = :idMensajesCarrusel");
        $stmt->bindParam(':mensaje',$_POST['mensaje']);
        $stmt->bindParam(':idMensajesCarrusel',$_POST['idMensajesCarrusel']);


        $resultado = $stmt->execute();
         /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

?>