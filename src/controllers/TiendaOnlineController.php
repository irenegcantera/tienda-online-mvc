<?php

namespace Irene\TiendaOnlineMvc\controllers;

use Irene\TiendaOnlineMvc\libs\Controller;
use Irene\TiendaOnlineMvc\controllers\LoginController;
use Irene\TiendaOnlineMvc\models\CestaCompra;
use Irene\TiendaOnlineMvc\models\Producto;

class TiendaOnlineController extends Controller {

    private CestaCompra $cesta;

    public function __construct() {
        parent::__construct();
        $this->cesta = CestaCompra::loadCesta();
    }

    public function addProductoCesta(){
        $codigo = $this->get("producto");
        $this->cesta->addProducto($codigo);
        $this->cesta->saveCesta();
    }

    public function deleteProductoCesta(){
        $codigo = $this->get("cod");
        $this->cesta->borrarProductoCesta($codigo);
        $this->cesta->saveCesta();
    }

    public function vaciar(){
        $this->cesta->vaciarCesta();
        $this->showTiendaOnline();
    }
 
    public function showTiendaOnline(){
        if(LoginController::comprobarSesion()){
            $this->render("views/tienda-online/tiendaOnline",["productos"=>Producto::getProductos(),"cesta"=>$this->cesta]);
        }else{
            $this->render("views/login/login", null);
        }
    }

    public function comprarCesta(){
        if(LoginController::comprobarSesion()){
            $this->render("cesta",["cesta"=>$this->cesta]);
        }else{
            $this->render("views/login/login", null);
        }
    }

    public function payCesta(){
        if(LoginController::comprobarSesion()){
            $this->render("pagar",["cesta"=>$this->cesta]);
            $this->vaciar();
        }else{
            $this->render("views/login/login", null);
        }
    }

    public function closeSesion(){
        LoginController::salir();
    }

}

?>