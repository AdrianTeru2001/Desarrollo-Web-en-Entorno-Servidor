<?php

    session_start();

    /* if (!isset($_SESSION["inicio"])) {
        header("Location: ../view/formInicioSesion.php");
    } */

    require_once "../model/Producto.php";

    //Según que datos reciba, haremos una consulta de ciertos productos
    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
        $productos = Producto::getProductosFiltroNombre($nombre);
    }else if (isset($_GET["pMin"]) && isset($_GET["pMax"])) {
        $min = $_GET["pMin"];
        $max = $_GET["pMax"];
        $productos = Producto::getProductosFiltroPrecio($min, $max);
    } else {
        $productos = Producto::getProductos();
    }

    //Le hacemos el json_encode a los productos de la consulta para despues recogerlos en la pagina de peticiones
    echo json_encode($productos);