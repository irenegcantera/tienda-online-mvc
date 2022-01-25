<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
use Irene\TiendaOnlineMvc\models\TiendaOnlineController;
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
                $codigo = $_POST['producto'];
                // Creamos un array con los datos del nuevo producto    
                if(isset($this->data['cesta']->$codigo)){
                    $this->data['cesta']->addProductoCesta();
                    // $_SESSION['cesta'][$codigo]['cantidad']++;
                }else{

                    // $producto['nombre'] = $_POST['nombre'];
                    // $producto['precio'] = $_POST['precio'];
                    // $producto['cantidad'] = 1;
                    // $_SESSION['cesta'][$codigo] = $producto;
                }    
            }

            // Si la cesta está vacía, mostramos un mensaje
            $cestaVacia = $this->data['cesta']->isEmpty();
            if ($cestaVacia) {
                print '<p>Cesta vacía</p>';
            } else {
                echo "<table>";
                echo "<tr><th class = 'celda'>Producto</th><th>Cantidad</th><th>Precio</th></tr>";
                foreach ($this->data['cesta']->getProductosCesta() as $producto){
                    // mostrar aqui la cantidad y el precio
                    echo "<tr><td class = 'celda'><p>".$producto->codigo."</p></td>";
                    // echo "<td>".$producto['cantidad']."</td>";
                    // echo "<td>".$producto['cantidad']*$producto['precio']." €</td>";
                    echo"<td><a style='text-decoration:none' href='index.php?op=borrar&cod=".$producto->codigo
                    ."'>&nbsp&nbspX</td></tr>";
                    // $total += $producto['cantidad']*$producto['precio'];
                }
                $cestaVacia = false;
                echo "<tr><th><hr>Importe total</th><th><hr>&nbsp</th><th><hr>".$this->data['cesta']->getCosteTotal()." €</th></tr>";
                echo "</table>";
            }
            
            
            ?>
            
            <form id='vaciar' action='productos.php' method='post'>
                <input type='submit' name='vaciar' value='Vaciar Cesta' <?php if ($cestaVacia) print "disabled='true'"; ?> />
            </form>
            <form id='comprar' action='cesta.php' method='post'>
                <input type='submit' name='comprar' value='Comprar' <?php if ($cestaVacia) print "disabled='true'"; ?> />
            </form>
        </div>

        <div id="productos"> 
            <?php
                echo "<table>";
                foreach ($this->data['productos'] as $producto) {
                    echo "<p><form id='".$producto->codigo."' action='".$_SERVER['PHP_SELF']."' method='post'>";
                    echo "<input type='hidden' name='producto' value='" . $producto->codigo . "'/>";
                    echo "<input type='hidden' name='nombre' value='" . $producto->nombre_corto . "'/>";
                    echo "<input type='hidden' name='precio' value='" . $producto->pvp . "'/>";
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
            <form action='' method='post'>
                <input type='submit' name='op' value='cerrar'>
            </form>
        </div>
    </div>
</body>
</html>