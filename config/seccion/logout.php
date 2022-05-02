<?php
/**
 * 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 01/03/2022
 * @Fecha Revision:
*/

/**
 * Definir el cierre de seccion
 */
    include_once 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    
    header("location: ../index.php");
    die();
?>