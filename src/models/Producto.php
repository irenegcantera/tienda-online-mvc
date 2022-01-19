<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use Irene\TiendaOnlineMvc\models\Familia;
use PDO;

class Producto extends Model {

    private string $codigo;
    private string $nombre;
    private string $nombre_corto;
    private string $descripcion;
    private string $foto;
    private float $pvp;
    private string $familia;
    
    public function __construct($codigo,$nombre,$nombre_corto,$descripcion,$foto,$pvp,$familia){
        $this->codigo =$codigo;
        $this->nombre=$nombre;
        $this->nombre_corto=$nombre_corto;
        $this->descripcion =$descripcion;
        $this->foto=$foto;
        $this->pvp=$pvp;
        $this->familia =$familia;
    }

    /* Función que añade productos a la base de datos */
    public function add(){ 
        if($this -> descripcion == NULL){
            if($this -> $foto == NULL){
                $query = $this -> prepare("INSERT INTO producto(cod,nombre_corto,PVP,familia) VALUES(:codigo, :nombre_corto, :pvp, :familia)");
                $query->execute(['codigo'=>$this->codigo,
                        'nombre_corto'=>$this->nombre_corto,
                        'pvp'=>$this->pvp,
                        'familia'=>$this->familia]);
            }else{
                $query = $this -> prepare("INSERT INTO producto(cod,nombre_corto,foto,PVP,familia) VALUES(:codigo, :nombre_corto, :foto, :pvp, :familia)");
                $query->execute(['codigo'=>$this->codigo,
                        'nombre_corto'=>$this->nombre_corto,
                        'foto'=>$this->foto,
                        'pvp'=>$this->pvp,
                        'familia'=>$this->familia]);
            }
        }else{
            if($hits -> foto == NULL){
                $query = $this -> prepare("INSERT INTO producto(cod,nombre_corto,descripcion,PVP,familia) VALUES(:codigo, :nombre_corto, :descripcion, :pvp, :familia)");
                $query->execute(['codigo'=>$this->codigo,
                        'nombre_corto'=>$this->nombre_corto,
                        'descripcion'=>$this->descripcion,
                        'pvp'=>$this->pvp,
                        'familia'=>$this->familia]);
            }else{
                $query = $this -> prepare("INSERT INTO producto(cod,nombre_corto,descripcion,foto,PVP,familia) VALUES(:codigo, :nombre_corto, :descripcion, :foto, :pvp, :familia)");
                $query->execute(['codigo'=>$this->codigo,
                        'nombre_corto'=>$this->nombre_corto,
                        'descripcion'=>$this->descripcion,
                        'foto'=>$this->foto,
                        'pvp'=>$this->pvp,
                        'familia'=>$this->familia]);
            }
        }
    }

    /* Función que actualiza productos de la base de datos */
    function update(){ 
        if($this -> descripcion == NULL){
            if($this -> foto == NULL){
                $query = $this->prepare("UPDATE producto SET nombre_corto=:nombre_corto, PVP =:pvp, familia=:familia WHERE cod =:codigo");
                $query->execute(['codigo'=>$this->codigo,
                                'nombre_corto'=>$this->nombre_corto,
                                'pvp'=>$this->pvp,
                                'familia'=>$this->familia]);
            }else{
                $query = $this->prepare("UPDATE producto SET nombre_corto=:nombre_corto, foto =:$foto, PVP=:pvp, familia =:familia WHERE cod =:codigo");
                $query->execute(['codigo'=>$this->codigo,
                                'nombre_corto'=>$this->nombre_corto,
                                'foto'=>$this->foto,
                                'pvp'=>$this->pvp,
                                'familia'=>$this->familia]);
            }
        }else{
            if($this -> foto == NULL){
                $query = $this->prepare("UPDATE producto SET nombre_corto=:nombre_corto, descripcion =:descripcion, PVP=:pvp, familia =:familia WHERE cod =:codigo");
                $query->execute(['codigo'=>$this->codigo,
                                'nombre_corto'=>$this->nombre_corto,
                                'descripcion'=>$this->descripcion,
                                'pvp'=>$this->pvp,
                                'familia'=>$this->familia]);
            }else{
                $query = $this->prepare("UPDATE producto SET nombre_corto=:nombre_corto, descripcion 
                =:descripcion, foto =:foto, PVP=:pvp, familia =:familia WHERE cod =:codigo");
                $query->execute(['codigo'=>$this->codigo,
                                'nombre_corto'=>$this->nombre_corto,
                                'descripcion'=>$this->descripcion,
                                'foto'=>$this->foto,
                                'pvp'=>$this->pvp,
                                'familia'=>$this->familia]);
            }
        }        
    }

    /* Función que borra un producto */
    function delete(){
        $query =  $this -> prepare("DELETE FROM producto WHERE cod=:codigo");
        $query->execute(['codigo'=>$this->codigo]);
    }

    // Obtener los productos de la base de datos
    public static function getProductos(){
        $productos=[];
        $datos=self::query("SELECT * FROM producto");
        
        while ($dato = $datos->fetch()){
            $productos[]= new Producto($dato['cod'],$dato['nombre'],$dato['nombre_corto'],$dato['descripcion'],$dato['foto'],$dato['PVP'],$dato['familia']);
        }
      
        return $productos;
    }
  
    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}

?>