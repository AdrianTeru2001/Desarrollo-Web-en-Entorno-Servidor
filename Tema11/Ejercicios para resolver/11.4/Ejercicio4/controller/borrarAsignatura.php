<?php
    
    //Borrar Asignatura
    require_once "../model/Asignatura.php";
    $asignaturaAux = new Asignatura($_GET["cod"], "");
    $asignaturaAux->delete();
    header("Location: verAsignaturas.php");