<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\models\Producto;

//interface Crud
class ProductoCrud extends Controller {
    
    private Producto $producto;

    public function __construct(){
        parent::__construct();
    }

    public function crear(){
        $this->render("views/productos/crear", null);
    }

    public function guardar(){
        $this->producto = new Producto($this->get('codigo'), $this->get('nombre'), $this->get('nombre_corto'), $this->get('descripcion'),$this->get('foto'),$this->get('pvp'),$this->get('familia'));
        $this->producto->add();
        $this->render("views/productos/crear", null);
    }

    public function listar(){
        $this->render("views/productos/listar", Producto::getProductos());
    }

    public function eliminar(){
        $this->producto = new Producto($this->get('codigo'), "", "", "", "", "", "");
        $this->producto->delete();
        $this->render("views/productos/listar", $this->producto->getProductos());
    }

    public function editar(){
        $this->producto = new Producto($this->get('codigo'), $this->get('nombre'), $this->get('nombre_corto'), $this->get('descripcion'),$this->get('foto'),$this->get('pvp'),$this->get('familia'));
        $this->render('views/productos/crear', $this->producto);
    }

    public function inicio(){
        $this->render('menu', null);
    }

    public function actualizar(){
        $this->producto = new Producto($this->get('codigo'), $this->get('nombre'), $this->get('nombre_corto'), $this->get('descripcion'),$this->get('foto'),$this->get('pvp'),$this->get('familia'));
        $this->producto->update();
        $this->render('views/productos/listar', $this->producto->getProductos());
    }
    
}

?>