<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 10/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_direccion.php");

    $query="";

    $salida= array();

    $query ="SELECT
                idDireccion,
                nombre,
                siglas,
                descripcion
            FROM
                direccion";

            if(isset($_POST["search"]["value"])){
                /* Filtar por numero */
                $query .=" WHERE idDireccion ='".$_POST["search"]["value"]."' ";

                 /* Filtar por telefono */
                 $query .=' OR nombre LIKE "%'.$_POST["search"]["value"].'%" ';
                
                /* Filtar por telefono */
                $query .=' OR siglas LIKE "%'.$_POST["search"]["value"].'%" ';
            } 


/**
 * Funcionalidad ordenamiento 
 */    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY idDireccion ASC';
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
            $sub_array[]=$fila["idDireccion"];
            $sub_array[]=$fila["nombre"];
            $sub_array[]=$fila["siglas"];
            $sub_array[]=$fila["descripcion"];
            $sub_array[]='<button type="button" name="editar" id="'.$fila["idDireccion"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-pencil-fill"></i> Actualizar </button>';

            // if($fila["estado"]== 1){
            //     $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            // }else{
            //     $sub_array[]='<button type="button"name="borrar" id="'.$fila["idTramite"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            // }

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_direccion(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);