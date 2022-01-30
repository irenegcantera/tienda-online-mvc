<?php

use Irene\TiendaOnlineMvc\conf\Configuration;
use Irene\TiendaOnlineMvc\controllers\ProductoCrud;
use Irene\TiendaOnlineMvc\models\Familia;

include_once Configuration::$PATH_INCLUDE_MENU.'views/menu.php';

$editar = false;

if (isset($this -> data)) {
    $editar = true;
    $codigo = $this -> data ->__get('codigo');
    $nombre_corto = $this -> data ->__get('nombre_corto');
    $descripcion = $this -> data ->__get('descripcion');
    $pvp = $this -> data ->__get('pvp');
    $familia = $this -> data ->__get('familia');

}

?>

<form name="formulario" action="<?php Configuration::$PATH_LOCALHOST.'views\familias\crear.php' ?>" method="POST" enctype="multipart/form-data">  

<?php

if($editar){
    echo "<h2>PRODUCTO <i>$codigo</i> A EDITAR</h2><br>
            <p>Introduce los datos que se vayan a modificar:</p>
            <fieldset>
                <legend>Código</legend>
                <input name='cod' type= 'text' value='$codigo' disabled>
            </fieldset>";
}else{
    echo "<p>Introduce los siguientes datos:
        </p><fieldset>
            <legend>Código</legend>
            <input name='cod' type= 'text' value='' required>
        </fieldset>";
}
?>

<fieldset>
    <legend>Nombre</legend>
    <input name='nombre_corto' type= 'text' value='<?php if($editar) echo ($nombre_corto)?>' required>
</fieldset>
<fieldset>
    <legend>Descripción</legend>
    <textarea name='descripcion' rows='15' cols='100' value='<?php if($editar) echo ($descripcion)?>'></textarea>
</fieldset>
<fieldset>
    <legend>Foto</legend>
    <input name='foto' type= 'file' value='' disabled>
</fieldset>
<fieldset>
    <legend>PVP</legend>
    <input name='pvp' type= 'text' value='<?php if($editar) echo ($pvp)?>' required>
</fieldset>
<fieldset>
    <legend>Familia</legend>
    <select name='familia'>
    <?php
    if($editar){
        $familias = Familia::getFamilias();
        foreach ($familias as $fam){
            echo "<option value=".$fam->codigo." ".($fam->codigo== $familia?'selected':'').">".$fam->nombre."</option>";
        }
    }else{
        $familias = Familia::getFamilias();
        foreach ($familias as $fam){
            echo "<option value=".$fam->codigo." ".($fam->codigo== 'SAI'?'selected':'').">".$fam->nombre."</option>";
        }
    }
    ?>
    </select>
</fieldset>

<?php
if($editar){
    echo "<input name='codigo' type= 'hidden' value='".$codigo."'>";
}
?>

<br>
<input type="submit" name='op' value="<?php echo ($editar ? 'actualizar' : 'guardar') ?>" /> 
</form>
