<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 10/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");


    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        // crear ventanilla
        $stmt = $conexion->prepare("INSERT INTO direccion(
                                        nombre,
                                        siglas,
                                        descripcion
                                    )
                                    VALUES(
                                        :nombre,
                                        :siglas,
                                        :descripcion
                                    )");

        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':siglas',$_POST['siglas']);
        $stmt->bindParam(':descripcion',$_POST['descripcion']);
        

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
                                        direccion
                                    SET
                                        nombre = :nombre,
                                        siglas = :siglas,
                                        descripcion = :descripcion
                                    WHERE
                                        idDireccion = :idDireccion");
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':siglas',$_POST['siglas']);
        $stmt->bindParam(':descripcion',$_POST['descripcion']);
        $stmt->bindParam(':idDireccion',$_POST['idDireccion']);

        $resultado = $stmt->execute();
         /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

?>