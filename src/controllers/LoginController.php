<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\models\Usuario;

class LoginController extends Controller {

    private Login $login;

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        // recuperar usuarios
        $usuarios = Usuario::getUsuarios();

        $sesion = $this->login();
        // si coincide algun usuario de usuarios y sesion CHECKUSUARIO($sesion)
            // si usuario es administrador CHECKADMINITRADOR($sesion)
                // si el usuario es activo CHECKSTATUS($sesion)
                    $this->render("index", null);
                // no
                    $this->render("views/login/login", null);
            // no
                $this->render("views/login/login", null);
        // no
            $this->render("views/login/login", null);
        
    }

    // public function entrar(){
    //     // recuperar los usuaerios
    //     // instanciar un nuevo usuario con los datos del form
    //     // comparar los usuarios con la instanciar
    //     // true -> set de datos que faltan a la instancia
    //                 // $this->render("index", null);
    //     // false -> $this->render("views/login/login", null);
    // }

    // public function registrar(){
    //     // render registrar.php
    // }

    public function inicio(){
        $this->render("views/login/login", null);
    }

    public function salir(){
        $this->login = new Login($this->get('usuario'),$this->get('password'));
        $this->logoff();
        $this->render("views/login/login", null);
    }

}

?>