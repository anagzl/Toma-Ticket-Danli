<?php
/**
 * 
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 04/03/2022
 * @Fecha Revision:
*/

/**
 * Definir seccion 
 */

class UserSession{

    public function __construct(){
        session_start();
        //echo session_id();
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>