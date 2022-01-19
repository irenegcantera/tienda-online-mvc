<?php

use Irene\TiendaOnlineMvc\controllers\UsuarioCrud;
use Irene\TiendaOnlineMvc\conf\Configuration;
use Irene\TiendaOnlineMvc\models\Usuario;

$editar = false;

if (isset($this -> data)) {
    $editar = true;
    $nombre = $this -> data ->__get('nombre');
    $password = $this -> data ->__get('password');
    $email = $this -> data ->__get('email');
    $rol = $this -> data ->__get('rol');
    $status = $this -> data ->__get('status');
    $token = $this -> data ->__get('token');
}

?>

<form name="formulario" action="<?php Configuration::$PATH.'views\usuarios\crear.php' ?>" method="POST" enctype="multipart/form-data">  

<?php

if($editar){
    echo "<h2>USUARIO <i>'$nombre'</i> A EDITAR</h2><br>
            <p>Introduce los datos que se vayan a modificar:</p>";
}else{
    echo "<p>Introduce los siguientes datos:</p>";
}
?>
<fieldset>
    <legend>Usuario</legend>
    <input name='usuario' type= 'text'
        <?php if($editar){
                echo "value='$nombre'";
                echo "disabled>";
        }else{
            echo "value='' required>
            <br>(Escríbelo en minúsculas)"; }?>
</fieldset>
<fieldset>
    <legend>Contraseña</legend>
    <input name='password' type= 'password' value=''
        <?php if($editar){
                echo " disabled>";
        }else{
            echo " required>"; 
        }?>
</fieldset>
<fieldset>
    <legend>Repite contraseña</legend>
    <input name='repassword' type= 'password' value='' 
        <?php if($editar){
                echo " disabled>";
        }else{
            echo " required>"; 
        }?>
</fieldset>
<fieldset>
    <legend>Correo electrónico</legend>
    <input name='email' type= 'email' value='' <?php if($editar){
                echo " disabled>";
        }else{
            echo " required>"; 
        }?>
</fieldset>
<fieldset>
    <legend>Rol del usuario</legend>
    <select name = 'rol'>
        <?php
        
        if($editar){
            echo "<option name='rol' value='Usuario'". ($rol == 'Usuario'?'selected':'').">Usuario</option>";
            echo "<option name='rol' value='Administrador'". ($rol == 'Administrador'?'selected':'').">Administrador</option>";
        }else{
            echo "<option name='rol' value='Usuario'>Usuario</option>";
            echo "<option name='rol' value='Administrador'>Administrador</option>";
        }
        
        ?>
    </select>
</fieldset>
<fieldset>
    <legend>Estado de la cuenta</legend>
    <select name = 'status'>
        <?php
        
        if($editar){
            echo "<option name='status' value='0'". ($status == 0?'selected':'').">Pendiente</option>";
            echo "<option name='status' value='1'". ($status == 1?'selected':'').">Activo</option>";
            echo "<option name='status' value='2'". ($status == 2?'selected':'').">Bloqueado</option>";
            echo "<option name='status' value='3'". ($status == 3?'selected':'').">No existe</option>";         
        }else{
            echo "<option name='status' value='0'>Pendiente</option>";
            echo "<option name='status' value='1'>Activo</option>";
            echo "<option name='status' value='2'>Bloqueado</option>";
            echo "<option name='status' value='3'>No existe</option>";  
        }
        
        ?>
    </select>
</fieldset>

<?php
if($editar){
    echo "<input name='nombre' type= 'hidden' value='".$nombre."'>";
}
?>

<br>
<input type="submit" name='op' value="<?php echo ($editar ? 'actualizar' : 'guardar') ?>" /> 
</form>