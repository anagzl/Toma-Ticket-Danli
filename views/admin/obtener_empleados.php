<?php
    /**
     * Formato de funcion para carga de informacion en el datetable para obtenes todos
     * 
     * @Autor:Ana Zavala
     * @Fecha Creacion: 07/07/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_empleado.php");

        $query="";

        $salida= array();

        $query ="SELECT * FROM empleado ";

            if(isset($_POST["search"]["value"])){
                /* Filtar por idEmpleado */
                $query .=' WHERE idEmpleado LIKE "%'.$_POST["search"]["value"].'%"';
                
                /* Filtar por id_usuario */
                $query .=' OR Usuario_idUsuario LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por rol */
                  $query .=' OR Rol_idRol LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por ventanilla */
                 $query .=' OR Ventanilla_idVentanilla LIKE "%'.$_POST["search"]["value"].'%"';

                /* Filtar por correo Institucional */
                $query .=' OR correoInstitucional LIKE "%'.$_POST["search"]["value"].'%"';
                
                /* Filtar por login */
                     $query .=' OR login LIKE "%'.$_POST["search"]["value"].'%"';
            }


    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

            }else{
                $query .=' ORDER BY idEmpleado ';
            }


            /* Funcionalidad para obtener la cantidad si hay por lo menos un registro  */
            if($_POST["length"] !=-1){
                $query .= ' LIMIT '. $_POST["start"].','.$_POST["length"];

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros  
     */    

            $stmt = $conexion->prepare($query);
            $stmt ->execute();
            $resultado = $stmt->fetchAll();
            $datos= array();
            $filtered_rows = $stmt->rowCount();
            foreach($resultado as $fila){
                $sub_array = array();
                $sub_array[]=$fila["idEmpleado"];
                $sub_array[]=$fila["Usuario_idUsuario"]; 
                $sub_array[]=$fila["Rol_idRol"];
                $sub_array[]=$fila["Ventanilla_idVentanilla"];   
                $sub_array[]=$fila["correoInstitucional"];
                $sub_array[]=$fila["login"];            

                /* Funcionalidad para editar */
                $sub_array[]='<button type="button" name="editar" id="'.$fila["idEmpleado"].'" class="btn btn-warning btn-xs editar"><i class="bi bi-pencil-square"></i> Editar </button>';
            
               /*  if($fila["estado"]== 1 )
                {
                    $sub_array[]='<button type="button"name="borrar" id="'.$fila["idEmpleado"].'" class="btn btn-success borrar"><i class="bi bi-toggle-on"></i> Habilitado</button>';
                }
                else
            {
                $sub_array[]='<button type="button"name="borrar" id="'.$fila["idEmpleado"].'" class="btn btn-danger borrar"><i  class="bi bi-toggle-off"></i> Deshabilitado </button>';
        
            } */
                    $datos[] = $sub_array;

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
            
        /* Validar que no este vacio el resultado */
        

            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_empleado(),
                "data"               => $datos
            );

            /* Mando los datos en formato json */
            echo json_encode($salida);
    ?>