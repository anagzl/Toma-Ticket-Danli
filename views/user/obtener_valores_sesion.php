<?php
    /**
     * Funcion para obtener todos los valores almacenados en la sesion
     * 
     * @Autor: Jonathan Laux
     * @Fecha Creacion: 07/06/2022
     * @Fecha Revision:
    */

    /**
     * Configuracion de conexion
     */
        include("../../config/conexion.php");

    /**
     * 
     */
    
     session_start();

     echo json_encode($_SESSION);
     
    ?>