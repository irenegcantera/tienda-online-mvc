<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\models\Familia;

class FamiliaCrud extends Controller {
    
    private Familia $familia;

    public function __construct(){
        parent::__construct();
    }

    public function crear(){
        $this->render("views/familias/crear", null);
    }

    public function guardar(){
        $this->familia = new Familia($this->get('codigo'), $this->get('nombre'));
        $this->familia->add();
        $this->render("views/familias/crear", null);
    }

    public function listar(){
        $this->render("views/familias/listar", Familia::getFamilias());
    }

    public function eliminar(){
        $this->familia = new Familia($this->get('codigo'), "");
        $this->familia->delete();
        $this->render("views/familias/listar", $this->familia->getFamilias());
    }

    public function editar(){
        $this->familia = new Familia($this->get('codigo'), $this->get('nombre'));
        $this->render("views/familias/crear", $this->familia);
    }

    public function actualizar(){
        $this->familia = new Familia($this->get('codigo'), $this->get('nombre'));
        $this->familia->update();
        $this->render("views/familias/listar", $this->familia->getFamilias());
    }

    public function inicio(){
        $this->render('menu', null);
    }
    
}

?>