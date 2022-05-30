<?php
    /**
     * Formato de funcion para carga de informacion en el datetable de Estado
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 25/05/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_datos_cliente.php");
    
    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

    if (isset($_POST["idUsuario"])) {
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE idUsuario = '".$_POST["idUsuario"]."' LIMIT 1;");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
        /*   $salida["idUsuario"]                  = $fila["idUsuario"];
            $salida["num_identidad"]              = $fila["num_identidad"]; */
            $salida["primerNombre"]               = $fila["primerNombre"];
            $salida["segundoNombre"]               = $fila["segundoNombre"];
            $salida["primerApellido"]             = $fila["primerApellido"];
            $salida["segundoApellido"]            = $fila["segundoApellido"];
            $salida["numeroCelular"]              = $fila["numeroCelular"];
            $salida["correo"]                     = $fila["correo"];
            $salida["idGenero"]                   = $fila["idGenero"];
            $salida["idTipoUsuario"]              = $fila["idTipoUsuario"];

        }
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
     /*       $salida["idUsuario"]                  = $fila["idUsuario"];
            $salida["num_identidad"]              = $fila["num_identidad"]; */
            $salida["primerNombre"]               = $fila["primerNombre"];
            $salida["segundoNombre"]               = $fila["segundoNombre"];
            $salida["primerApellido"]             = $fila["primerApellido"];
            $salida["segundoApellido"]            = $fila["segundoApellido"];
            $salida["numeroCelular"]              = $fila["numeroCelular"];
            $salida["correo"]                     = $fila["correo"];
            $salida["idGenero"]                   = $fila["idGenero"];
            $salida["idTipoUsuario"]              = $fila["idTipoUsuario"];
        }

        echo json_encode($salida);

    }

    ?>