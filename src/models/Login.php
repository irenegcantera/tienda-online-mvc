<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use PDO;

class Login {

    private string $usuario;
    private string $password;

    public function __construct($usuario,$password){
        $this -> usuario = $usuario;
        $this -> password = $password;
    }

    public function login(){
        session_start();
        $_SESSION[$usuario] = $password;
        return $_SESSION[$usuario];
    }

    public function logoff(){
        session_start();
        session_unset('usuario');
        session_destroy('usuario');
    }

    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}



?>