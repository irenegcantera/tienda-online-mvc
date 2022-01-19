<?php

namespace Irene\TiendaOnlineMvc\libs;

class View{
    public $data = array();

    public function render(string $name, $datas=[]){
        // var_dump($datas);
        $this->data = $datas;
        require dirname(__FILE__, 2) .'\\' .$name.'.php';
    }
}

?>