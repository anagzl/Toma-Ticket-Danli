<?php
/**
 * Obtencion de registros de empleados
 * 
 * @Autor: Jonathan Laux
 * @Fecha Creacion: 07/07/2022
 * @Fecha Revision:
*/

/**
 * Configuracion de cone
 */

/**
 * Funcionalidad de la ejecucion de registro multiple 
 * 
 */    
require("funciones_empleado.php");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // conseguir empleados por estado
    if(isset($_GET['estado'])){
        echo json_encode(obtener_empleados_estado($_GET['estado']));
    }else{
        if(isset($_GET['idVentanilla'])){
            echo json_encode(obtener_empleados_ventanilla($_GET['idVentanilla']));
        }
    }
}
?>