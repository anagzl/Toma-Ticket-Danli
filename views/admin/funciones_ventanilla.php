<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Jonathan Laux 
 * @Fecha Creacion: 06/07/2022
 * @Fecha Revision:
*/
@session_start(); 

/**
 * Funcion para obtener todos los registros para el datatable de ventanilla
 */
    function obtener_todos_registros_ventanilla(){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    idVentanilla,
                                    Direccion_idDireccion,
                                    numero
                                FROM
                                    ventanilla");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $stmt->rowCount();
    }

    function obtener_tramites_ventanilla($idVentanilla){
        include('../../config/conexion.php');
        $stmt=$conexion->prepare("SELECT
                                    v.idVentanilla,
                                    v.Direccion_idDireccion,
                                    v.numero,
                                    v.estado,
                                    th.descripcion AS tramites_ventanilla
                                FROM ventanilla AS v
                                INNER JOIN tramiteshabilitadoventanilla AS th
                                ON
                                    th.Ventanilla_idVentanilla = v.idVentanilla
                                WHERE 
                                    v.idVentanilla = :idVentanilla");
        $stmt->bindParam(':idVentanilla',$idVentanilla,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($resultado){
            return $resultado[0]['tramites_ventanilla'];  
        }else{
            return "No hay tramites";
        }
    }

    function obtener_encargado_ventanilla($idVentanilla){
        include('../../config/conexion.php');
        $salida = array();
        $stmt=$conexion->prepare("SELECT
                                        e.idEmpleado,
                                        e.Usuario_idUsuario,
                                        e.Rol_idRol,
                                        e.Ventanilla_idVentanilla,
                                        e.correoInstitucional,
                                        e.login,
                                        e.estado,
                                        u.primerNombre,
                                        u.primerApellido,
                                        u.segundoApellido
                                    FROM
                                        empleado AS e
                                    INNER JOIN usuario AS u
                                    ON
                                        u.idUsuario = e.Usuario_idUsuario
                                    WHERE
                                        Ventanilla_idVentanilla = :idVentanilla");
        $stmt->bindParam(':idVentanilla',$idVentanilla,PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultado;

    }


?>