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
            $info = ["error" => "Los campos son obligatorios."];
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
                        $info = ["error" => "El usuario está bloqueado, reestablece la contraseña."];
                        break;
                    case 2:
                        $info = ["error" => "La cuenta no está activada, revisa tu correo electrónico."];
                        break;
                    case -1:
                        $info = ["error" => "Usuario o contraseña no válidos!"];
                        break;
                }
            }
        }

        if(isset($info['error'])){
            $this->render("views/login/login", $info);
        }
        
    }

    public function registrarForm(){
        $this->render("views/login/registrar", null);
    }

    public function registrar(){
        $usuario = $this->get('nombre');
        $password = $this->get('password');
        $repassword = $this->get('repassword');
        $email = $this->get('email');
        $rol = "Usuario";
        $status = 1;

        if(!empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['email'])){ 
            if(Usuario::checkUser($usuario,$password) == -1){ // no hay estado, no existe usuario
                if($password == $repassword){
                    $nuevoUsuario = new Usuario($usuario,$password,$email,$rol,$status);
                    if($nuevoUsuario->add()){
                        $info = ["mensaje" => "Usuario registrado correctamente."];
                        // $token = $nuevoUsuario->token;
                        // echo $token;
                        // if($nuevoUsuario->sendActivacion($email,$token)){ // enviar email
                        //     $info = ["mensaje" => "Usuario registrado correctamente! Activa la cuenta a través del correo electrónico que se le ha enviado."];
                        // }else{
                        //     $info = ["error" => "No se ha podido enviar el correo con la activación del ususario. Inténtelo más tarde."];
                            
                        // }
                    }
                }else{
                    $info = ["error" => "Las contraseñas deben coincidir."];
                }
            }else{
                $info = ["error" => "El usuario ya está registrado."];
            }         
        }else{
            $info = ["error" => "Los campos son obligatorios."];
        }

        if(isset($info["mensaje"])){
            $this->render("views/login/login", $info);
        }else{
            $this->render("views/login/registrar", $info);
        }
        
    }

    // public function activar(){
    //     // cambiar estado usuario
    // }

    public static function comprobarSesion(){
        return (isset($_SESSION['usuario']))?true:false;
    }

    public function salir(){
        session_unset($_SESSION['usuario']);
        session_destroy();
        $this->render("views/login/login", null);
    }

    public function inicio(){
        $this->render("views/login/login", null);
    }

}

?>