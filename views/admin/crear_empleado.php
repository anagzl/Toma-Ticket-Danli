<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 07/07/2022
     * @Fecha modificacion:19/04/2022
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_empleado.php");

    /* Validar operacion Crear   */

    if ($_POST["operacion"]=="Crear"){

    $stmt= $conexion -> prepare("INSERT INTO empleado(
    /* `idEmpleado`, */
    `Usuario_idUsuario`,
    `Rol_idRol`,
   /*  `Ventanilla_idVentanilla`, */
    `correoInstitucional`,
    `login`
            )

        VALUES(
            /* :idEmpleado, */
            :Usuario_idUsuario,
            :Rol_idRol,
       /*      :Ventanilla_idVentanilla, */
            :correoInstitucional,
            :login
            )");

        $resultado = $stmt-> execute(
            array(
                /* ':idEmpleado'                  => $_POST["idEmpleado"],  */     
                ':Usuario_idUsuario'           => $_POST["Usuario_idUsuario"],
                ':Rol_idRol'                   => $_POST["Rol_idRol"],
               /*  ':Ventanilla_idVentanilla'    => $_POST["Ventanilla_idVentanilla"], */
                ':correoInstitucional'         => $_POST["correoInstitucional"],
              ':login'                          => $_POST["login"]
              
                    )
            );
            /* Validar que no este vacio el resultado */
            if (!empty($resultado)){
                echo 'Registro Empleado Creado. ';
            }else{
                echo "Empleado Vacio.";
            }
        }
    /* Validar operacion editar   */
    if ($_POST["operacion"] == "Editar") {


        $stmt = $conexion->prepare("UPDATE empleado SET 
                                 idEmpleado              = :idEmpleado, 
                                    Usuario_idUsuario       = :Usuario_idUsuario,
                                    Rol_idRol               = :Rol_idRol,
                                    correoInstitucional     = :correoInstitucional,
                                    login                   = :login
                             /*  estado                  = :estado  */
                                    WHERE idEmpleado = :idEmpleado");
        $resultado = $stmt->execute(
            array(
              ':idEmpleado'                        => $_POST["idEmpleado"], 
                ':Usuario_idUsuario'                 => $_POST["Usuario_idUsuario"],
                ':Rol_idRol'                         => $_POST["Rol_idRol"],
                ':correoInstitucional'               => $_POST["correoInstitucional"],
                ':login'                             => $_POST["login"]
           /*  ':estado'                                => $_POST["estado"] */
            )
        );
        if (!empty($resultado)) {
            echo 'Registro actualizado';
        }
    }
    
    ?>