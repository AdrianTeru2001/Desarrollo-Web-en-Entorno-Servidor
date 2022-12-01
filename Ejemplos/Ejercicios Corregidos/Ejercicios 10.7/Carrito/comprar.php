<?php
session_start();
require_once 'Producto.php';
foreach ($_SESSION['productos'] as $prod => $cantidad) {
	$producto=unserialize($_SESSION['catalogo'][$prod]);
	$producto->vender($cantidad);
	  
}
session_destroy();
setcookie("total", NULL, -1);
setcookie("cantidad", NULL, -1);
setcookie("productos", NULL, -1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <link rel="StyleSheet" href="estilo/estilos.css" type="text/css">
      <title>
        Tienda de informatica
      </title>
    </meta>
</head>
<body>
<h1>GRACIAS POR SU COMPRA</h1>
<h2><a href="Carrito.php">Continuar comprando</a></h2>
</body>
</html>