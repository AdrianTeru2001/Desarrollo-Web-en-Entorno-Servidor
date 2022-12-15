<?php

    require_once "../model/AlumAsig.php";

    //Añadir el alumno y la asignatura a la base de datos
    echo $_POST["mat"],"<br>";
    echo $_POST["asig"],"<br>";
    $alumAsigAux = new AlumAsig($_POST["mat"], $_POST["asig"]);
    $alumAsigAux->insert();
    header("Location: ../controller/verAlumAsig.php?mat=".$_POST["mat"]);