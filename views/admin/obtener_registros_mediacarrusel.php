<?php
/**
 * Formato de funcion para carga de informacion en el datetable
 *
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 19/07/2022
 * @Autor:
 * @Fecha Revision:
*/

/**
 * Funcionalidad de busqueda e ordenamiento
 */  @session_start();
    include("../../config/conexion.php");
    include("funciones_mediacarrusel.php");

    $query="";

    $salida= array();

    $query ="SELECT
                idMedia,
                ruta,
                activo
            FROM
                mediacarrusel;";

            if(isset($_POST["search"]["value"])){
                /* Filtar por id */
                $query .=" WHERE idMedia ='".$_POST["search"]["value"]."' ";

                 /* Filtar por ruta */
                 $query .=' OR ruta LIKE "%'.$_POST["search"]["value"].'%" ';
             
            } 


/**
 * Funcionalidad ordenamiento 
 */    
        if(isset($_POST["order"])){
            /* ordenar */
            $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

        }else{
            $query .=' ORDER BY idMedia ASC';
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
            $sub_array[]=$fila["idMedia"];
            $sub_array[]=$fila["ruta"];
            $sub_array[]='<button type="button" name="examinar" id="'.$fila["idMedia"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-search"></i> Examinar </button>';

            if($fila["activo"]== 1){
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idMedia"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            }else{
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idMedia"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            }

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_mediacarrusel(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);