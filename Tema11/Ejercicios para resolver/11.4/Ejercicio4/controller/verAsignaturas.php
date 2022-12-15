<link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
<?php
    require_once "../model/Asignatura.php";

    //Obtiene todas las asignaturas
    $asignaturas["asignaturas"] = Asignatura::getAsignaturas();

    //Carga la vista del listado de las asignaturas
    include "../view/listadoAsignaturas.php";