<?php

namespace Irene\TiendaOnlineMvc\views;

use Irene\TiendaOnlineMvc\conf\Configuration;

?>

<html>
	<head>
		<title>Menu Desplegable</title>
		<link rel = "stylesheet" type = "text/css" href = "<?=Configuration::$PATH."css/style.css"?>">
	</head>
	<body>
		<div id="header">
			<nav> 
				<ul class="nav">
					<li><a href=<?=Configuration::$PATH."index.php"?>>Inicio</a></li>
					<li><a href=<?=Configuration::$PATH."index.php?op=inicio"?>>Productos</a>
						<ul>
							<li><a href=<?=Configuration::$PATH."index.php?op=crear&tipo=producto"?>>Crear</a></li>
							<li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=producto"?>>Listar</a></li>
                            <!-- <li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=producto"?>>Stock</a></li> -->
						</ul>
					</li>
					<li><a href=<?=Configuration::$PATH."index.php?op=inicio"?>>Familias</a>
						<ul>
							<li><a href=<?=Configuration::$PATH."index.php?op=crear&tipo=familia"?>>Crear</a></li>
							<li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=familia"?>>Listar</a></li>
						</ul>
					</li>
					<li><a href=<?=Configuration::$PATH."index.php?op=inicio"?>>Tiendas</a>
						<ul>
							<li><a href=<?=Configuration::$PATH."index.php?op=crear&tipo=tienda"?>>Crear</a></li>
							<li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=tienda"?>>Listar</a></li>
                            <!-- <li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=tienda"?>>Stock</a></li> -->
						</ul>
					</li> 
					<li><a href=<?=Configuration::$PATH."index.php?op=inicio"?>>Usuarios</a>
						<ul>
							<li><a href=<?=Configuration::$PATH."index.php?op=crear&tipo=usuario"?>>Crear</a></li>
							<li><a href=<?=Configuration::$PATH."index.php?op=listar&tipo=usuario"?>>Listar</a></li>
						</ul>                                       
					</li>
					<li><a href=<?=Configuration::$PATH."index.php?op=inicio"?>>Acerca de</a></li>
					<li><a href=<?=Configuration::$PATH."index.php?sesion=salir"?>>Salir</a></li>

				</ul>
			</nav>
		</div>
	</body>
</html>
<br><br>