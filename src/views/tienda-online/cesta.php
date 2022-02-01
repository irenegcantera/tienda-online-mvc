<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
?>

<!DOCTYPE html > 
<html> 
    <head>   
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">   
        <title>Cesta de la compra</title>   
        <link href="<?=Configuration::$PATH_LOCALHOST."css/tienda.css"?>" rel="stylesheet" type="text/css"> 
    </head> 
 
<body class="pagcesta"> 
 
<div id="contenedor">   
    <div id="encabezado">     
        <h1>Cesta de la compra</h1>   
    </div>   
    <div id="productos"> 
        <?php       
        echo "<table id = 'tabla'>";
        echo "<tr><th>Código</th><th>Producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></tr>";
        foreach($this->data['cesta']->getProductosCesta() as $producto) {
            echo "<tr><td><p>$producto->codigo</p></td>";
            echo "<td>".$producto->nombre_corto."</td>";
            echo "<td>".$producto->unidades."</td>";
            echo "<td>".$producto->pvp." €</td>";
            echo "<td>".$producto->unidades * $producto -> pvp." €</td></tr>";
        } 
        echo "</table>";
        ?>
        <hr>
        <p><span class='pagar'>Precio total: <?php echo $this->data['cesta']->getCosteTotal(); ?> €</span></p>
        <p style="color:red">* IVA incluido</p>
        <form action='' method='post'>
            <p> 
                <span class='pagar'>
                    <input type='submit' name='op' value='Pagar'/>
                    <input type='submit' name='op' value='Seguir comprando'/>
                </span>
            </p>
        </form>
    </div>
    <br class="divisor" />
    <div id="pie">
        <form action='<?php Configuration::$PATH_LOCALHOST.'index.php'?>' method='post'>
            <input type='submit' name='op' value='Cerrar sesión'>
        </form>
    </div>
</div>
</body>
</html>