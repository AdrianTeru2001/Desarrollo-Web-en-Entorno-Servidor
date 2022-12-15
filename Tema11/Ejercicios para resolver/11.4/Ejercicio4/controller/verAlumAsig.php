<link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
<?php
    require_once "../model/AlumAsig.php";
    require_once "../model/Asignatura.php";

    //Obtiene todas las asignaturas
    $alumAsig["alumAsig"] = AlumAsig::getAlumAsig();
    $asignaturas["asignaturas"] = Asignatura::getAsignaturas();

    //Obtiene los codigos de las asginaturas y el nombre
    $codigos = AlumAsig::obtenerCod($_GET['mat']);
    $nomAsig = Asignatura::cogerAsig($codigos);

    //Carga la vista del listado de las asignaturas
    include "../view/formlistAsigAlum.php";