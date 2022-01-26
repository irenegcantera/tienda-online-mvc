<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
use Irene\TiendaOnlineMvc\models\TiendaOnlineController;
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Unidad 5: Listado de Productos</title>
    <link href="<?=Configuration::$PATH_LOCALHOST."css/tienda.css"?>" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">

    <div id="contenedor">
        <div id="encabezado">
            <h1>Listado de productos</h1>
        </div>
        <div id="cesta">
            <h3><img src="cesta.png" alt="Cesta" width="24" height="21"> Cesta</h3>
            <hr>
            <?php
            // Comprobamos si se ha enviado el formulario de vaciar la cesta     
            if (isset($_POST['vaciar'])) {
                unset($_SESSION['cesta']);
            }

            // Comprobamos si se ha enviado el formulario de añadir     
            if (isset($_POST['op']['Añadir'])) {   
                $this->data['cesta']->addProductoCesta();
            }

            // Si la cesta está vacía, mostramos un mensaje
            $cestaVacia = $this->data['cesta']->isEmpty();
            if ($cestaVacia) {
                print '<p>Cesta vacía</p>';
            } else {
                echo "<table>";
                echo "<tr><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>";
                foreach ($this->data['cesta']->getProductosCesta() as $producto){
                    // mostrar aqui la cantidad y el precio
                    echo "<tr><td><p>".$producto->codigo."</p></td>";
                    echo "<td>".$producto->unidades."</td>";
                    echo "<td>".$producto->unidades * $producto -> pvp." €</td>";
                    echo"<td><a style='text-decoration:none' href='index.php?op=borrar&cod=".$producto->codigo
                    ."'>&nbsp&nbspX</td></tr>";
                }
                $cestaVacia = false;
                echo "<tr><th><hr>Importe total</th><th><hr>&nbsp</th><th><hr>".$this->data['cesta']->getCosteTotal()." €</th></tr>";
                echo "</table>";
            }
            ?>
            
            <form id='vaciar' action='<?php Configuration::$PATH_LOCALHOST.'index.php' ?>' method='post'>
                <input type='submit' name='op' value='Vaciar' <?php if ($cestaVacia) print "disabled='true'"; ?> />
            </form>
            <form id='comprar' action='index.php' method='post'>
                <input type='submit' name='op' value='Comprar' <?php if ($cestaVacia) print "disabled='true'"; ?> />
            </form>
        </div>

        <div id="productos"> 
            <?php
                echo "<table>";
                foreach ($this->data['productos'] as $producto) {
                    echo "<p><form id='".$producto->codigo."' action='".Configuration::$PATH_LOCALHOST."'index.php' method='post'>";
                    echo "<input type='hidden' name='producto' value='" . $producto->codigo . "'/>";
                    echo "<tr><td><input type='submit' name='op' value='Añadir'/></td>";
                    echo "<td>".$producto->nombre_corto."</td>";
                    echo "<td>".$producto->pvp." euros</td></tr>";
                    echo "</form>";
                    echo "</p>";
                }
                echo "</table>";
            ?>

        </div>
        <br class="divisor" />
        <div id="pie">
            <form action='index.php' method='post'>
                <input type='submit' name='op' value='cerrar'>
            </form>
        </div>
    </div>
</body>
</html>