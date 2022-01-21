<?php

use Irene\TiendaOnlineMvc\views;

// use Irene\TiendaOnlineMvc\conf\Configuration;
use Irene\TiendaOnlineMvc\controllers\ProductoCrud;
use Irene\TiendaOnlineMvc\models\Familia;

$editar = false;

if (isset($this -> data)) {
    $editar = true;
    $con = $this -> data;
}

?>

<form name="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">  

<?php

if($editar){
    echo "<h2>PRODUCTO <i>$con -> codigo</i> A EDITAR</h2><br>
            <p>Introduce los datos que se vayan a modificar:</p>";
}else{
    echo "<p>Introduce los siguientes datos:</p>";
}
?>

<fieldset>
    <legend>Código</legend>
    <input name='cod' type= 'text' value='' required>
</fieldset>
<fieldset>
    <legend>Nombre</legend>
    <input name='ncorto' type= 'text' value='<?php if($editar) echo ($con -> nombre_corto)?>' required>
</fieldset>
<fieldset>
    <legend>Descripción</legend>
    <textarea name='desc' rows='15' cols='100' value='<?php if($editar) echo ($con -> descripcion)?>'></textarea>
</fieldset>
<fieldset>
    <legend>Foto</legend>
    <input name='foto' type= 'file' value='<?php if($editar) echo ($con -> foto)?>'>
</fieldset>
<fieldset>
    <legend>PVP</legend>
    <input name='pvp' type= 'text' value='<?php if($editar) echo ($con -> pvp)?>' required>
</fieldset>
<fieldset>
    <legend>Familia</legend>
    <select name='familia'>
    <?php
    if($editar){
        $familias = Familia::getFamilias();
        foreach ($familias as $familia){
            echo "<option value=".$familia->codigo." ".($familia->codigo== $con->familia?'selected':'').">".$familia->nombre."</option>";
        
        }
    }else{
        $familias = Familia::getFamilias();
        foreach ($familias as $familia){
            echo "<option value=".$familia->codigo." ".($familia->codigo== 'SAI'?'selected':'').">".$familia->nombre."</option>";
        
        }
    }
    ?>
    </select>
</fieldset>

<?php
if($editar){
    echo "<input name='codigo' type= 'hidden' value='".$con -> codigo."'>";
}
?>

<br>
<input type="submit" name='op' value="<?php echo ($editar ? 'actualizar' : 'guardar') ?>" /> 
</form>
