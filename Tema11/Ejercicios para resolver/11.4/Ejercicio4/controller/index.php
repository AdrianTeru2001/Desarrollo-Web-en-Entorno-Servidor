<link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
<?php
    require_once "../model/Alumno.php";

    //Obtiene todos los alumnos
    $alumnos["alumnos"] = Alumno::getAlumnos();

    //Carga la vista del listado de alumnos
    include "../view/listado.php";