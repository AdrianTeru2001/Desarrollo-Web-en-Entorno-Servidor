<?php
    
    //Borrar Alumno
    require_once "../model/Alumno.php";
    $alumnoAux = new Alumno($_GET["mat"], null, null, null);
    $alumnoAux->delete();
    header("Location: index.php");