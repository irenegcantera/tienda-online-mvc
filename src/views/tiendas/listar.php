<?php

use Irene\TiendaOnlineMvc\conf\Configuration;
include_once Configuration::$PATH_INCLUDE_MENU.'views/menu.php';

?>

<br><br>
<article>
    <table border>
        <thead>
            <td>Código</td>
            <td>Nombre</td>
            <td>Teléfono</td>
            <td>Operaciones</td>
        </thead>
        <?php
        // var_dump($this->data);
        foreach ($this->data as $con) {
                
                echo "<tr><td>".$con -> codigo."</td>";
                echo "<td>".$con -> nombre."</td>";
                echo "<td>".$con -> tlf."</td>";
                echo "<td><a href = 'index.php?op=editar&tipo=tienda&cod=".$con -> codigo."'>Editar</a>
                    <br><a href='index.php?op=eliminar&tipo=tienda&cod=".$con -> codigo."'>Eliminar</a></td></tr>";
            
        }
        ?>
    </table>
</article>