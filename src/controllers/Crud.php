<?php

namespace Irene\TiendaOnlineMvc\controllers;

interface Crud {

    public function crear();
    public function guardar();
    public function listar();
    public function eliminar();
    public function editar();
    public function actualizar();
    public function inicio();

}

?>