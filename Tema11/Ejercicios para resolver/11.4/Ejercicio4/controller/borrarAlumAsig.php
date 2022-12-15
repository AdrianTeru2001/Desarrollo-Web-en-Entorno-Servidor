<?php

    require_once "../model/AlumAsig.php";

    //Borrar el alumno y la asignatura de la base de datos
    $alumAsigAux = new AlumAsig($_GET["mat"], $_GET["cod"]);
    $alumAsigAux->delete();
    header("Location: verAlumAsig.php?mat=".$_GET["mat"]);