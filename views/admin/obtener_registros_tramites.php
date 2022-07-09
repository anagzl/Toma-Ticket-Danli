<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 07/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_tramite.php");

    $query="";

    $salida= array();

    $query ="SELECT
                t.idTramite,
                t.Direccion_idDireccion,
                t.nombreTramite,
                t.descripcionTramite,
                t.estado,
                d.nombre AS nombre_direccion
            FROM
                tramite AS t
            INNER JOIN direccion AS d
            ON
                d.idDireccion = t.Direccion_idDireccion";

            if(isset($_POST["search"]["value"])){
                /* Filtar por numero */
                $query .=" WHERE t.idTramite ='".$_POST["search"]["value"]."' ";

                 /* Filtar por telefono */
                 $query .=' OR t.nombreTramite LIKE "%'.$_POST["search"]["value"].'%" ';
                
                /* Filtar por telefono */
                $query .=' OR d.nombre LIKE "%'.$_POST["search"]["value"].'%" ';
            } 


/**
 * Funcionalidad ordenamiento 
 */    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY t.idTramite ASC';
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

        foreach($resultado  as $fila){
            $sub_array = array();
            $sub_array[]=$fila["idTramite"];
            $sub_array[]=$fila["nombreTramite"];
            $sub_array[]=$fila["descripcionTramite"];
            $sub_array[]=$fila["nombre_direccion"];
            $sub_array[]='<button type="button" name="editar" id="'.$fila["idTramite"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-pencil-fill"></i> Actualizar </button>';

            if($fila["estado"]== 1){
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            }else{
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            }

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_tramite(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);