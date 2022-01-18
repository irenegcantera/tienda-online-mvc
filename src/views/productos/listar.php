<article>
    <table border>
        <thead>
            <td>Código</td>
            <td>Nombre</td>
            <th>DESCRIPCIÓN</th>
            <th>FOTO</th>
            <th>PVP</th>
            <th>FAMILIA</th> 
            <td>Operaciones</td>
        </thead>
        <?php

        // var_dump($this->data);

        foreach($this->data as $con){
            if (strlen($con->codigo) > 0) {
                $array = [$con->codigo,$con->nombre_corto,$con -> descripcion,$con -> foto,$con -> PVP,$con -> familia];
                // echo http_build_query(array('producto'=>$array));
                // var_dump($array);
                echo "<tr><td>".$con->codigo."</td>";
                echo "<td>".$con->nombre_corto."</td>";
                echo "<td>".$con -> descripcion."</td>";
                echo "<td><img src='".$con -> foto."' style = 'width:150; height='150'></td>";
                echo "<td>".$con -> PVP."</td>";
                echo "<td>".$con -> familia."</td>";
                echo "<td><a href = 'index.php?op=editar&tipo=producto&producto=".$array."'>Editar</a>
                    <br><a href='index.php?op=eliminar&tipo=producto&cod=".$con->codigo."'>Eliminar</a></td></tr>";
            }
        }
        ?>
    </table>
</article>
