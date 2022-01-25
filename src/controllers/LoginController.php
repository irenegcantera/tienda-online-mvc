<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\conf\ConfigurationStatus;
use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\controllers\UsuarioCrud;
use Irene\TiendaOnlineMvc\models\Usuario;

class LoginController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $usuario = $this->get('usuario');
        $password = $this->get('password');

        if (empty($usuario) || empty($password)) {
            $info = ["mensaje" => "Los campos son obligatorios."];
        } else {
            $estadoUsuario = Usuario::checkUser($usuario,$password);
            if($estadoUsuario == ConfigurationStatus::$ACTIVO){
                $_SESSION['usuario'] = $usuario;
                $rolUsuario = Usuario::checkUserAdmin($usuario,$password);
                if($rolUsuario){
                    $user = new UsuarioCrud;
                    $user->inicio();
                    return;
                }else{
                    $tienda = new TiendaOnlineController;
                    $tienda->showTiendaOnline();
                    return;
                }    
            }else{
                switch ($estadoUsuario) {
                    case 0:
                        $info = ["mensaje" => "El usuario está bloqueado, reestablece la contraseña."];
                        break;
                    case 2:
                        $info = ["mensaje" => "La cuenta no está activada, revisa tu correo electrónico."];
                        break;
                    case -1:
                        $info = ["mensaje" => "Usuario o contraseña no válidos!"];
                        break;
                }
            }
        }
        $this->render("views/login/login", $info);
    }

    public static function comprobarSesion(){
        return (isset($_SESSION['usuario']))?true:false;
    }

    public static function salir(){
        session_unset($_SESSION['usuario']);
        session_destroy();
        $this->render("views/login/login", null);
    }

    public function inicio(){
        $this->render("views/login/login", null);
    }

}

?>