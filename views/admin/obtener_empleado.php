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
        $stmt = $conexion->prepare("SELECT * FROM empleado WHERE idEmpleado = '".$_POST["idEmpleado"]."' LIMIT 1;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["Rol_idRol"]= $fila["Rol_idRol"];
            $salida["Ventanilla_idVentanilla"]= $fila["Ventanilla_idVentanilla"];
            $salida["correoInstitucional"]= $fila["correoInstitucional"];
            $salida["login"]= $fila["login"];
            $salida["Estado"]= $fila["Estado"];
        }
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
          
            $salida["idEmpleado"] = $fila["idEmpleado"];
            $salida["Usuario_idUsuario"] = $fila["Usuario_idUsuario"];
            $salida["Rol_idRol"]= $fila["Rol_idRol"];
            $salida["Ventanilla_idVentanilla"]= $fila["Ventanilla_idVentanilla"];
            $salida["correoInstitucional"]= $fila["correoInstitucional"];
            $salida["login"]= $fila["login"];

        
        }

        echo json_encode($salida);

    }

    ?>