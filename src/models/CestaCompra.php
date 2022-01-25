<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use Irene\TiendaOnlineMvc\models\Producto;

class CestaCompra extends Model {

    protected $productosCesta = [];

    public function addProducto($codigo){
        $producto = Producto::getProducto($codigo);
        if(producto_in_cesta($codigo)){
            $producto->__set("cantidad", $this->cantidad++);
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

    public function producto_in_cesta($codigo){
        foreach ($this->productosCesta as $key => $producto) {
            if($producto->codigo==$codigo){
                return true;
            }
        }
        return false;
    }

    public function getCosteTotal(){
        $coste = 0;
        foreach ($this->productosCesta as $producto)
            $coste += $producto->pvp * $producto->cantidad;
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