<?php
include 'funciones.php';

$error = "";
if(isset($_GET['token'])){
    $token = $_GET['token'];
    if(checkToken($token,2)){ // recoger el token y comprobar si el estado es igual 2
        if(isset($_POST['cambiar'])){
            if(!empty($_POST['password']) && $_POST['repassword']){
                if($_POST['password'] == $_POST['repassword']){
                    $newPassword = md5($_POST['password']);
                    $password = getPassword($token);
                    if(changePassword($token,$newPassword) > 0){
                        if(changeStatusUser($token,1) > 0){
                            $error = "El establecimiento de la nueva contraseña ha sido un éxito.";
                            echo "<a href='login.php'>Iniciar sesión</a>";
                        }else{
                            $error = "Error al cambiar el estado de la cuenta.";
                            changePassword($token,$password);
                        }
                    }else{
                        $error = "El establecimiento de la nueva contraseña no ha sido posible.";
                    }
                }else{
                    $error = "Los campos no coinciden";
                }
            }else{
                $error = "Los campos están vacíos";
            }
        }  
    } else{
        $error = "La recuperación de la cuenta ha fallado.<br>¿Seguro que eres un usuario bloqueado?";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id = "login">
        <form method="post" action="">
            <fieldset>
                <legend>Cambio de contraseña</legend>
                <div>
                    <?php echo $error;?>
                </div><br>
                <div class='campo'>
                    <label for='password'>Contraseña:</label><br>
                    <input type='password' name='password' id='password' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <label for='repassword'>Repetir contraseña:</label><br>
                    <input type='password' name='repassword' id='repassword' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <input type='submit' name='cambiar' value='Cambiar'>
                </div><br>
            </fieldset>
        </form>
    </div>
</body>
</html>