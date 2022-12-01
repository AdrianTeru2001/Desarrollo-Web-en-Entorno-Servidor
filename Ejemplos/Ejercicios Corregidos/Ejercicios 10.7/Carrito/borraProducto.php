<?php 
require_once 'Producto.php';
Producto::borrar($_POST['prod']);
header("Location: Carrito.php");
?>