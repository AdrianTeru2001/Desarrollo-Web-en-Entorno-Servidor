<?php

    require_once "../model/Asignatura.php";

    //Añadir la asignatura a la base de datos
    $asignaturaAux = new Asignatura("", $_POST["nombre"]);
    $asignaturaAux->insert();
    header("Location: ../controller/verAsignaturas.php");