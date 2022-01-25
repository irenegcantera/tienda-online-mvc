<?php

namespace Irene\TiendaOnlineMvc\libs;

class View{
    public $data;

    public function render($name, $datas){
        // print_r($datas);
        $this->data = $datas;
        require dirname(__FILE__, 2) .'\\' .$name.'.php';
    }
}

?>