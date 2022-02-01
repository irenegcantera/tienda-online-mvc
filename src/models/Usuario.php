<?php

namespace Irene\TiendaOnlineMvc\models;

use Irene\TiendaOnlineMvc\conf\Configuration;
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
        //$this -> status = 1;
        try{
            $query = $this ->prepare("INSERT INTO usuario VALUES(:nombre,:password,:email,:rol,:status,:token)");
            $query->execute(['nombre'=>$this->nombre,
                            'password'=>$this->password,
                            'email'=>$this->email,
                            'rol'=>$this->rol,
                            'status'=>$this->status,
                            'token'=>$this->token]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    // Solo va a actualizar el email, el estado y el rol de usuario
    /* Función que actualiza datos del usuario de la base de datos */
    function update(){ 
        $query = $this -> prepare("UPDATE usuario SET email=:email, rol =:rol,status=:status WHERE nombre =:nombre");
        $query->execute(['nombre'=>$this->nombre,
                        'email'=>$this->email,
                        'rol'=>$this->rol,
                        'status'=>$this->status]);
    }

    /* Función que borra un usuario */
    function delete(){
        $query =  $this -> prepare("DELETE FROM usuario WHERE nombre=:nombre");
        $query->execute(['nombre'=>$this->nombre]);
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

    public function generaPassword($password){
        return md5($password);
     }

    public function generaToken(){
       return md5(($this -> email).time());
    }

    // function sendActivacion($email,$token){
    //     $to = $email;
    //     $subject = "Validación de registro";
    //     $mensaje = "<p>¡BIENVENIDO/A!</p>
    //                 <p>Gracias por registrate en nuestra tienda online.</p><br>
    //                 <p>Solo falta un último paso para recibir un descuento del 10% en todos nuestros productos.</p>
    //                 <p>Confirma el registro en el siguiente enlace: </p><br>
    //                 <a href='".Configuration::$PATH_LOCALHOST."index.php?op=activacion&token=$token'>Activar cuenta</a>";
    //     $cabeceras = 'MIME-Version: 1.0'."\r\n";
    //     $cabeceras .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    //     $enviado = mail($to,$subject,$mensaje,$cabeceras);
    //     return $enviado; // devuelve un boolean
    // }

    // function checkToken($token,$status){
    //     $sql = "SELECT * FROM usuario WHERE token = '$token' AND status = $status";
    // }

    // function changeStatusUser($token){
    //     $query = $this -> prepare("UPDATE usuario SET status =:status WHERE token =:token");
    //     $query->execute(['status'=>$this->status,
    //                     'token' =>$token]);
    // }

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

    // Obtener el producto del código pasado por parámetro
    public static function getUsuario($nombre){
        $datos=self::query("SELECT * FROM usuario WHERE nombre='".$nombre."'");
        $dato = $datos->fetch();
        if($dato){
            return new Usuario($dato['nombre'],$dato['password'],$dato['email'],$dato['rol'],$dato['status'],$dato['token']);
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