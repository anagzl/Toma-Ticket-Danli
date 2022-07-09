<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 07/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");


    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        // crear ventanilla
        $stmt = $conexion->prepare("INSERT INTO tramite(
                                        Direccion_idDireccion,
                                        nombreTramite,
                                        descripcionTramite,
                                        estado
                                    )
                                    VALUES(
                                        :Direccion_idDireccion,
                                        :nombreTramite,
                                        :descripcionTramite,
                                        1
                                    )");

        $stmt->bindParam(':Direccion_idDireccion',$_POST['Direccion_idDireccion']);
        $stmt->bindParam(':nombreTramite',$_POST['nombreTramite']);
        $stmt->bindParam(':descripcionTramite',$_POST['descripcionTramite']);
        

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
                                        tramite
                                    SET
                                        Direccion_idDireccion = :Direccion_idDireccion,
                                        nombreTramite = :nombreTramite,
                                        descripcionTramite = :descripcionTramite
                                    WHERE
                                        idTramite = :idTramite");
        $stmt->bindParam(':Direccion_idDireccion',$_POST['Direccion_idDireccion']);
        $stmt->bindParam(':nombreTramite',$_POST['nombreTramite']);
        $stmt->bindParam(':descripcionTramite',$_POST['descripcionTramite']);
        $stmt->bindParam(':idTramite',$_POST['idTramite']);


        $resultado = $stmt->execute();
         /* Validar que no este vacio el resultado */
        if(!empty($resultado)){
            echo "Registro actualizado.";
        }else{
            echo "Error al actualizar";
        }
    }

?>