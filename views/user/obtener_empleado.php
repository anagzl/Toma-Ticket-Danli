<?php
    /**
     * Funcion para cargar un empleado ya sea por su id o por su nombre de usuario usado en el login
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 03/06/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

    if(isset($_GET['idEmpleado']) || isset($_GET['usuario'])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idEmpleado,
                                        Usuario_idUsuario,
                                        correoInstitucional,
                                        `login`,
                                        Ventanilla_idVentanilla,
                                        contrasena
                                    FROM
                                        empleado
                                    WHERE
                                        idEmpleado = :idEmpleado OR `login` = :usuario
                                    LIMIT 1;");
        $stmt->bindParam(':idEmpleado',$_GET['idEmpleado'],PDO::PARAM_INT);
        $stmt->bindParam(':usuario',$_GET['usuario'],PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["correoInstitucional"] = $fila["correoInstitucional"];
            $salida["login"] = $fila["login"];
            $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
           
        }
        echo json_encode($salida);
    }

    ?>