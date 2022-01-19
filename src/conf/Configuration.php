<?php
namespace Irene\TiendaOnlineMvc\conf;

class Configuration {
    
    static public string $HOST = "localhost";
    static public string $DB = "dwes";
    static public string $PORT = "3306";
    static public string $USER = "dwes";
    static public string $PASSWORD = "abc123.";
    static public string $CHARSET = "utf8mb4";
    static public string $PATH ="http://localhost/tienda-online-mvc/src/";
    static public $STATUS = array(
        0 => "Pendiente",
        1 => "Activo",
        2 => "Bloqueado",
        3 => "No existe"
    );
}

?>