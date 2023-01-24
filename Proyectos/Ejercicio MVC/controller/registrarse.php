<?php

    session_start();

    require_once "../model/Usuario.php";

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $registro = false;

    $registro = Usuario::registrarUsuario($usuario, $contrasena);

    //Según podamos registrarnos o no
    if ($registro) {
        header("Location: ../view/login.php?correcto=0");
    } else if(!$registro) {
        if (isset($_SESSION["inicioS"])) {
            header("Location: index.php");
        } else {
            header("Location: ../view/registro.php?fallo=0");
        }
    }