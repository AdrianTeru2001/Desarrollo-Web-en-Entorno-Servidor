<?php
    require_once "../model/Cita.php";
    /* session_start(); */

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: ../view/inicioSesion.php");
    }

    $fechaActual = Date("Y/m/d", strtotime("+ 1 days"));
    $citaHecha = Cita::getCitaById($_GET["idPaciente"], $_GET["id"], $fechaActual);

    if (!$citaHecha) {

    } else {
        header("Location: ../view/mostrarCita.php?paciente=".$_GET['idPaciente']."&medico=".$_GET["id"]."&fecha=".$fechaActual);
    }

    //Carga la vista del listado de alumnos
    include "../view/listaReservas.php";