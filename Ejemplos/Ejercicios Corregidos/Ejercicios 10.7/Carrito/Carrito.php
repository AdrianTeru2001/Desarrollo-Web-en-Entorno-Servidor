<?php
session_start();
require_once 'Producto.php';
require_once 'TiendaDB.php';
// Obtiene todos los articulos. Esto se podría hacer en un método estático de la clase producto y devolver el array con todos los objetos productos de la tabla
$conexion=TiendaDB::connectDB();
$seleccion = "SELECT codigo, nombre, precio, imagen, stock FROM productos ORDER BY nombre";
$consulta = $conexion->query($seleccion);
$_SESSION['catalogo'] = [];
while ($registro = $consulta->fetchObject()) {
    $_SESSION['catalogo'][$registro->codigo] = serialize(new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->imagen, $registro->stock));
}
//comprueba si hay productos de la cesta almacenados en cookies
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
    $_SESSION['total']     = 0;
    $_SESSION['cantidad']  = 0;
    if (isset($_COOKIE['cantidad'])) {
        $_SESSION['productos']=unserialize($_COOKIE['productos']);
        $_SESSION['total']    = $_COOKIE['total'];
        $_SESSION['cantidad'] = $_COOKIE['cantidad'];
    } else {
        setcookie('cantidad', 0, time() + 24 * 3600);
        setcookie('total', 0, time() + 24 * 3600);
        setcookie('productos', serialize($_SESSION['productos']), time() + 24 * 3600);
    }
}
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
    <div class="contenedor">
<table border = "1">
<tr><th colspan=7><br><form action="nuevoProducto.php" method="post"><input type="submit" value="Nuevo Producto" name="administrar"></form></th>
    <th rowspan="2"><a href="Cesta.php">CESTA: <?=$_SESSION['cantidad']?>Prod</th>
</tr>
<tr>
    <th>Baja</th><th>Añadir Uds</th><th>Codigo</th><th>Producto</th><th>Precio</th><th>Imagen</th><th>Stock</th>
</tr>
<?php
foreach ($_SESSION['catalogo'] as $producto) {
    $producto=unserialize($producto);
    if (isset($_SESSION['productos'][$producto->getCodigo()])) {
        $stockTemp=$producto->getStock()-$_SESSION['productos'][$producto->getCodigo()];
    }else{
        $stockTemp=$producto->getStock();
    }
    
?>
   <tr><td><form action="borraProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Eliminar">
    </form></td>
    <td><form action="añadeProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Añadir">
    </form></td>
    <td><?=$producto->getCodigo()?></td><td><?=$producto->getNombre()?></td><td><?=$producto->getPrecio()?></td><td><img style="width:100px" src="estilo/<?=$producto->getImagen()?>"></td><td><?=$stockTemp?></td>
    <td>
<?php  if ($stockTemp>0) {
?>
        <form action="MeteCarro.php" method="post">
        <input type="hidden" name="prod" value="<?=$producto->getCodigo()?>">
        <input type="submit" value="Comprar">
    </form>
<?php 
}else{
    echo "<h3>SIN STOCK</h3>";
}
 ?>
    </td></tr>
<?php
}
?>
</table>
</div>
  </body>
</html>
