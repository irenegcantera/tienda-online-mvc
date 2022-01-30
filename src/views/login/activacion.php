<?php
include 'funciones.php';

$error = "";
if(isset($_GET['token'])){
    $token = $_GET['token'];
    if(checkToken($token,0)){ // recoger el token y comprobar si el estado es igual 0
        // cambiar estado a 1 y redirigir a login.php
        if(changeStatusUser($token,1) > 0){
            header('Location: login.php');
        }else{
            $error = "Error al cambiar el estado de la cuenta.";
        }
    }else{
        $error = "La activación de la cuenta ha fallado.";
    }
}
echo $error;
?>