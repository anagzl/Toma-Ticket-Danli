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
        // crear ventanilla
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
        $idVentanillaInsertada = $conexion->lastInsertId();
         /* Validar que no este vacio el resultado */
         if (!empty($resultado)){
            // crear tramites habilitados para la ventanilla
            $stmt = $conexion->prepare("INSERT INTO tramiteshabilitadoventanilla(
                                            descripcion,
                                            Ventanilla_idVentanilla
                                        )
                                        VALUES(
                                            :descripcion,
                                            :Ventanilla_idVentanilla)");
            $stmt->bindParam(':descripcion',$_POST['tramites']);
            $stmt->bindParam(':Ventanilla_idVentanilla',$idVentanillaInsertada);
            $resultado = $stmt->execute();
            if(!empty($resultado)){
                $stmt = $conexion->prepare("UPDATE
                                                empleado
                                            SET
                                                Ventanilla_idVentanilla = :Ventanilla_idVentanilla
                                            WHERE
                                                idEmpleado = :idEmpleado");
                $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
                $stmt->bindParam(':Ventanilla_idVentanilla',$idVentanillaInsertada);
                $resultado = $stmt->execute();
                if(!empty($resultado)){
                    echo "Ventanilla creada";
                }else{
                    echo "Error al crear";
                }
            }
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
         /* Validar que no este vacio el resultado */
         if (!empty($resultado)){
            try{
                $stmt = $conexion->prepare("INSERT INTO tramiteshabilitadoventanilla(
                                                descripcion,
                                                Ventanilla_idVentanilla
                                            )
                                            VALUES(
                                                :descripcion,
                                                :Ventanilla_idVentanilla)");
                $stmt->bindParam(':descripcion',$_POST['tramites']);
                $stmt->bindParam(':Ventanilla_idVentanilla',$_POST['idVentanilla']);
                $resultado = $stmt->execute();
            }catch(PDOException $e){
                if($e->getCode() == '23000'){
                     // crear tramites habilitados para la ventanilla
                    $stmt = $conexion->prepare("UPDATE
                                                    tramiteshabilitadoventanilla
                                                SET
                                                    descripcion = :descripcion
                                                WHERE
                                                    Ventanilla_idVentanilla = :Ventanilla_idVentanilla");
                    $stmt->bindParam(':descripcion',$_POST['tramites']);
                    $stmt->bindParam(':Ventanilla_idVentanilla',$_POST['idVentanilla']);
                    $resultado = $stmt->execute();
                }
            }           
            }
            // echo json_encode($resultado);
            if(!empty($resultado)){
                // editar empleado para que atienda ventanilla
                $stmt = $conexion->prepare("UPDATE
                                                empleado
                                            SET
                                                Ventanilla_idVentanilla = :Ventanilla_idVentanilla
                                            WHERE
                                                idEmpleado = :idEmpleado");
                $stmt->bindParam(':idEmpleado',$_POST['idEmpleado']);
                $stmt->bindParam(':Ventanilla_idVentanilla',$_POST['idVentanilla']);
                $resultado = $stmt->execute();
                if(!empty($resultado)){
                    echo "Registro Actualizado";
                }else{
                    echo "Error al actualizar";
                }
            }
        }else{
            echo "Registro Vacio.";
        }

?>