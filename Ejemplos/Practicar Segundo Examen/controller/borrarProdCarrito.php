<?php

    session_start();

    //Borrar producto del carrito
    if (isset($_SESSION["carrito"])) {
        $carr = $_SESSION["carrito"];
        if (isset($carr[$_GET["cod"]])) {
            unset($carr[$_GET["cod"]]);
        }
        $_SESSION["carrito"] = $carr;
    }
    header("Location: ../controller/index.php");