<?php

    session_start();

    if (isset($_SESSION["carrito"])) {
        $cod = $_POST["cod"]; //Codido del producto
        $cant = $_POST["cant"]; //Cantidad para añadir al carrito
        $stock = $_POST["stock"]; //Stock total del producto
        $carr = $_SESSION["carrito"];
        echo $cod,"<br>";
        echo $cant,"<br>";
        echo $stock,"<br>";
        if (isset($carr[$cod])) {
            if ($carr[$cod]+$cant<=$stock) {
                $carr[$cod] += $cant;
            }
        } else {
            if ($cant<=$stock) {
                $carr[$cod] = $cant;
            }
        }
        $_SESSION["carrito"] = $carr;
    } else {
        $carr = [];
        $_SESSION["carrito"] = $carr;
        $cod = $_POST["cod"]; //Codido del producto
        $cant = $_POST["cant"]; //Cantidad para añadir al carrito
        $stock = $_POST["stock"]; //Stock total del producto
        $carr = $_SESSION["carrito"];
        echo $cod,"<br>";
        echo $cant,"<br>";
        echo $stock,"<br>";
        if (isset($carr[$cod])) {
            if ($carr[$cod]+$cant<=$stock) {
                $carr[$cod] += $cant;
            }
        } else {
            if ($cant<=$stock) {
                $carr[$cod] = $cant;
            }
        }
        $_SESSION["carrito"] = $carr;
    }

    header("Location: ../controller/index.php");