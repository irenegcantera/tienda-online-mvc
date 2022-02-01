<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="<?=Configuration::$PATH_LOCALHOST."css/login.css"?>" rel="stylesheet" type="text/css">
</head>

<body>
    <div id = "login">
        <form method="POST" action="<?php Configuration::$PATH_LOCALHOST.'index.php'?>">
            <fieldset>
                <?php
                if(isset($this->data['error'])){
                    echo "<div class='error'>".$this->data['error']."</div>";
                }
                ?>
                <br><br>
                <legend>Registro de usuario</legend>
                <div class='campo'>
                    <label for='nombre'>Nombre:</label><br>
                    <input type='text' name='nombre' id='nombre' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <label for='password'>Contraseña:</label><br>
                    <input type='password' name='password' id='password' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <label for='repassword'>Repetir contraseña:</label><br>
                    <input type='password' name='repassword' id='repassword' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <label for='email'>Email:</label><br>
                    <input type='email' name='email' id='email' maxlength="70" required><br>
                </div><br><br>
                <div class='campo'>
                    <input type='submit' name='op' value='Registrar'>
                </div><br>
            </fieldset>
        </form>
    </div>
</body>
</html>