<?php

    require_once "../model/Producto.php";

    //Reponer producto
    $productoAux = new Producto($_POST["id"], "", "", $_POST["stock"]);
    $productoAux->reponer();
    header("Location: index.php");
