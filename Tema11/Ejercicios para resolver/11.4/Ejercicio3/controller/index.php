<link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
<?php
    require_once "../model/Producto.php";

    //Obtiene todos los productos de la tienda y del carrito
    $productos["productos"] = Producto::getProductos();
    $carrito["produCarr"] = Producto::getProductosCarr();

    //Carga la vista del blog
    include "../view/carrito.php";