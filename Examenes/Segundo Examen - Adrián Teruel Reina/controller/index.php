<?php
    require_once "../model/Usuario.php";
    /* session_start(); */

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: ../view/inicioSesion.php");
    }

    //Obtiene todos los alumnos
    $usuario = $_SESSION["inicioS"];
    $medicos["medicos"] = Usuario::getMedicos();
    $idPaciente = Usuario::idPaciente($usuario);

    //Carga la vista del listado de alumnos
    include "../view/listadoMedicos.php";