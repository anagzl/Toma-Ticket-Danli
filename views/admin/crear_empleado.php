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

    try{

        $stmt = $conexion->prepare("INSERT INTO usuario(
                                        numeroIdentidad,
                                        primerNombre,
                                        segundoNombre,
                                        primerApellido,
                                        segundoApellido,
                                        numeroCelular,
                                        correo,
                                        estado
                                    )
                                    VALUES(
                                        :numeroIdentidad,
                                        :primerNombre,
                                        :segundoNombre,
                                        :primerApellido,
                                        :segundoApellido,
                                        :numeroCelular,
                                        :correo,
                                        1
                                    )");
    $stmt->bindParam(":numeroIdentidad",$_POST["numeroIdentidad"],PDO::PARAM_STR);
    $primerNombre = ucfirst($_POST["primerNombre"]); //verificar que la primera letra siempre sea mayuscula
    $segundoNombre = ucfirst($_POST["segundoNombre"]); 
    $primerApellido = ucfirst($_POST["primerApellido"]); 
    $segundoApellido = ucfirst($_POST["segundoApellido"]); 
    $null = null;

    $stmt->bindParam(":primerNombre",$primerNombre,PDO::PARAM_STR);

    if(!isset($_POST["segundoNombre"]) || $_POST["segundoNombre"] == ""){
        $stmt->bindParam(":segundoNombre",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":segundoNombre",$segundoNombre,PDO::PARAM_STR);
    }

    $stmt->bindParam(":primerApellido",$primerApellido,PDO::PARAM_STR);
    
    if(!isset($_POST["segundoApellido"]) || $_POST["segundoApellido"] == ""){
        $stmt->bindParam(":segundoApellido",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":segundoApellido",$segundoApellido,PDO::PARAM_STR);
    }

    $stmt->bindParam(":numeroCelular",$_POST["numeroCelular"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",$_POST["correo"],PDO::PARAM_STR);

    $resultado = $stmt->execute();
    $idUsuario = $conexion->lastInsertId();
    }catch(PDOException $e){
        if($e->getCode() == '23000'){
            echo "Ya existe un usuario con esa identidad";
        }
    }

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
        $stmt->bindParam(":Usuario_idUsuario",$idUsuario,PDO::PARAM_INT);
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
                                        numeroIdentidad = :numeroIdentidad,
                                        primerNombre = :primerNombre,
                                        segundoNombre = :segundoNombre,
                                        primerApellido = :primerApellido,
                                        segundoApellido = :segundoApellido,
                                        numeroCelular = :numeroCelular,
                                        correo = :correo
                                    WHERE
                                        idUsuario = :idUsuario");

         $stmt->bindParam(":idUsuario",$_POST["idUsuario"],PDO::PARAM_INT);
         $stmt->bindParam(":numeroIdentidad",$_POST["numeroIdentidad"],PDO::PARAM_STR);

         $primerNombre = ucfirst($_POST["primerNombre"]); //verificar que la primera letra siempre sea mayuscula
         $segundoNombre = ucfirst($_POST["segundoNombre"]); 
         $primerApellido = ucfirst($_POST["primerApellido"]); 
         $segundoApellido = ucfirst($_POST["segundoApellido"]); 
         $null = null;
         $stmt->bindParam(":primerNombre",$_POST["primerNombre"],PDO::PARAM_STR);
         
        if(!isset($_POST["segundoNombre"]) || $_POST["segundoNombre"] == ""){
            $stmt->bindParam(":segundoNombre",$null,PDO::PARAM_NULL);
        }else{
            $stmt->bindParam(":segundoNombre",$segundoNombre,PDO::PARAM_STR);
        }
    
        $stmt->bindParam(":primerApellido",$primerApellido,PDO::PARAM_STR);
        
        if(!isset($_POST["segundoApellido"]) || $_POST["segundoApellido"] == ""){
            $stmt->bindParam(":segundoApellido",$null,PDO::PARAM_NULL);
        }else{
            $stmt->bindParam(":segundoApellido",$segundoApellido,PDO::PARAM_STR);
        }
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