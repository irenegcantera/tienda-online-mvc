<?php
// // ARCHIVO PHP CON FUNCIONES DE LA APLICACIÓN
// /* Función que mueve la foto subida a una carpeta específica y con el nombre de la clave primaria 
// y la extensión. */
// function moveRenameImg($cod,$foto){
//     $partes = explode(".", $foto['name']);
//     $extension = strtolower(end($partes));
//     if(!file_exists(PATHIMG)){ // comprobar si existe el directorio
//         mkdir(PATHIMG,0777,true);
//     }    
//     $nuevoPath = PATHIMG.$cod.".".$extension;
//     //comprobar si es una imagen 
//     if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
//         if(move_uploaded_file($foto["tmp_name"], $nuevoPath)){
//             return $nuevoPath;
//         }
//     }else{
//         echo "SOLO SE ADMITEN ARCHIVOS JPG Y PNG";
//     }
// }

// /* Función que muestra los datos de la búsqueda de un producto */
// function searchProductos(){
//     $db = connection(); // ABRIR CONEXIÓN
//     $consulta = $db -> query("SELECT * FROM producto WHERE nombre_corto LIKE '%".strtoupper($_REQUEST['nombre'])."%'",PDO::FETCH_OBJ);

//     //tabla con datos
//     echo "<table border><tr>   
//             <th>CÓDIGO</th>
//             <th>NOMBRE</th>
//             <th>NOMBRE CORTO</th>
//             <th>DESCRIPCIÓN</th>
//             <th>FOTO</th>
//             <th>PVP</th>
//             <th>FAMILIA</th> 
//             <th>OPERACIONES</th> 
//         </tr>";
//     while($row = $consulta -> fetch()){
//         echo "<tr><td>".$row -> cod."</td>";
//         echo "<td>".$row -> nombre."</td>";
//         echo "<td>".$row -> nombre_corto."</td>";
//         echo "<td>".$row -> descripcion."</td>";
//         echo "<td>".$row -> foto."</td>";
//         echo "<td>".$row -> PVP."</td>";
//         echo "<td>".$row -> familia."</td>";
//         echo "<td><a href = 'crear.php?editar=true&cod=".$row -> cod."'>Editar</a><br><a href='listar.php?eliminar=true&cod=".$row -> cod."'>Eliminar</a></td></tr>";
//     }
//     echo "</table>";

//     // cerrar la conexión e instancias
//     disconnection($consulta,$row,$db);
// }

// /* Función que muestra los datos de la búsqueda de un producto */
// function searchFamilias(){
//     $db = connection(); // ABRIR CONEXIÓN
//     $consulta = $db -> query("SELECT * FROM familia WHERE nombre LIKE '%".$_REQUEST['nombre']."%'",PDO::FETCH_OBJ);

//     //tabla con datos
//     echo "<table border><tr>   
//             <th>CÓDIGO</th>
//             <th>NOMBRE</th>
//             <th>OPERACIONES</th> 
//         </tr>";
//     while($row = $consulta -> fetch()){
//         echo "<tr><td>".$row -> cod."</td>";
//         echo "<td>".$row -> nombre."</td>";
//         echo "<td><a href = 'crear.php?editar=true&cod=".$row -> cod."'>Editar</a><br><a href='listar.php?eliminar=true&cod=".$row -> cod."'>Eliminar</a></td></tr>";
//     }
//     echo "</table>";

//     // cerrar la conexión e instancias
//     disconnection($consulta,$row,$db);
// }

// /* Función que muestra los datos de la búsqueda de un producto */
// function searchTiendas(){
//     $db = connection(); // ABRIR CONEXIÓN
//     $consulta = $db -> query("SELECT * FROM tienda WHERE nombre LIKE '%".$_REQUEST['nombre']."%'",PDO::FETCH_OBJ);

//     //tabla con datos
//     echo "<table border><tr>   
//             <th>CÓDIGO</th>
//             <th>NOMBRE</th>
//             <th>TELÉFONO</th>
//             <th>OPERACIONES</th> 
//         </tr>";
//     while($row = $consulta -> fetch()){
//         echo "<tr><td>".$row -> cod."</td>";
//         echo "<td>".$row -> nombre."</td>";
//         echo "<td>".$row -> tlf."</td>";
//         echo "<td><a href = 'crear.php?editar=true&cod=".$row -> cod."'>Editar</a><br><a href='listar.php?eliminar=true&cod=".$row -> cod."'>Eliminar</a></td></tr>";
//     }
//     echo "</table>";

//     // cerrar la conexión e instancias
//     disconnection($consulta,$row,$db);
// }

// function searchUsuarios(){
//     $db = connection(); // ABRIR 
//     $sql = $db -> query("SELECT * FROM usuario WHERE nombre LIKE '%".$_REQUEST['nombre']."%'",PDO::FETCH_OBJ);
//     //tabla con datos
//     echo "<table border><tr>   
//             <th>USUARIO</th>
//             <th>CONTRASEÑA</th>
//             <th>EMAIL</th>
//             <th>ROL</th>
//             <th>ESTADO</th>
//             <th>TOKEN</th>
//             <th>OPERACIONES</th> 
//         </tr>";
//     while($row = $sql -> fetch()){
//         echo "<tr><td>".$row -> nombre."</td>";
//         echo "<td>".$row -> password."</td>";
//         echo "<td>".$row -> email."</td>";
//         echo "<td>".$row -> tipo."</td>";
//         echo "<td>".$row -> status."</td>";
//         echo "<td>".$row -> token."</td>";
//         echo "<td><a href = 'crear.php?editar=true&usuario=".$row -> nombre."'>Editar</a><br><a href='listar.php?eliminar=true&usuario=".$row -> nombre."'>Eliminar</a></td></tr>";
//     }
//     echo "</table>";

//     // cerrar la conexión e instancias
//     disconnection($sql,$row,$db);
// }

// /* Función que obtiene el directorio en el que se ejecuta crear.php */
// function obtainDirectory(){
//     $dirArray = explode("/", $_SERVER['PHP_SELF']);
//     foreach($dirArray as $dir){
//         if($dir == "productos"){
//             return "productos";
//         }else if($dir == "familias"){
//             return "familias";
//         }else if($dir == "tiendas"){
//             return "tiendas";
//         }else if($dir == "usuarios"){
//             return "usuarios";
//         }
//     }
// }
?>