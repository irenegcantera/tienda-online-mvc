<?php

//showStockTiendas();

//     $db = connection(); // abrir   
//     $tiendas = $db -> query("SELECT tienda.nombre,stock.tienda FROM tienda INNER JOIN stock ON tienda.cod = stock.tienda GROUP BY tienda.nombre"); 

//     echo "<br><div style ='display: flex; flex-direction: row; justify-content: space-evenly;'>";
//     foreach($tiendas as $tienda){
//         $registro = $db -> query("SELECT * FROM stock WHERE tienda ='".$tienda[1]."'",PDO::FETCH_OBJ); // en la posición 1 está el código
//         // tabla con el showStock
//         echo "<div><h3>TIENDA ".$tienda[0]."</h3>"; // en la posición cero está el nombre de la tienda
//         echo "<table border><tr>   
//             <th>PRODUCTO</th>
//             <th>UNIDADES</th>
//         </tr>";
//         while($row = $registro -> fetch()){
//             echo "<tr><td>".$row -> producto."</td>";
//             echo "<td>".$row -> unidades."</td></tr>";
//         }
//         echo "</table></div>";
//     }
//     echo "</div>";
//     // cerrar todo
//     disconnection($tiendas,$registro,$row,$db);

?>

<!-- <article>
    <table border>
        <thead>
            <td>Código</td>
            <td>Nombre</td>
            <td>Operaciones</td>
        </thead>
        <?php
        // foreach ($this->data as $con) {
        //     if (strlen($con->codigo) > 0) {
        //         echo "<tr>";
        //         echo "<td>" . $con->codigo . "</td>";
        //         echo "<td>" . $con->nombre . "</td>";
        //         echo "<td><a href='index.php?op=editar&codigo=" . $con->codigo . "'>Editar</a><br>";
        //         echo "<a href='index.php?op=eliminar&codigo=" . $con->codigo . "'>Elminar</a></td>";
        //         echo "</tr>";
        //     }
        // }
        ?>
    </table>
</article> -->