<?php
// // Comprobamos si ya se ha enviado el formulario     
// error_reporting(E_ALL);
// include "funciones.php";
// include_once "config.inc";

// $error="";
// if (isset($_POST['enviar'])) {
//     $usuario = $_POST['usuario'];
//     $password = $_POST['password'];
//     if (empty($usuario) && empty($password)){
//         $error = "Debes introducir un nombre de usuario y una contraseña";
//     }else {             // Comprobamos las credenciales con la base de datos             
//         // Conectamos a la base de datos             
//         $estado = checkUserSend($usuario,$password);
//         switch ($estado) {
//             case ACTIVO:
//                 session_start();
//                 $_SESSION['usuario'] = $usuario;
//                 if(checkAdmin($usuario)){ //comprobar si es administrador o usuario
//                     header("Location: backend/index.php");
//                 }else{
//                     header("Location: productos.php");
//                 }                
//             case BLOQUEADO:
//                 $error = "El usuario está bloqueado, reestablece la contraseña";
//                 break;                
//             case PENDIENTE:
//                 $error = "Todavía no has activado la cuenta, revisa tu correo";
//                 break;                
//             case NOEXISTE:
//                 $error = "Usuario o contraseña no válidos!";
//                 break;  
//             case "null":
//                 $error = "Usuario y/o contraseña no son correctos.";
//                 break;            
//         }
//     }
// }

// if (isset($_POST['registrar'])) {
//     $usuario = $_POST['usuario'];
//     $password = $_POST['password'];
//     if (empty($usuario) && empty($password)){  
//         header("Location: registrar.php");
//     }else{
//         $estado = checkUserRegister($usuario);
//         if ($estado == "null") {
//             // si no existe mostrar un mensaje de si quiere crear o no un perfil
//             header("Location: registrar.php");
//         }else{
//             $error = "El usuario ya está registrado";
//         }
//     }
// }

use Irene\TiendaOnlineMvc\conf\Configuration;

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login</title>
    <link href=<?php Configuration::$PATH."css/login.css"?> rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
        <form action='<?php Configuration::$PATH.'index.php' ?>' method='POST'>
            <fieldset>
                <legend>Login</legend>
                <div class='campo'>
                    <label for='usuario'>Usuario:</label><br>
                    <input type='text' name='usuario' id='usuario' maxlength="50"><br>
                </div><br><br>
                <div class='campo'>
                    <label for='password'>Contraseña:</label><br>
                    <input type='password' name='password' id='password' maxlength="50"><br>
                </div><br><br>
                <div>
                    <a href='recuperar.php'>¿Ha olvidado la contraseña?</a>
                </div><br>
                <div class='campo'>
                    <input type='submit' name='sesion' value='Enviar'>
                    <input type='submit' name='sesion' value='Registrar'>
                </div><br>
            </fieldset>
        </form>
    </div>
</body>

</html>