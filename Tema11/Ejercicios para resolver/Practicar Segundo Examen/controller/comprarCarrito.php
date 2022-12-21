<?php

    require_once "../model/Producto.php";
    session_start();

    //Obtener stock productos
    $stockProd = Producto::getStockProd();

    //Comprar el carrito
    for ($i=0; $i < 2; $i++) { 
        Producto::vender($stockProd);
    }
    

    header("Location: ../controller/index.php");