<?php

    session_start();

    require_once "../model/Cliente.php";

    $usuario = $_GET["usuario"];
    $token = $_GET["token"];

    $comprueba = Cliente::compInicioSesion($usuario, $token);

    //Si el usuario y token introducidos son validos, inicializamos la sesion con dichos valores
    if ($comprueba) {
        $_SESSION["inicio"] = ["usuario"=>$usuario, "token"=>$token];
        header("Location: ../view/formPrincipal.php");
    } else { //Si no son validos los datos introducidos, mandamos a la pagina de inicio de sesion con el fallo como parametro
        $fallo = "Usuario o Token no válidos";
        header("Location: ../view/formInicioSesion.php?fallo=$fallo");
    }