<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use Irene\TiendaOnlineMvc\models\Producto;

class CestaCompra extends Model {

    protected $productosCesta = [];

    public function addProducto($codigo){
        $producto = Producto::getProducto($codigo);
        foreach($this->productosCesta as $key => $prod){
            if($prod->codigo==$codigo){
                $producto->unidades++;
            }
        }
        $this -> productosCesta[] = $producto;
    }

    public function borrarProductoCesta($codigo){
        foreach ($this->productosCesta as $key => $producto) {
            if($producto->codigo==$codigo){
               unset($this->productosCesta[$key]);
            }
        }
    }

    public function getProductosCesta(){
        return $this->productosCesta;
    }

    public function getCosteTotal(){
        $coste = 0;
        foreach ($this->productosCesta as $producto)
            $coste += $producto->pvp * $producto->unidades;
        return $coste;
    }

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
        if (isset($_SESSION['cesta'])) {
            unset($_SESSION['cesta']);
        }
    }

    public function isEmpty(){
        return (count($this->productosCesta) == 0)? true:false;
    }

}

?>