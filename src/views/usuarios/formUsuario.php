<br><br><br>
<form name="formulario" action="crear.php" method="POST" enctype="multipart/form-data">  

<?php
if(obtainDirectory() == "usuarios"){
    if(!empty($_REQUEST['editar'])){ 
        if($_REQUEST['editar'] == true){
            $db = connection(); // abrir conexión
            if($db != null){
                $consulta = $db -> query("SELECT * FROM tienda WHERE cod = '".$_REQUEST['usuario']."'", PDO::FETCH_OBJ);  
                while($row = $consulta -> fetch()){
                    $nombre = $row -> nombre;
                    $pass = $row -> password;
                    $email = $row -> email;
                    $rol = $row -> tipo;
                    $status = $row -> status;
                    $token = $row -> token;
                }
            }
            
            echo "<h2>USUARIO <i>'".$nombre."'</i> A EDITAR</h2><br>
                <p>Introduce los datos que se vayan a modificar:</p>     
                <fieldset>
                    <legend>Usuario</legend>
                    Escríbelo en minúsculas<br>
                    <input name='usuario' type= 'text' value='".$nombre."' required>
                </fieldset>
                <fieldset>
                    <legend>Contraseña</legend>
                    <input name='password' type= 'password' value='".$password."' required>
                </fieldset>
                <fieldset>
                    <legend>Repite contraseña</legend>
                    <input name='repassword' type= 'password' value='".$password."' required>
                </fieldset>
                <fieldset>
                    <legend>Correo electrónico</legend>
                    <input name='email' type= 'email' value='".$email."' required>
                </fieldset>
                <fieldset>
                    <legend>Rol</legend>
                    <select name = 'rol'>
                        <option value='Usuario' selected>Usuario</option>
                        <option value='Administrador'>Administrador</option>
                    </select>
                </fieldset>
                <input name='usuario' type= 'hidden' value='".$_REQUEST['nombre']."'>
                <br><input name='guardar' type='submit' value='Guardar cambios'>
                <br><br><a href = 'listar.php'>Volver a Listar</a>";

            // cerrar conexión e instancias
            disconnection($consulta,$row,$db);
        }
    }else{
        if(!empty($error)){
            echo "<div style = 'color:red'>".$error."</div>";
        }else{
            echo "<div style = 'background-color:yellow'>".$mensaje."</div>";
        }
        
        echo "<p>Introduce los siguientes datos:</p>
            <fieldset>
                <legend>Usuario</legend>
                Escríbelo en minúsculas<br>
                <input name='usuario' type= 'text' value='' required>
            </fieldset>
            <fieldset>
                <legend>Contraseña</legend>
                <input name='password' type= 'password' value='' required>
            </fieldset>
            <fieldset>
                <legend>Repite contraseña</legend>
                <input name='repassword' type= 'password' value='' required>
            </fieldset>
            <fieldset>
                <legend>Correo electrónico</legend>
                <input name='email' type= 'email' value='' required>
            </fieldset>
            <fieldset>
                <legend>Rol</legend>
                <select name = 'rol'>
                    <option value='Usuario' selected>Usuario</option>
                    <option value='Administrador'>Administrador</option>
                </select>
            </fieldset>
            <br><input name='submit' type='submit' value='Crear contacto'>
            <br><br><a href = 'listar.php'>Volver a Listar</a>";
    }
}
?>