<?php
  session_start(); 
  require_once 'Producto.php';
  if (isset($_POST['unidades'])) {
	$producto = unserialize($_SESSION['catalogo'][$_POST['prod']]);
	try {
	    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
	} catch (Exception $e) {
	    echo ("Imposible acceder a la base de datos");
	    die("Error: " . $e->getMessage());
	}
	$cant=$_POST['unidades']+$producto->getStock();
        $actualiza = "UPDATE productos SET stock=\"".$cant."\" WHERE codigo=\"".$producto->getCodigo()."\"";
        $conexion->exec($actualiza);

    header("Location: Carrito.php");
  }else{
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
<form action="añadeProducto.php" method="post" enctype="multipart/form-data">
	<h3>Unidades: </h3><input type="text" name="unidades">
	<input type="hidden" name="prod" value="<?=$_POST['prod']?>">
	<br><br><input type="submit" name="aceptar" value="Aceptar">
</form>
<h2><a href="Carrito.php">Cancelar</a></h2>
</body>
</html>
<?php 
  }
  