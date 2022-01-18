<?php

namespace Irene\TiendaOnlineMvc\libs;
//no hace falta use porque se encuentra Model y DB en la misma carpeta
class Model{

    public static function query($query){
        return DB::connect()->query($query);
    }
    public static function prepare($query){
        return DB::connect()->prepare($query);
    }   
}

?>