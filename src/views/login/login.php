<?php

use Irene\TiendaOnlineMvc\conf\Configuration;

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login</title>
    <link href=<?php Configuration::$PATH_LOCALHOST."css/login.css"?> rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
        <form action='<?php Configuration::$PATH_LOCALHOST.'index.php' ?>' method='POST'>
            <fieldset>
                <div>
                    <span class='error'><?php if(isset($this->info)) echo $this->info['mensaje']; ?></span>
                </div>    
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
                    <input type='submit' name='op' value='Entrar'>
                    <input type='submit' name='op' value='Registrar'>
                </div><br>
            </fieldset>
        </form>
    </div>
</body>

</html>