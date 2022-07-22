<?php
    /**
     * Formato de funcion para carga de informacion en el datetable de Estado
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 7/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_empleado.php");

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

    if (isset($_POST["idEmpleado"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT
                                        e.idEmpleado,
                                        e.Usuario_idUsuario,
                                        e.Rol_idRol,
                                        e.Ventanilla_idVentanilla,
                                        e.correoInstitucional,
                                        e.login,
                                        e.estado,
                                        u.primerNombre,
                                        u.segundoNombre,
                                        u.primerApellido,
                                        u.segundoApellido,
                                        u.numeroCelular,
                                        u.numeroIdentidad
                                    FROM
                                        empleado AS e
                                    INNER JOIN usuario AS u
                                    ON
                                        u.idUsuario = e.Usuario_idUsuario
                                    WHERE 
                                        idEmpleado = '".$_POST["idEmpleado"]."' LIMIT 1;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["Rol_idRol"]= $fila["Rol_idRol"];
            $salida["correoInstitucional"]= $fila["correoInstitucional"];
            $salida["login"]= $fila["login"];
            $salida["primerNombre"]= $fila["primerNombre"];
            $salida["segundoNombre"]= $fila["segundoNombre"];
            $salida["primerApellido"]= $fila["primerApellido"];
            $salida["segundoApellido"]= $fila["segundoApellido"];
            $salida["numeroCelular"]= $fila["numeroCelular"];
            $salida["numeroIdentidad"]= $fila["numeroIdentidad"];
        }

        echo json_encode($salida);

    }

    ?>