<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 07/09/2022
 
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_usuario.php");


        

    /* Validar operacion Crear   */

    if ($_POST["operacion"]=="Crear"){

        try{
            $stmt= $conexion -> prepare("INSERT INTO usuario(
                                                numeroIdentidad,
                                                primerNombre,
                                                segundoNombre,
                                                primerApellido,
                                                segundoApellido,
                                                numeroCelular,
                                                correo,
                                                estado)
                                        VALUES(
                                            :numeroIdentidad,
                                            :primerNombre,
                                            :segundoNombre,
                                            :primerApellido,
                                            :segundoApellido,
                                            :numeroCelular,
                                            :correo,
                                            1)");
            $resultado = $stmt-> execute(
            array(
            ':numeroIdentidad'                 => $_POST["numeroIdentidad"],  
            ':primerNombre'                    => $_POST["primerNombre"],
            ':segundoNombre'                   => $_POST["segundoNombre"],
            ':primerApellido'                  => $_POST["primerApellido"],
            ':segundoApellido'                 => $_POST["segundoApellido"],
            ':numeroCelular'                   => $_POST["numeroCelular"],
            ':correo'                          => $_POST["correo"]
            )
            );
            /* Validar que no este vacio el resultado */
            if (!empty($resultado)){
                echo 'Registro Usuario Creado. ';
            }else{
                echo "Usuario Vacio.";
            }
        }catch(PDOException $e){
            if($e->getCode() == '23000'){
                echo "Ya existe un usuario con esa identidad";
            }
        }
    
        }
    /* Validar operacion editar   */
    if ($_POST["operacion"] == "Actualizar") {

        $stmt = $conexion->prepare("UPDATE usuario SET 
                                    idUsuario             = :idUsuario,  
                                    numeroIdentidad       = :numeroIdentidad,
                                    primerNombre           = :primerNombre,
                                    segundoNombre          = :segundoNombre,
                                    primerApellido         = :primerApellido,
                                    segundoApellido        = :segundoApellido,
                                    numeroCelular          = :numeroCelular,
                                    correo                 = :correo
                                    WHERE idUsuario = :idUsuario");
        $resultado = $stmt->execute(
            array(
                 ':idUsuario'                   => $_POST["idUsuario"],
                 ':numeroIdentidad'             => $_POST["numeroIdentidad"],
                ':primerNombre'                 => $_POST["primerNombre"],
                ':segundoNombre'                => $_POST["segundoNombre"],
                ':primerApellido'               => $_POST["primerApellido"],
                ':segundoApellido'              => $_POST["segundoApellido"],
                ':numeroCelular'                => $_POST["numeroCelular"],
                ':correo'                       => $_POST["correo"]
            )
        );
        if (!empty($resultado)) {
            echo 'Registro actualizado';
        }
    }
    
    ?>