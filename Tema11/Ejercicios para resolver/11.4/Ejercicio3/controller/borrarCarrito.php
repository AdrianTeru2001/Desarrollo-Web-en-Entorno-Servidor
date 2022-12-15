<?php
    
    //Borrar Producto del carrito
    require_once "../model/Producto.php";
    $productoAux = new Producto($_GET["id"], null, null, null);
    $productoAux->deleteCarrito();
    header("Location: index.php");