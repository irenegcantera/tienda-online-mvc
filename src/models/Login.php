<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use PDO;

class Login extends Model{

    private string $usuario;
    private string $password;

    public function __construct($usuario,$password){
        $this -> usuario = $usuario;
        $this -> password = $password;
    }

    public function login(){
        if(!is_session_active()){
            session_start();
            $_SESSION[$this->usuario] = $this->password;
            return $_SESSION[$this->usuario];
        }
        return false;
    }

    public function logoff(){
        session_start();
        session_unset($this->usuario);
        session_destroy($this->usuario);
    }

    public function is_session_active(){
        (session_status() == PHP_SESSION_ACTIVE) ? true : false;
    }

    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}



?>