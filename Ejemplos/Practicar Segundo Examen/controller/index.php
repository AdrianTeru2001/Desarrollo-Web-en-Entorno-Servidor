<link rel="stylesheet" href="../view/css/estiloscss.css" type="text/css">

<?php
    require_once "../model/Producto.php";

    //Obtiene todos los alumnos
    $productos["productos"] = Producto::getProductos();

    //Carga la vista del listado de alumnos
    include "../view/Tienda.php";