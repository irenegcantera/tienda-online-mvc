<?php

use Irene\TiendaOnlineMvc\controllers\FamiliaCrud;
use Irene\TiendaOnlineMvc\conf\Configuration;


include_once Configuration::$PATH_INCLUDE_MENU.'views/menu.php';

$editar = false;

if (isset($this -> data)) {
    $editar = true;
    $codigo = $this -> data ->__get('codigo');
    $nombre = $this -> data ->__get('nombre');
}

?>


<form name="formulario" action="<?php Configuration::$PATH_LOCALHOST.'views\familias\crear.php' ?>" method="POST" enctype="multipart/form-data">
<?php
if($editar){
    echo "<h2>FAMILIA <i>'$codigo'</i> A EDITAR</h2><br>
            <p>Introduce los datos que se vayan a modificar:</p>";
}else{
    echo "<p>Introduce los siguientes datos:</p>";
}
?>  
    <fieldset>
        <legend>Código</legend>
        <input name='codigo' type= 'text' 
            <?php if($editar){
                 echo "value='$codigo'";
                 echo "disabled";
            }else{
                echo "value='' required";
                 }?> >
    </fieldset>
    <fieldset>
        <legend>Nombre</legend>
        <input name='nombre' type= 'text' value='<?php if($editar) echo $nombre?>' required>
    </fieldset>
<?php
if($editar){
    echo "<input name='codigo' type= 'hidden' value='".$codigo."'>";
}

?> 
<br>  
<input type="submit" name='op' value="<?php echo ($editar ? 'actualizar' : 'guardar') ?>" /> 
</form>
