<?php

    require_once "../model/Articulo.php";

    //Meter el articulo en la base de datos
    $articuloAux = new Articulo("", $_POST["titulo"], $_POST["fecha"], $_POST["contenido"]);
    $articuloAux->insert();
    header("Location: ../controller/index.php");