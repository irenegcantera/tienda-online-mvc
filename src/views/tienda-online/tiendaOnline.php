<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Unidad 5: Listado de Productos</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
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
            if(isset($_GET['borrar']) && isset($_GET['cod'])){
                $codigo = $_GET['cod'];
                unset($_SESSION['cesta'][$codigo]);
                echo "Eliminado de la cesta el producto ".$codigo;
            }
            
            // Comprobamos si se ha enviado el formulario de vaciar la cesta     
            if (isset($_POST['vaciar'])) {
                unset($_SESSION['cesta']);
            }

            // Comprobamos si se ha enviado el formulario de añadir     
            if (isset($_POST['add'])) {   
                $codigo = $_POST['producto'];
                // Creamos un array con los datos del nuevo producto    
                if(isset($_SESSION['cesta'][$codigo])){
                    $_SESSION['cesta'][$codigo]['cantidad']++;
                }else{
                    $producto['nombre'] = $_POST['nombre'];
                    $producto['precio'] = $_POST['precio'];
                    $producto['cantidad'] = 1;
                    $_SESSION['cesta'][$codigo] = $producto;
                }    
            }

            // Si la cesta está vacía, mostramos un mensaje    
            $cesta_vacia = true;
            if(isset($_SESSION['cesta'])){
                if (count($_SESSION['cesta']) == 0) {
                    print "<p>Cesta vacía</p>";
                } else {
                    // Si no está vacía, mostrar su contenido
                    $total = 0;
                    echo "<table>";
                    echo "<tr><th class = 'celda'>Producto</th><th>Cantidad</th><th>Precio</th></tr>";
                    foreach ($_SESSION['cesta'] as $codigo => $producto){
                        // mostrar aqui la cantidad y el precio
                        echo "<tr><td class = 'celda'><p>$codigo</p></td>";
                        echo "<td>".$producto['cantidad']."</td>";
                        echo "<td>".$producto['cantidad']*$producto['precio']." €<td>";
                        echo"<td><a style='text-decoration:none' href='productos.php?borrar=true&cod=$codigo'>&nbsp&nbspX</td></tr>";
                        $total += $producto['cantidad']*$producto['precio'];
                    }
                    $cesta_vacia = false;
                    echo "<tr><th><hr>Importe total</th><th><hr>&nbsp</th><th><hr>".$total." €</th></tr>";
                    echo "</table>";
                }
            }
            ?>
            
            <form id='vaciar' action='productos.php' method='post'>
                <input type='submit' name='vaciar' value='Vaciar Cesta' <?php if ($cesta_vacia) print "disabled='true'"; ?> />
            </form>
            <form id='comprar' action='cesta.php' method='post'>
                <input type='submit' name='comprar' value='Comprar' <?php if ($cesta_vacia) print "disabled='true'"; ?> />
            </form>
        </div>

        <div id="productos"> 
            <?php
                $db = conecta();
                if ($db != null) {
                    $sql = "SELECT cod,nombre_corto,PVP FROM producto";
                    $resultado = $db->query($sql);
                    if ($resultado) {
                        echo "<table>";
                        // Creamos un formulario por cada producto obtenido
                        $row = $resultado->fetch();
                        while ($row != null) {
                            // ${row['cod']} --> '".$row['cod']."'
                            echo "<p><form id='${row['cod']}' action='productos.php' method='post'>";
                            // Metemos ocultos los datos de los productos
                            echo "<input type='hidden' name='producto' value='" . $row['cod'] . "'/>";
                            echo "<input type='hidden' name='nombre' value='" . $row['nombre_corto'] . "'/>";
                            echo "<input type='hidden' name='precio' value='" . $row['PVP'] . "'/>";
                            echo "<tr><td><input type='submit' name='add' value='Añadir'/></td>";
                            echo "<td>${row['nombre_corto']}</td>";
                            echo "<td>".$row['PVP']." euros</td></tr>";
                            echo "</form>";
                            echo "</p>";
                            $row = $resultado->fetch();
                        }
                        echo "</table>";
                    }
                }
            ?>

        </div>
        <br class="divisor" />
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario 
                           <?php echo $_SESSION['usuario']; ?>' />
            </form>
            <?php
            if (isset($error)) {
                print "<p class='error'>Error $error: $mensaje</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>