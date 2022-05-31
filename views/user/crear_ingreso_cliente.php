<?php
    /**
     * Formato de funcion para carga de informacion en el datetable
     * 
     * @Autor: Ana Zavala
     * @Fecha Creacion: 31/05/2022
    
    */
    /**
     * Se incluyen la conexion y la funciones creadas para poder gestionar la creacion
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_cliente.php");

    /* Validar operacion Crear   */
    if ($_POST["operacion"]== "Aceptar"){
        
    $stmt= $conexion -> prepare("INSERT INTO usuario(
                                  
                                    idUsuario,
                                    num_identidad,
                                    primerNombre,
                                    segundoNombre,
                                    primerApellido,
                                    segundoApellido,
                                    numeroCelular,
                                    correo,
                                    Genero_idGenero,
                                    TipoUsuario_idTipoUsuario,
                                    Rol_idRol   
    )
    VALUES(
       
                                    :num_identidad,
                                    :idUsuario,
                                    :primerNombre,
                                    :segundoNombre,
                                    :primerApellido,
                                    :segundoApellido,
                                    :numeroCelular,
                                    :correo,
                                    :Genero_idGenero,
                                    :TipoUsuario_idTipoUsuario
                                    /* :Rol_idRol */)");

$resultado = $stmt-> execute(
    array(
            ':idUsuario'                  => $_POST["idUsuario"],
            ':num_identidad'              => $_POST["num_identidad"],
            ':primerNombre'               => $_POST["primerNombre"],
            ':segundoNombre'              => $_POST["segundoNombre"],
            ':primerApellido'             => $_POST["primerApellido"],
            ':segundoApellido'            => $_POST["segundoApellido"],
            ':numeroCelular'              => $_POST["numeroCelular"],
            ':correo'                     => $_POST["correo"],
            ':Genero_idGenero'            => $_POST["Genero_idGenero"],
            ':TipoUsuario_idTipoUsuario'  => $_POST["TipoUsuario_idTipoUsuario"]
           /*  ':Rol_idRol'                  => $_POST["Rol_idRol"] */


            )

    );
    /* Validar que no este vacio el resultado */
    if (!empty($resultado)){
        echo 'Registro creado. ';
    }else{
        echo "Registro Vacio.";
    }
}
?>