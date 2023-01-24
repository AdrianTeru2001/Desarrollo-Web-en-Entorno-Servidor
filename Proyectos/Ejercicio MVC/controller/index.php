<?php

    session_start();

    if (!isset($_SESSION["inicioS"]) || $_SESSION["inicioS"]=="") {
        header("Location: ../view/login.php");
    }

    $inicio = true;

    include "../view/principal.php";