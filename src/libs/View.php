<?php

namespace Irene\TiendaOnlineMvc\libs;

class View{
    public $data;

    public function render($name, $datos){
        // print_r($datas);
        $this->data = $datos;
        require dirname(__FILE__, 2) .'\\' .$name.'.php';
    }
}

?>