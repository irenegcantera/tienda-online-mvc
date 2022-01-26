<!DOCTYPE html > 
<html> 
    <head>   
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">   
        <title>Cesta de la compra</title>   
        <link href="tienda.css" rel="stylesheet" type="text/css"> 
    </head> 
 
<body class="pagcesta"> 
 
<div id="contenedor">   
    <div id="encabezado">     
        <h1>Cesta de la compra</h1>   
    </div>   
    <div id="productos"> 
        <?php     
        $total = 0;     
        echo "<table id = 'tabla'>";
        echo "<tr><th>Código</th><th>Producto</th><th>Cantidad</th><th>Precio unidad</th><th>Precio total</th></tr>";
        foreach($_SESSION['cesta'] as $codigo => $producto) {
            echo "<tr><td><p>$codigo</p></td>";
            echo "<td>".$producto['nombre']."</td>";
            echo "<td>${producto['cantidad']}</td>";
            echo "<td>".$producto['precio']." €</td>";
            echo "<td>".$producto['cantidad']*$producto['precio']." €</td></tr>";
            $total += $producto['cantidad']*$producto['precio'];
        } 
        echo "</table>";
        ?>
        <hr>
        <p><span class='pagar'>Precio total: <?php print $total; ?> €</span></p>
        <p style="color:red">* IVA incluido</p>
        <form action='' method='post'>
            <p> 
                <span class='pagar'>
                    <input type='submit' name='pagar' value='Pagar'/>
                    <input type='submit' name='seguir' value='Seguir comprando'/>
                </span>
            </p>
        </form>
    </div>
    <br class="divisor" />
    <div id="pie">
        <form action='logoff.php' method='post'>
            <input type='submit' name='desconectar' value='Desconectar usuario 
                <?php echo $_SESSION['usuario']; ?>'/>
        </form>
    </div>
</div>
</body>
</html>