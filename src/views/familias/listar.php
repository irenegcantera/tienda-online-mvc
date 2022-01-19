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
                echo "<td><a href='index.php?op=editar&tipo=familia&codigo=" . $con->codigo . "&nombre=" . $con->nombre . "'>Editar</a><br>";
                echo "<a href='index.php?op=eliminar&tipo=familia&codigo=" . $con->codigo . "'>Elminar</a></td>";
                echo "</tr>";
        }
        ?>
    </table>
</article>


