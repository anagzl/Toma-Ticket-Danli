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
    include("funciones_ventanilla.php");

    $query="";

    $salida= array();

    $query ="SELECT
                v.idVentanilla,
                v.Direccion_idDireccion,
                v.numero,
                v.estado,
                /* v.ventanilla_preferencia, */
                d.nombre AS nombre_direccion
            FROM
                ventanilla AS v
            INNER JOIN direccion AS d
            ON
                d.idDireccion = v.Direccion_idDireccion";

            if(isset($_POST["search"]["value"])){
                /* Filtar por numero */
                $query .=" WHERE v.numero ='".$_POST["search"]["value"]."' ";

                 /* Filtar por telefono */
                 $query .=' OR v.idVentanilla LIKE "%'.$_POST["search"]["value"].'%" ';
                
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
            $query .=' ORDER BY v.numero ASC';
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
        
            $empleadosVentanilla = obtener_encargado_ventanilla($fila["idVentanilla"]);
            $stringEmpleados = '';
            foreach($empleadosVentanilla as $empleado){
            $stringEmpleados .= $empleado['primerNombre']. " ". $empleado['primerApellido']. ",";
            }
            $sub_array = array();
            $sub_array[]=$fila["numero"];
            $sub_array[]=$fila["nombre_direccion"];
            $sub_array[]=obtener_tramites_ventanilla($fila["idVentanilla"]);
           /*  $sub_array[]= (empty($empleado)) ? "No hay asignados" : $empleado["primerNombre"]. " ". $empleado["primerApellido"]; */
           $sub_array[]= (empty($stringEmpleados)) ? "No hay asignados" : $stringEmpleados;
           $sub_array[]='<button type="button" name="editar" id="'.$fila["idVentanilla"].'" class="btn btn-info editar" style="color:white;"><i class="bi bi-pencil-fill"></i> Actualizar </button>';

            if($fila["estado"]== 1){
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idVentanilla"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
            }else{
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idVentanilla"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
            }
           /*  if($fila["ventanilla_preferencia"]== 1){
                $sub_array[]='<button type="button"name="borrarr" id="'.$fila["idVentanilla"].'" class="btn btn-success borrarr"><i class="bi bi-toggle-on"></i> Si</button>';
            }else{
                $sub_array[]='<button type="button"name="borrarr" id="'.$fila["idVentanilla"].'" class="btn btn-danger borrarr"><i  class="bi bi-toggle-off"></i> No </button>';
            } */

            $datos[] = $sub_array;

        }

/**
 * Funcionalidad de la ejecucion de todos los regitros para la salida 
 */    

        $salida = array(
            "draw"               => intval($_POST["draw"]),
            "recordsTotal"       => $filtered_rows,
            "recordsFiltered"    => obtener_todos_registros_ventanilla(),
            "data"               => $datos
        );

        /* Mando los datos en formato json */
        echo json_encode($salida);