<?php
use Irene\TiendaOnlineMvc\conf\Configuration;
include_once Configuration::$PATH_INCLUDE_MENU.'views/menu.php';
?>

<br><br>
<article>
    <table border>
        <thead>
            <td>Usuario</td>
            <td>Password</td>
            <th>Email</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Token</th>
            <td>Operaciones</td>
        </thead>
        <?php
        foreach ($this->data as $con) {
            echo "<tr><td>".$con -> nombre."</td>";
            echo "<td>".$con -> password."</td>";
            echo "<td>".$con -> email."</td>";
            echo "<td>".$con -> rol."</td>";
            echo "<td>".$con -> status."</td>";
            echo "<td>".$con -> token."</td>";
            echo "<td><a href = 'index.php?op=editar&tipo=usuario&user=".$con -> nombre."'>Editar</a>
                <br><a href='index.php?op=eliminar&tipo=usuario&user=".$con -> nombre."'>Eliminar</a></td></tr>";
            
        }
        ?>
    </table>
</article>