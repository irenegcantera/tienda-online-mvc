<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\models\Tienda;

class TiendaCrud extends Controller {
    
    private Tienda $tienda;

    public function __construct(){
        parent::__construct();
    }

    public function crear(){
        $this->render("views/tiendas/crear", null);
    }

    public function guardar(){
        $this->tienda = new Tienda($this->get('cod'), $this->get('nombre'), $this->get('tlf'));
        $this->tienda->add();
        $this->render("views/tiendas/crear", null);
    }

    public function listar(){
        $this->render("views/tiendas/listar", Tienda::getTiendas());
    }

    public function eliminar(){
        $this->tienda = new Tienda($this->get('codigo'), "", "");
        $this->tienda->delete();
        $this->render("views/tiendas/listar", $this->tienda->getTiendas());
    }

    public function editar(){
        $this->tienda = new Tienda($this->get('codigo'), $this->get('nombre'), $this->get('tlf'));
        $this->render("views/tiendas/crear", $this->tienda);
    }

    public function actualizar(){
        $this->tienda = new Tienda($this->get('codigo'), $this->get('nombre'), $this->get('tlf'));
        $this->tienda->update();
        $this->render("views/tiendas/listar", $this->tienda->getTiendas());
    }

    public function inicio(){
        $this->render('menu', null);
    }
    
}

?>