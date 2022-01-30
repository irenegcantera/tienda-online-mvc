<?php
include 'funciones.php';

$error = "";
if(isset($_POST['enviar'])){
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        if(checkEmail($email)){ // comprobar si existe el email 
            $token = getToken($email);
            if($token != null){
                if(sendRecuperacion($email,$token)){ // enviar un mensaje
                    $error = "Mensaje enviado correctamente, revise la carpeta spam.";
                }else{
                    $error = "No se ha podido enviar el correo con el código de recuperación.";
                }
            }else{
                $error = "El código de recuperación no existe.";
            }
        }else{
            $error = "El email no está registrado.";
        }
    }else{
        $error = "No se ha introducido un email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar cuenta</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id = "login">
        <form action ="" method="POST">
            <fieldset>
                <legend>Recuperación de la cuenta</legend>
                <div>
                    <?php echo $error;?>
                </div>
                <div class='campo'>
                    <label for='email'>Email:</label><br>
                    <input type='email' name='email' id='email' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <input type='submit' name='enviar' value='Enviar'>
                </div><br>
            </fieldset>
        </form>
    </div>
</body>
</html>