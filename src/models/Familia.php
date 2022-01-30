<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use PDO;

class Familia extends Model {

    private string $codigo;
    private string $nombre;
    
    public function __construct($codigo,$nombre){
        $this->codigo =$codigo;
        $this->nombre=$nombre;
    }
    
    /* Función que añade familias de productos a la base de datos */
    function add(){ 
            $query = $this -> prepare("INSERT INTO familia(cod,nombre) VALUES(:codigo,:nombre)");
            $query->execute(['codigo'=>$this->codigo,
                        'nombre'=>$this->nombre]);
    }

    /* Función que actualiza datos de familias de productos de la base de datos */
    function update(){ 
        $query = $this -> prepare("UPDATE familia SET nombre =:nombre WHERE cod =:codigo");
        $query->execute(['codigo'=>$this->codigo,
                        'nombre'=>$this->nombre]);
    }

    /* Función que borra una familia de un producto */
    function delete(){
        $query =  $this -> prepare("DELETE FROM familia WHERE cod=:codigo");
        $query->execute(['codigo'=>$this->codigo]);
    }

    // Obtener los productos de la base de datos
    public static function getFamilias(){
        $familias=[];
        $datos=self::query("SELECT * FROM familia");
        
        while ($dato = $datos->fetch()){
            $familias[]= new Familia($dato['cod'],$dato['nombre']);
        }
      
        return $familias;
    }

    // Obtener la familia del código pasado por parámetro
    public static function getFamilia($codigo){
        $datos=self::query("SELECT * FROM familia WHERE cod='".$codigo."'");
        $dato = $datos->fetch();
        if($dato){
            return new Familia($dato['cod'],$dato['nombre']);
        }else{
            return null;
        }
    }
  
    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}

?>