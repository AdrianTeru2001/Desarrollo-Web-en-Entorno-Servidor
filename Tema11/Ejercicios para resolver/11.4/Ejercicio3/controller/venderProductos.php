<?php

    require_once "../model/Producto.php";

    //Vender los productos del carrito
    $productoAux = new Producto("", "", "", "");
    $productoAux->vender();
    header("Location: ../controller/index.php");