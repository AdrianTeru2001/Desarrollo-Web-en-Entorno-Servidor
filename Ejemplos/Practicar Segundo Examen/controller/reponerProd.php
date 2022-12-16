<?php

    require_once "../model/Producto.php";

    //Reponemos Producto
    $productoAux = new Producto("", "", "", "");
    $productoAux->reponer($_POST["stock"], $_POST["cant"], $_POST["cod"]);
    header("Location: ../controller/index.php");