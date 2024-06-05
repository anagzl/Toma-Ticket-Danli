<?php
    /**
     * Formato de funcion para carga de informacion en el datetable para obtenes todos
     * 
     * @Autor:Ana Zavala
     * @Fecha Creacion: 30/05/2022
     * @Fecha Revision:
    */

    /**
     * Funcionalidad de busqueda e ordenamiento 
     */
        include("../../config/conexion.php");
        include("funciones_ingreso_cliente.php");

        $query="";

        $salida= array();

        $query ="SELECT * FROM usuario ";

            if(isset($_POST["search"]["value"])){
                /* Filtar por num_identidad */
                $query .=' WHERE num_identidad LIKE "%'.$_POST["search"]["value"].'%"';
           
            }


    /**
     * Funcionalidad ordenamiento 
     */    
            if(isset($_POST["order"])){
                /* ordenar */
                $query .=' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

            }else{
                $query .=' ORDER BY idUsuario ';
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
                 $sub_array[]=$fila["num_identidad"]; 
                 $sub_array[]=$fila["idUsuario"];
                

            }

    /**
     * Funcionalidad de la ejecucion de todos los regitros para la salida 
     */    
            
        /* Validar que no este vacio el resultado */
        

            $salida = array(
                "draw"               => intval($_POST["draw"]),
                "recordsTotal"       => $filtered_rows,
                "recordsFiltered"    => obtener_todos_registros_ingreso_cliente(),
                "data"               => $datos
            );

            /* Mando los datos en formato json */
            echo json_encode($salida);
    ?>