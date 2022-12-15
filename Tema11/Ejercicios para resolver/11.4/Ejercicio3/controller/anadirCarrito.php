<?php
    
    require_once "../model/Producto.php";
    //En este caso al crear el objeto, el stock precio es la cantidad que vamos a meter en el carrito en la base de datos
    $productoAux = new Producto($_POST["id"], $_POST["nom"], $_POST["cant"], $_POST["stock"]);
    $productoAux->anadirCarrito();

    header("Location: index.php");