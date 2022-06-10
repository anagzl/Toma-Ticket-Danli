<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 26/05/2022
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_cliente.php");

    /* Validar operacion Crear   */
    /* if ($_POST["operacion"]=="Crear"){ */
        
    $stmt= $conexion -> prepare("INSERT INTO usuario(

                idUsuario,
                Genero_idGenero,
                TipoUsuario_idTipoUsuario,
                Rol_idRol,
                primerNombre,
                segundoNombre,
                primerApellido,
                segundoApellido,
                numeroCelular,
              /* banderaWhastapp,
                banderaEncuesta, */
                correo
    )
    VALUES(
                :idUsuario,
                :Genero_idGenero,
                :TipoUsuario_idTipoUsuario,
                :Rol_idRol,
                :primerNombre,
                :segundoNombre,
                :primerApellido,
                :segundoApellido,
                :numeroCelular,
        /*      :banderaWhastapp,
                :banderaEncuesta, */
                :correo
        
            )");


        $resultado = $stmt-> execute(
        array(
         
            ':idUsuario'                    => $_POST["idUsuario"],  
            ':Genero_idGenero'              => $_POST["idGenero"],   
            ':TipoUsuario_idTipoUsuario'    => $_POST["idTipoUsuario"], 
            ':Rol_idRol'                    => 1,
            ':primerNombre'                  => $_POST["primerNombre"],
            ':segundoNombre'                 => $_POST["segundoNombre"],  
            ':primerApellido'               => $_POST["primerApellido"],
            ':segundoApellido'              => $_POST["segundoApellido"],  
            ':numeroCelular'                => $_POST["numeroCelular"],
           /*  ':banderaWhastapp'               => $_POST["banderaWhastapp"],
            ':banderaEncuesta'              => $_POST["banderaEncuesta"],   */
            ':correo'                        => $_POST["correo"]
          
            )

    );
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo 'BIENVENIDO AL IP. ';
    }else{
        echo "Registro Vacio.";
    }
/* } */


?>