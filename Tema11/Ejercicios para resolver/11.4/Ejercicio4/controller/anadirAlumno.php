<?php

    require_once "../model/Alumno.php";

    //Añadir el alumno a la base de datos
    $alumnoAux = new Alumno($_POST["matricula"], $_POST["nombre"], $_POST["apellidos"], $_POST["curso"]);
    $alumnoAux->insert();
    header("Location: ../controller/index.php");