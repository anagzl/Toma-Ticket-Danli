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
        // include("../../config/conexion.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */   

    function obtener_empleado_id($idEmpleado,$conexion){
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idEmpleado,
                                        Usuario_idUsuario,
                                        correoInstitucional,
                                        `login`,
                                        Ventanilla_idVentanilla,
                                        Rol_idRol
                                    FROM
                                        empleado
                                    WHERE
                                        idEmpleado = :idEmpleado
                                    LIMIT 1;");
        $stmt->bindParam(':idEmpleado',$idEmpleado,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["correoInstitucional"] = $fila["correoInstitucional"];
            $salida["login"] = $fila["login"];
            $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
            $salida["Rol_idRol"] = $fila["Rol_idRol"];         
        }
        return $salida;
    }

    function obtener_empleado_usuario($usuario,$conexion){
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        idEmpleado,
                                        Usuario_idUsuario,
                                        correoInstitucional,
                                        `login`,
                                        Ventanilla_idVentanilla,
                                        Rol_idRol
                                    FROM
                                        empleado
                                    WHERE
                                        `login` = :nombreUsuario
                                    LIMIT 1;");
        $stmt->bindParam(':nombreUsuario',$usuario);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["correoInstitucional"] = $fila["correoInstitucional"];
            $salida["login"] = $fila["login"];
            $salida["Ventanilla_idVentanilla"] = $fila["Ventanilla_idVentanilla"];
            $salida["Rol_idRol"] = $fila["Rol_idRol"];         
        }
        
        return $salida;
    }

    // obtener empleado ya sea por el id o por nombre de usuario
    if(isset($_GET['idEmpleado']) || isset($_GET['nombreUsuario'])){
        include("../../config/conexion.php");
        if(isset($_GET['idEmpleado'])){
            echo json_encode(obtener_empleado_id($_GET['idEmpleado'],$conexion));
         }else{
             if(isset($_GET['nombreUsuario'])){
                 echo json_encode(obtener_empleado_usuario($_GET['nombreUsuario'],$conexion));
             }
         }
    }
    

    ?>