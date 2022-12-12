<?php

    require_once "../model/Articulo.php";

    //Modificar el articulo en la base de datos
    $articuloAux = new Articulo($_POST["id"], $_POST["titulo"], "", $_POST["contenido"]);
    $articuloAux->modify();
    header("Location: ../controller/index.php");