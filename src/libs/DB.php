<?php

namespace Irene\TiendaOnlineMvc\libs;
use Irene\TiendaOnlineMvc\conf\Configuration;
use PDO;
use PDOException;

class DB{

    // static function connect():PDO{
    //     try{
    //         $connection = "mysql:host=".Configuration::$HOST.";dbname=".Configuration::$DB.";charset=".Configuration::$CHARSET;
    //         $options = [
    //             PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //             PDO::ATTR_EMULATE_PREPARES   => false,
    //         ];
            
    //         $pdo = new PDO($connection, Configuration::$USER, Configuration::$PASSWORD, $options);
    //         return $pdo;
    //     }catch(PDOException $e){
    //         print_r('Error connection: ' . $e->getMessage());
    //     }
    // }

    static function connect():PDO{
        try {
            $db = new PDO("mysql:host=".Configuration::$HOST.";port=".Configuration::$PORT.";dbname=".Configuration::$DB,Configuration::$USER,Configuration::$PASSWORD);
            return $db;
        }catch(PDOException $pdo){
            echo $pdo -> getMessage();
            exit; // finaliza el proceso
        }catch(Exception $e){
            echo $e -> getMessage();
            exit; // finaliza el proceso
        }
        return null;
    }

}

?>