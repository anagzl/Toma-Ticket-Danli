<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     *
     * @Autor: Jonatahn Laux
     * @Fecha Creacion: 07/07/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
    include("../../config/conexion.php");


    /* Validar operacion Crear*/

    if ($_POST["operacion"]=="Crear"){
        $stmt = $conexion->prepare("INSERT INTO ventanilla(
                                        Direccion_idDireccion,
                                        numero,
                                        estado
                                    )
                                    VALUES(
                                        :Direccion_idDireccion,
                                        :numero,
                                        1
                                    )");

        $stmt->bindParam(':Direccion_idDireccion',$_POST['Direccion_idDireccion']);
        $stmt->bindParam(':numero',$_POST['numero']);
        $resultado = $stmt->execute();
        /* Validar que no este vacio el resultado */
        if (!empty($resultado)){
            echo 'Registro Genero Creado. ';
        }else{
            echo "Registro Vacio.";
        }
    }
    /* Validar operacion editar   */
    if ($_POST["operacion"] == "Editar") {

        $stmt = $conexion->prepare("UPDATE
                                        ventanilla
                                    SET
                                        Direccion_idDireccion = :Direccion_idDireccion,
                                        numero = :numero
                                    WHERE
                                        idVentanilla = :idVentanilla");
        $stmt->bindParam(':Direccion_idDireccion',$_POST['Direccion_idDireccion']);
        $stmt->bindParam(':numero',$_POST['numero']);
        $stmt->bindParam(':idVentanilla',$_POST['idVentanilla']);

        $resultado = $stmt->execute();
        if (!empty($resultado)) {
            echo 'Registro actualizado';
        }
    }

?>