<?php

use Irene\TiendaOnlineMvc\controllers\TiendaCrud;
use Irene\TiendaOnlineMvc\conf\Configuration;

$editar = false;

if (isset($this -> data)) {
    $editar = true;
    $codigo = $this -> data ->__get('codigo');
    $nombre = $this -> data ->__get('nombre');
    $tlf = $this -> data ->__get('tlf');
}

?>

<form name="formulario" action="<?php Configuration::$PATH_LOCALHOST.'views\tiendas\crear.php' ?>" method="POST" enctype="multipart/form-data">  

<?php
if($editar){
    echo "<h2>TIENDA <i>'$nombre'</i> A EDITAR</h2><br>
            <p>Introduce los datos que se vayan a modificar:</p>
            <fieldset>
                <legend>Código</legend>
                <input name='codigo' type= 'text' value='$codigo' disabled>
            </fieldset>";
}else{
    echo "<p>Introduce los siguientes datos:</p>";
}
?>

        
<fieldset>
    <legend>Nombre</legend>
    <input name='nombre' type= 'text' value='<?php if($editar) echo $nombre?>' required>
</fieldset>
<fieldset>
    <legend>Teléfono</legend>
    <input name='tlf' type= 'text' value='<?php if($editar) echo $tlf?>'>
</fieldset>

<?php
if($editar){
    echo "<input name='codigo' type= 'hidden' value='".$codigo."'>";
}
?>

<br>  
<input type="submit" name='op' value="<?php echo ($editar ? 'actualizar' : 'guardar') ?>" /> 
</form>