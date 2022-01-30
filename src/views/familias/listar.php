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
            <td>Operaciones</td>
        </thead>
        <?php
        foreach ($this->data as $con) {
                echo "<tr>";
                echo "<td>" . $con->codigo . "</td>";
                echo "<td>" . $con->nombre . "</td>";
                echo "<td><a href='index.php?op=editar&tipo=familia&cod=" . $con->codigo . "'>Editar</a><br>";
                echo "<a href='index.php?op=eliminar&tipo=familia&cod=" . $con->codigo . "'>Elminar</a></td>";
                echo "</tr>";
        }
        ?>
    </table>
</article>


