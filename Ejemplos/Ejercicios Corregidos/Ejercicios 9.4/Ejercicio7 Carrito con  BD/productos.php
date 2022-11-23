<?php
session_start();
if (!isset($_SESSION['productos'])) {
    header("location:Carrito.php");
}
?>
  <table border = "1">
  <tr><th>Producto</th><th>Precio</th><th>Imagen</th><th></th></tr>
<?php
foreach ($_SESSION['productos'] as $prod => $producto) {
    echo '<tr><td>' . $prod . '</td><td>' . $producto[0] . '</td><td><img style="width:100px" src="img/' . $producto[2] . '"/></td><td>';
    ?>
    <form action="borraProducto.php" method="post">
        <input type="hidden" name="prod" value="<?=$prod?>">
        <input type="submit" value="Borrar">
    </form>
    <?php
echo '</td></tr>';
}
?>
<tr><th colspan=4>
    <form action="nuevoProducto.php" method="post">
        <input type="submit" value="Añadir Nuevo Producto">
    </form>
</th></tr>
</table>

<a href="Carrito.php">Cerrar</a>