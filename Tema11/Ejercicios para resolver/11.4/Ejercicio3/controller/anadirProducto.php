<?php

    require_once "../model/Producto.php";

    //Añadir el producto a la base de datos
    $productoAux = new Producto("", $_POST["nombre"], $_POST["precio"], $_POST["stock"]);
    $productoAux->insert();
    header("Location: ../controller/index.php");