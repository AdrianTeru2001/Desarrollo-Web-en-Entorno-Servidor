<?php
    session_start();

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: view/inicioSesion.php");
    } else {
        header("Location: controller/index.php");
    }
    