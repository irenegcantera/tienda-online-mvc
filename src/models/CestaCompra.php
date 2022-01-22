<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Model;
use Irene\TiendaOnlineMvc\models\Producto;

class CestaCompra extends Model {

    protected $productosCesta = [];

    public function addProducto($codigo){
        $this -> productosCesta[] = Producto::getProducto($codigo);
    }

    public function getProductosCesta(){
        return $this->productosCesta;
    }

    // public function getCoste(){
    //     $coste = 0;
    //     foreach ($this->productos as $p)
    //         $coste += $p->PVP;
    //     return $coste;
    // }

    public function saveCesta(){
        $_SESSION['cesta'] = serialize($this);
    }

    public static function loadCesta(){
        if (!isset($_SESSION['cesta'])){
            return new CestaCompra();
        }else{
            return (unserialize($_SESSION['cesta']));
        }
    }

    public function vaciarCesta(){
        $this->productosCesta = [];
        if (isset($_SESSION['cesta'])) {
            unset($_SESSION['cesta']);
        }
    }

    public function isEmpty(){
        return (count($this->productosCesta) == 0)? true:false;
    }

}

?>