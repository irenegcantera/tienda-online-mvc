<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use PDO;

class Tienda extends Model {

    private int $codigo;
    private string $nombre;
    private string $tlf;
    
    public function __construct($codigo,$nombre,$tlf = ""){
        // $this->codigo =$codigo;
        if($codigo == 0){
            $this->codigo = $this->generaCodigo();
        }else{
            $this->codigo = $codigo;
        }
        $this->nombre=$nombre;
        $this->tlf=$tlf;
    }
    /* Función que añade Tiendas de productos a la base de datos */
    function add(){ 
            $query = $this -> prepare("INSERT INTO tienda(cod,nombre,tlf) VALUES(:cod,:nombre,:tlf)");
            $query->execute(['cod'=>$this->generaCodigo(),
                        'nombre'=>$this->nombre,
                        'tlf'=>$this->tlf]);
    }

    /* Función que actualiza datos de tiendas de productos de la base de datos */
    function update(){ 
        if($this -> tlf == ""){
            $query = $this -> prepare("UPDATE tienda SET nombre =:nombre WHERE cod =:codigo");
            $query->execute(['codigo'=>$this->codigo,
                            'nombre'=>$this->nombre]);
        }else{
            $query = $this -> prepare("UPDATE tienda SET nombre =:nombre, tlf =:tlf WHERE cod =:codigo");
            $query->execute(['codigo'=>$this->codigo,
                        'nombre'=>$this->nombre,
                        'tlf'=>$this->tlf]);
        }
    }

    /* Función que borra una tienda de un producto */
    function delete(){
        $query =  $this -> prepare("DELETE FROM tienda WHERE cod=:codigo");
        $query->execute(['codigo'=>$this->codigo]);
    }

    // Obtener los productos de la base de datos
    public static function getTiendas(){
        $tiendas=[];
        $datos=self::query("SELECT * FROM tienda");
        
        while ($dato = $datos->fetch()){
            $tiendas[]= new Tienda($dato['cod'],$dato['nombre'],$dato['tlf']);
        }
      
        return $tiendas;
    }

    // Obtener el producto del código pasado por parámetro
    public static function getTienda($codigo){
        $datos=self::query("SELECT * FROM tienda WHERE cod='".$codigo."'");
        $dato = $datos->fetch();
        if($dato){
            return new Tienda($dato['cod'],$dato['nombre'],$dato['tlf']);
        }else{
            return null;
        }
    }

    private function generaCodigo(){
        $query=$this->query("SELECT max(cod) as cod FROM tienda");
        $data = $query->fetch();
        if($data){
            return $data['cod'] + 1;
        }else{
            return 1;
        }
        // return ($data)?$data['cod']+1:1;
    }
  
    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}

?>