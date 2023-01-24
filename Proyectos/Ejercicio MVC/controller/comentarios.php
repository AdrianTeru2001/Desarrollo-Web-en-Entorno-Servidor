<?php

    require_once "../model/Comentario.php";
    session_start();

    $codEstado = 400;
    $mensaje = "Solicitud incorrecta";

    //Vamos controlando según que queramos hacer
    if (isset($_GET["mostrarCom"])) { //Mostrar Comentarios
        $titulo = $_GET["titulo"];
        $comentarios = Comentario::getComentarios($titulo);
        if (count($comentarios)==0) {
            $codEstado = 0;
            $mensaje = "Esta película no tiene comentarios";
        } else if (count($comentarios)>0) {
            $codEstado = 1;
            $mensaje = "Solicitud Correcta";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        foreach ($comentarios as $com) {
            $devolver['comentarios'][] = ["usuario"=>$com["usuario"], "pelicula"=>$com["pelicula"], "puntuacion"=>$com["puntuacion"], "comentario"=>$com["comentario"]];
        }
        echo json_encode($devolver);
    } else if (isset($_GET["borrarCom"])){ //Borrar Comentarios
        $usuario = $_GET["usuario"];
        $pelicula = $_GET["titulo"];
        Comentario::borrarComentario($usuario, $pelicula);
        header("Location: index.php?pelicula=$pelicula");
    } else if (isset($_GET["anadirCom"])) { //Añadir Comentarios
        $usuario = $_GET["usuario"];
        $pelicula = $_GET["titulo"];
        $puntos = $_GET["puntuacion"];
        $comentario = $_GET["comentario"];
        Comentario::anadirComentario($usuario, $pelicula, $puntos, $comentario);
        header("Location: index.php?pelicula=$pelicula");
    } else if (isset($_GET["editarCom"])) { //Editar Comentarios
        $usuario = $_GET["usuario"];
        $pelicula = $_GET["titulo"];
        $puntos = $_GET["puntuacion"];
        $comentario = $_GET["comentario"];
        Comentario::editarComentario($usuario, $pelicula, $puntos, $comentario);
        header("Location: index.php?pelicula=$pelicula");
    }