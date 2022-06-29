<?php
/**
 * Crear un usuario
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 29/06/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de conexion
 */
    // include("../../config/conexion.php");

/**
 * Crear un nuevo usuario
 * 
 */    

 function crear_usuario($conn){
    $stmt = $conn->prepare("INSERT INTO usuario(
                                idUsuario,
                                primerNombre,
                                segundoNombre,
                                primerApellido,
                                segundoApellido,
                                numeroCelular,
                                -- banderaWhastapp,
                                -- banderaEncuesta,
                                correo
                            )
                            VALUES(
                                :idUsuario,
                                :primerNombre,
                                :segundoNombre,
                                :primerApellido,
                                :segundoApellido,
                                :numeroCelular,
                                -- :banderaWhastapp,
                                -- :banderEncuesta,
                                :correo
                            )");

    $stmt->bindParam("idUsuario",$_POST['idUsuario']);
    $null = null;                          
    // primer nombre o null
    if($_POST['primerNombre'] == null){
        $stmt->bindParam(":primerNombre",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":primerNombre",$_POST['primerNombre'],PDO::PARAM_STR);
    }
    // segundo nombre o null
    if($_POST['segundoNombre'] == null){
        $stmt->bindParam(":segundoNombre",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":segundoNombre",$_POST['segundoNombre'],PDO::PARAM_STR);
    }
    // primer apellido o null
    if($_POST['primerApellido'] == null){
        $stmt->bindParam(":primerApellido",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":primerApellido",$_POST['primerApellido'],PDO::PARAM_STR);
    }
    //segundo apellido o null
    if($_POST['segundoApellido'] == null){
        $stmt->bindParam(":segundoApellido",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":segundoApellido",$_POST['segundoApellido'],PDO::PARAM_STR);
    }
    // numero de celular o null
    if($_POST['numeroCelular'] == null){
        $stmt->bindParam(":numeroCelular",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":numeroCelular",$_POST['numeroCelular'],PDO::PARAM_STR);
    }
    // correo
    if($_POST['correo'] == null){
        $stmt->bindParam(":correo",$null,PDO::PARAM_NULL);
    }else{
        $stmt->bindParam(":correo",$_POST['correo'],PDO::PARAM_STR);
    }

    $resultado = $stmt->execute();
    return $resultado;
 }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idUsuario'])){
    include("../../config/conexion.php");
    echo json_encode(crear_usuario($conexion));
}
?>