<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\libs\Model;
use PDO;

class Usuario extends Model {

    private string $nombre;
    private string $password;
    private string $email;
    private string $rol;
    private int $status;
    private string $token;
    
    public function __construct($nombre,$password,$email,$rol,$status){
        $this->nombre =$nombre;
        $this->password =$this->generaPassword($password);
        $this->email =$email;
        $this ->rol = $rol;
        $this->status =$status;
        $this->token = $this->generaToken();
    }

    /* Función que crea usuarios que puedan acceder a la tienda online como clientes o como admnistradores */
    function add(){
        // $this -> token = md5(($this -> email).time());
        $this -> status = 1;
        $query = $this ->prepare("INSERT INTO usuario VALUES(:nombre,:password,:email,:rol,:status,:token");
        $query->execute(['nombre'=>$this->nombre,
                        'password'=>$this->password,
                        'email'=>$this->email,
                        'rol'=>$this->rol,
                        'status'=>$this->status,
                        'token'=>$this->token]);
        $query->closeCursor();
    }

    // Solo va a actualizar el estado y el rol de usuario
    /* Función que actualiza datos del usuario de la base de datos */
    function update(){ 
        $query = $this -> prepare("UPDATE usuario SET rol =:rol,status=:status WHERE nombre =:nombre");
        $query->execute(['nombre'=>$this->nombre,
                        'rol'=>$this->rol,
                        'status'=>$this->status]);
        $query->closeCursor();
    }

    /* Función que borra un usuario */
    function delete(){
        $query =  $this -> prepare("DELETE FROM usuario WHERE nombre=:nombre");
        $query->execute(['nombre'=>$this->nombre]);
        $query->closeCursor();
    }

    // funcion verificar usuario datos
    public static function checkUser($usuario, $password){
        $query = self::query("SELECT status FROM usuario WHERE nombre='".$usuario."' AND password='".md5($password)."'");
        $datos=$query->fetch();
        return ($datos)?$datos['status']:-1;
    }

    // funcion verificar si es administrador
    public static function checkUserAdmin($usuario, $password){
        $query = self::query("SELECT rol FROM usuario WHERE nombre='".$usuario."'AND password='".md5($password)."'");
        $datos=$query->fetch();
        return ($datos['rol'] == "Administrador")?true:false;
    }

    // funcion verificar el estado del usuario

    public function generaPassword($password){
        return md5($password);
     }

    public function generaToken(){
       return md5(($this -> email).time());
    }

    // Obtener los usuarios de la base de datos
    public static function getUsuarios(){
        $usuarios=[];
        $datos=self::query("SELECT * FROM usuario");
        
        while ($dato = $datos->fetch()){
            $usuarios[]= new Usuario($dato['nombre'],$dato['password'],$dato['email'],$dato['rol'],$dato['status'],$dato['token']);
        }

        $datos->closeCursor();
        return $usuarios;
    }

    // public static function getUsuario(usuario, contraseña){
    //     $usuarios=[];
    //     $datos=self::query("SELECT * FROM usuario where usuario = usuario and contraseña = contraseño");
        
    //     if(datos->length > 0) return true
    //      else return false;
    // }
  
    public function __get($prop){
        return $this->$prop;
    }

    public function __set($prop,$valor){
        $this->$prop=$valor;
    }

}

?>