<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>¡Ha finalizado la compra con éxito!</h2>
    <h3>Si quiere seguir comprando, pulse el siguiente botón para volver a la tienda.</h3>
    <form id='volver' action='<?php Configuration::$PATH_LOCALHOST.'index.php'?>' method='post'>
        <input type='submit' name='op' value='Volver a la tienda'/>
    </form>
</body>
</html>