<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 07/07/2022
 
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_empleado.php");


        

    /* Validar operacion Crear   */

    // echo json_encode($_POST);
    if ($_POST["operacion"]=="Crear"){

        $stmt = $conexion->prepare("INSERT INTO usuario(
                                        idUsuario,
                                        primerNombre,
                                        segundoNombre,
                                        primerApellido,
                                        segundoApellido,
                                        numeroCelular,
                                        correo,
                                        estado
                                    )
                                    VALUES(
                                        :idUsuario,
                                        :primerNombre,
                                        :segundoNombre,
                                        :primerApellido,
                                        :segundoApellido,
                                        :numeroCelular,
                                        :correo,
                                        1
                                    )");
    $stmt->bindParam(":idUsuario",$_POST["idUsuario"],PDO::PARAM_STR);
    $stmt->bindParam(":primerNombre",$_POST["primerNombre"],PDO::PARAM_STR);
    $stmt->bindParam(":segundoNombre",$_POST["segundoNombre"],PDO::PARAM_STR);
    $stmt->bindParam(":primerApellido",$_POST["primerApellido"],PDO::PARAM_STR);
    $stmt->bindParam(":segundoApellido",$_POST["segundoApellido"],PDO::PARAM_STR);
    $stmt->bindParam(":numeroCelular",$_POST["numeroCelular"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",$_POST["correo"],PDO::PARAM_STR);

    $resultado = $stmt->execute();

    if(!empty($resultado)){
        $stmt= $conexion -> prepare("INSERT INTO empleado(
                                        Usuario_idUsuario,
                                        Rol_idRol,
                                        correoInstitucional,
                                        `login`,
                                        estado)
                                    VALUES(
                                        :Usuario_idUsuario,
                                        :Rol_idRol,
                                        :correoInstitucional,
                                        :cuenta,
                                        1)");
        $stmt->bindParam(":Usuario_idUsuario",$_POST["idUsuario"],PDO::PARAM_STR);
        $stmt->bindParam(":Rol_idRol",$_POST["Rol_idRol"],PDO::PARAM_STR);
        $stmt->bindParam(":correoInstitucional",$_POST["correo"],PDO::PARAM_STR);
        $stmt->bindParam(":cuenta",$_POST["cuenta"],PDO::PARAM_STR);

        $resultado = $stmt->execute();
        if(!empty($resultado)){
            echo "Empleado creado.";
        }else{
            echo "Error al crear empleado";
        }
    }


}
    /* Validar operacion editar   */
    if ($_POST["operacion"] == "Editar") {
        $stmt = $conexion->prepare("UPDATE
                                        usuario
                                    SET
                                        primerNombre = :primerNombre,
                                        segundoNombre = :segundoNombre,
                                        primerApellido = :primerApellido,
                                        segundoApellido = :segundoApellido,
                                        numeroCelular = :numeroCelular,
                                        correo = :correo
                                    WHERE
                                        idUsuario = :idUsuario");

         $stmt->bindParam(":idUsuario",$_POST["idUsuario"],PDO::PARAM_STR);
         $stmt->bindParam(":primerNombre",$_POST["primerNombre"],PDO::PARAM_STR);
         $stmt->bindParam(":segundoNombre",$_POST["segundoNombre"],PDO::PARAM_STR);
         $stmt->bindParam(":primerApellido",$_POST["primerApellido"],PDO::PARAM_STR);
         $stmt->bindParam(":segundoApellido",$_POST["segundoApellido"],PDO::PARAM_STR);
         $stmt->bindParam(":numeroCelular",$_POST["numeroCelular"],PDO::PARAM_STR);
         $stmt->bindParam(":correo",$_POST["correo"],PDO::PARAM_STR);

        $resultado = $stmt->execute();

        if(!empty($resultado)){

            $stmt = $conexion->prepare("UPDATE
                                            empleado
                                        SET
                                            Usuario_idUsuario = :Usuario_idUsuario,
                                            Rol_idRol = :Rol_idRol,
                                            correoInstitucional = :correo,
                                            `login` = :cuenta
                                        WHERE idEmpleado = :idEmpleado;");

            $stmt->bindParam(":Usuario_idUsuario",$_POST["idUsuario"],PDO::PARAM_STR);
            $stmt->bindParam(":Rol_idRol",$_POST["Rol_idRol"],PDO::PARAM_INT);
            $stmt->bindParam(":correo",$_POST["correo"],PDO::PARAM_STR);
            $stmt->bindParam(":cuenta",$_POST["cuenta"],PDO::PARAM_STR);
            $stmt->bindParam(":idEmpleado",$_POST["idEmpleado"],PDO::PARAM_INT);

            $resultado = $stmt->execute();
            if (!empty($resultado)) {
                echo 'Registro actualizado';
            }
        }       
    }
    
    ?>