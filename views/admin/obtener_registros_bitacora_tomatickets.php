<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Luis Estrada
 * @Fecha Creacion: 30/06/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_bitacora_tickets.php");

    
if(isset($_POST['fechaInicial']) && isset($_POST['fechaFinal'])){
    $salida= array();

    $query="SELECT
                b.idBitacora,
                b.Sede_idSede,
                s.nombreLocalidad,
                b.Tramite_idTramite,
                t.nombreTramite,
                b.Direccion_idDireccion,
                b.Usuario_idUsuario,
                cliente.primerNombre AS nombre_cliente,
                cliente.primerApellido AS apellido_cliente,
                cliente.numeroIdentidad AS identidad_cliente,
                b.Empleado_idEmpleado,
                b.fecha,
                b.horaGeneracionTicket,
                b.horaEntrada,
                b.horaSalida,
                b.Observacion,
                b.numeroTicket,
                u.primerNombre AS nombre_empleado,
                u.primerApellido AS apellido_empleado,
                u.numeroIdentidad,
                d.nombre AS nombre_direccion,
                e.Usuario_idUsuario
            FROM
                bitacora AS b
            INNER JOIN tramite AS t
            ON
                t.idTramite = b.Tramite_idTramite
            INNER JOIN direccion AS d
            ON
                d.idDireccion = b.Direccion_idDireccion
            INNER JOIN usuario AS cliente
            ON
                cliente.idUsuario = b.Usuario_idUsuario
            INNER JOIN sede AS s
            ON
                s.idSede = b.Sede_idSede
            LEFT JOIN empleado AS e
            ON
                e.idEmpleado = b.Empleado_idEmpleado
            LEFT JOIN usuario AS u
            ON
                u.idUsuario = e.Usuario_idUsuario";

            if(isset($_POST["search"]["value"])){
                /* Filtar por numero de identidad de usuario */
                $query .=' WHERE (cliente.numeroIdentidad LIKE "%'.$_POST["search"]["value"].'%"';
                
                /* Filtar por FECHA */
                $query .=' OR  b.fecha LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por nombre de direccion */
                $query .=' OR d.nombre LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtrar por nombre de tramite */
                $query .=' OR t.nombreTramite LIKE "%'.$_POST["search"]["value"].'%"';

                 /* Filtrar por  primer nombre usuario*/
                 $query .=' OR cliente.primerNombre LIKE "%'.$_POST["search"]["value"].'%"';

                 /* Filtrar por  primer apellido usuario*/
                 $query .=' OR cliente.primerNombre LIKE "%'.$_POST["search"]["value"].'%"';

                 /* Filtrar por  primer nombre empleado*/
                 $query .=' OR u.primerNombre LIKE "%'.$_POST["search"]["value"].'%"';

                  /* Filtrar por  primer apellido empleado*/
                  $query .=' OR u.primerApellido LIKE "%'.$_POST["search"]["value"].'%")';

                  /* Filtrar por Fecha */
                  $query .= "AND (b.fecha BETWEEN '" .$_POST['fechaInicial']. "' AND '".$_POST['fechaFinal']. "')";
            } 


/**
 * Funcionalidad ordenamiento 
 */    
    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY b.idBitacora ASC';
        }


        /* Funcionalidad para obtener la cantidad si hay por lo menos un registro  */
        if($_POST["length"] !=-1){
            $query .= ' LIMIT '. $_POST["start"].','.$_POST["length"];

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros  
 */    

        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $datos = array();
        $filtered_rows = $stmt->rowCount();
        include_once("funciones_empleado.php");
        foreach($resultado  as $fila){
            $sub_array = array();
            $sub_array[]=$fila["idBitacora"];
            $sub_array[]=$fila["nombreLocalidad"];
            $sub_array[]=$fila["nombre_cliente"]. " " .$fila["apellido_cliente"]. " / " .$fila["identidad_cliente"];
            $sub_array[]=$fila["nombreTramite"];
            $sub_array[]=$fila["nombre_direccion"];
            $sub_array[]=$fila["fecha"];
            $sub_array[]=$fila["horaGeneracionTicket"];
            $sub_array[]=$fila["horaEntrada"];
            $sub_array[]=$fila["horaSalida"];
            $sub_array[]=$fila["Observacion"];
            $sub_array[]=$fila["nombre_empleado"] . " " . $fila["apellido_empleado"];

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_bitacora_tickets($_POST["fechaInicial"],$_POST["fechaFinal"]),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);

}else{
    echo "Especifica una fecha inicial y final.";
}
    