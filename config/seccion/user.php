<?php
/**
 *  
 * 
 * @Autor: Luis Estrada 
 * @Fecha Creacion: 04/03/2022
 * @Fecha Revision:
*/

/**
 * Definir parametros
 */
include 'db.php';

class User extends DB{
    private $nombre;
    private $apellido;
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE loginUsuario = :user AND password = :pass');
        //$query->execute(['user' => $user, 'pass' => $md5pass]);
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE loginUsuario = :user');
        $query->execute(['user' => $user]);
       // $query->execute(['user' => $apellido]);
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['primerNombre'];
            //$this->apellido = $currentUser['primerApellido'];
            //$this->usename = $currentUser['username'];
            $this->usename = $currentUser['loginUsuario'];
        }
    }

    public function getNombre(){
        return $this->nombre ;
    }
}

?>