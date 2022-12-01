<?php 
require_once 'Producto.php';

  // sube la imagen al servidor
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "estilo/" . $_FILES["imagen"]["name"]);

  // inserta la oferta en la base de datos

$producto = new Producto(null, $_POST['nombre'], $_POST['precio'], $_FILES["imagen"]["name"]);
$producto->insertar();
header("Location: Carrito.php");