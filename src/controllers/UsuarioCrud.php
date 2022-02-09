<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\models\Usuario;

class UsuarioCrud extends Controller implements Crud {
    
    private Usuario $usuario;

    public function __construct(){
        parent::__construct();
    }

    public function crear(){
        $this->render("views/usuarios/crear", null);
    }

    public function guardar(){
        $this->usuario = new Usuario($this->get('user'), $this->get('password'), $this->get('email'),$this->get('rol'),$this->get('status'));
        $this->usuario->add();
        $this->render("views/usuarios/crear", null);
    }

    public function listar(){
        $this->render("views/usuarios/listar", Usuario::getUsuarios());
    }
    
    public function eliminar(){
        $this->usuario = new Usuario($this->get('user'), "", "", "", 0);
        $this->usuario->delete();
        $this->render("views/usuarios/listar", $this->usuario->getUsuarios());
    }

    public function editar(){
        $this->usuario = Usuario::getUsuario($this->get('user'));
        $this->render("views/usuarios/crear", $this->usuario);
    }

    public function actualizar(){
        $this->usuario = new Usuario($this->get('user'), "", $this->get('email'),$this->get('rol'),$this->get('status'));
        $this->usuario->update();
        $this->render("views/usuarios/listar", $this->usuario->getUsuarios());
    }

    public function inicio(){
        $this->render('views/menu', null);
    }

    public function acercaDe(){
        $this->render('acercade', null);
    }
    
}

?>