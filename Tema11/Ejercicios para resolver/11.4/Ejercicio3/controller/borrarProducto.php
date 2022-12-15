<?php
    
    //Borrar Producto
    require_once "../model/Producto.php";
    $productoAux = new Producto($_GET["id"], null, null, null);
    $productoAux->delete();
    header("Location: index.php");