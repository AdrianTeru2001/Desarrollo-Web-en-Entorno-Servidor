<?php
    require_once "../model/Articulo.php";

    //Obtiene todos los articulos
    $data["articulos"] = Articulo::getArticulos();

    //Carga la vista del blog
    include "../view/blog.php";