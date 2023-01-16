<?php

    include_once "../model/Cliente.php";

    $usuario = $_GET["usuarioR"];
    $comprobar = Cliente::compUsuario($usuario);

    //Si el usuario introducido es valido, generamos el token, lo registramos en la base de datos y lo mandamos a la pagina de inicio de sesion
    if ($comprobar) {
        $token = Cliente::generarToken();
        Cliente::insertUsuario($usuario, $token);
        header("Location: ../view/formInicioSesion.php");
    } else { //Si no es valido el usuario, lo mandamos a la pagina de registro haciendo que salga el fallo
        header("Location: ../view/formRegistro.php?fallo=$usuario");
    }

    