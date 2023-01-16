<?php

    session_start();

    if (!isset($_SESSION["inicio"])) {
        header("Location: ../view/formInicioSesion.php");
    }

    $paginaIndex = true;

    //Carga la vista del formulario principal
    include "../view/formPrincipal.php";