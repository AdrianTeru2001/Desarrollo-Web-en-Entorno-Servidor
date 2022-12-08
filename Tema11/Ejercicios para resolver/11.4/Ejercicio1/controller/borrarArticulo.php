<?php
    require_once "../model/Articulo.php";
    $articuloAux = new Articulo($_GET["id"], null, null, null);
    $articuloAux->delete();
    header("Location: index.php");