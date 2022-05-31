<?php 
/**
 * Formato de funcion para carga de informacion en el datetable
 * 
 * @Autor: Ana Zavala 
 * @Fecha Creacion: 25/05/2022

*/

/**
 * Funcion para obtener todos los registros para el datatable
 */
function obtener_todos_registros_datos_cliente(){
    include('../../config/conexion.php');
  
    $stmt=$conexion->prepare("SELECT
        u.num_identidad as num_identidad,
        u.idUsuario as idUsuario,
        u.primerNombre as primerNombre,
        u.segundoNombre as segundoNombre,
        u.primerApellido as primerApellido,
        u.segundoApellido as segundoApellido,
        u.numeroCelular as numeroCelular,
        u.correo as correo ,
        u.Genero_idGenero as Genero_idGenero,
        u.TipoUsuario_idTipoUsuario as TipoUsuario_idTipoUsuario,
        u.Rol_idRol as Rol_idRol
    FROM
        usuario as u
        INNER JOIN genero as g
        ON u.Genero_idGenero = g.idGenero
        INNER JOIN tipousuario as tu
        ON  u.TipoUsuario_idTipoUsuario = tu.idTipoUsuario
        INNER JOIN rol as r
        ON  r.idRol = u.Rol_idRol");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}


?>