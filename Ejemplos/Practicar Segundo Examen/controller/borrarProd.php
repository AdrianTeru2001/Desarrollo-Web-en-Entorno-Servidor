<?php

    require_once "../model/Producto.php";
    session_start();

    //Borrar producto del carrito
    if (isset($_SESSION["carrito"])) {
        $carr = $_SESSION["carrito"];
        if (isset($carr[$_GET["cod"]])) {
            unset($carr[$_GET["cod"]]);
        }
        $_SESSION["carrito"] = $carr;
    }

    //Borrar Producto de la base de datos
    $productoAux = new Producto("", "", "", "");
    $productoAux->borrar($_GET["cod"]);
    header("Location: ../controller/index.php");