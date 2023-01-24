<?php

    session_start();

    require_once "../model/Usuario.php";

    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);
    $inicio = false;

    $inicio = Usuario::comprobarInicioSesion($usuario, $contrasena);

    //Según se pueda iniciar sesion o no
    if ($inicio) {
        $_SESSION["inicioS"] = ["usuario"=>$usuario, "contrasena"=>$contrasena];
        header("Location: index.php");
    } else if(!$inicio) {
        if (isset($_SESSION["inicioS"])) {
            header("Location: index.php");
        } else {
            header("Location: ../view/login.php?fallo=0");
        }
        
    }