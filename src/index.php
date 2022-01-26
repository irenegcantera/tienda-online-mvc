<?php

session_start();

require dirname(__DIR__).'/vendor/autoload.php';

use Irene\TiendaOnlineMvc\controllers\LoginController;
use Irene\TiendaOnlineMvc\controllers\TiendaOnlineController;
use Irene\TiendaOnlineMvc\controllers\FamiliaCrud;
use Irene\TiendaOnlineMvc\controllers\ProductoCrud;
use Irene\TiendaOnlineMvc\controllers\TiendaCrud;
use Irene\TiendaOnlineMvc\controllers\UsuarioCrud;

error_reporting(E_ALL);
$controlLogin = new LoginController();
$controlTiendaOnline = new TiendaOnlineController();

if (isset($_REQUEST['op'])) {
    $op = $_REQUEST['op'];

    if(isset($_REQUEST['tipo'])){
        $tipo = $_REQUEST['tipo'];
        switch($tipo){
            case 'familia':
                $control = new FamiliaCrud();
                break;
            case 'producto':
                $control = new ProductoCrud();
                break;
            case 'tienda':
                $control = new TiendaCrud();
                break;
            case 'usuario':
                $control = new UsuarioCrud();
        }
    }

    switch ($op) {
        case 'Entrar':
            $controlLogin -> login();
            break;
        case 'Registrar':
            $controlLogin -> registrar();
            break;
        case 'Cerrar':
            $controlLogin -> salir();
            break;     
        case 'Añadir':
            $controlTiendaOnline->addProductoCesta();
            break;
        case 'borrar':
            $controlTiendaOnline->deleteProductoCesta();
            break;
        case 'Vaciar':
            $controlTiendaOnline->vaciar();
            break;
        case 'Comprar':
            $controlTiendaOnline->comprarCesta();
            break;
        case 'Pagar':
            $controlTiendaOnline->pagarCesta();
            break;
        case 'Seguir comprando':
            $controlTiendaOnline->showTiendaOnline();
            break;
        case 'Volver a la tienda':
            $controlTiendaOnline->showTiendaOnline();
            break;
        case 'Desconectar':
            $controlTiendaOnline->closeSesion();
            break;  
        case 'crear':
            $control->crear();
            break;
        case 'listar':
            $control->listar();
            break;
        case 'eliminar':
            $control->eliminar();
            break;
        case 'guardar':
            $control->guardar();
            break;
        case 'editar':
            $control->editar();
            break;
        case 'actualizar':
            $control->actualizar();
            break;
        case 'actualizar':
            $control->acercaDe();
            break;
        default:
            $controlLogin->inicio();
    }
}else{
    $controlLogin->inicio();
}

?>