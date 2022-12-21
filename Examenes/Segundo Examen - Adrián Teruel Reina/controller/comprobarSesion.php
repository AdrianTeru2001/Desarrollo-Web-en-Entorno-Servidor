<?php

    require_once "../model/Usuario.php";
    session_start();

    //Recogemos usuario y contraseña
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    
    $comprueba = Usuario::getUsuarioByLogin($usuario, $contrasena);

    if ($comprueba==$usuario) {
        $_SESSION["inicioS"] = $comprueba;
        header("Location: ../view/correctaSesion.php");
    } else {
        header("Location: ../view/errorSesion.php?mensaje=$comprueba");
    }