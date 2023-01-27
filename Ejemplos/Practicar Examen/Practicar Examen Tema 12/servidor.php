<?php

    header("Content-Type: application/json;charset=utf-8");
    require_once "Articulos.php";
    require_once "Cuentas.php";

    $metodo = $_SERVER["REQUEST_METHOD"];

    if ($metodo == "GET") {
        if (isset($_GET["normal"])) {
            $codEstado = 400;
            $mensaje = "Solicitud Incorrecta";
            $titulo = $_GET["titulo"];
            $likes = $_GET["likes"];
            $articulos = Articulos::getArticulosNormalByTituloylikes($titulo, $likes);
            if (count($articulos)==0) {
                $codEstado = 0;
                $mensaje = "No existen artículos con esa cadena ni esos likes";
            } else if (count($articulos)>0) {
                $codEstado = 200;
                $mensaje = "DATOS FILTRADOS CORRECTAMENTE";
                foreach ($articulos as $art) {
                    $devolver['articulos'][] = ["titulo"=>$art->getTitulo(), "fecha"=>$art->getFecha(), "contenido"=>$art->getContenido(), "likes"=>$art->getLikes()];
                }
            }
            $devolver['mensaje'] = $mensaje;
            $devolver['codEstado'] = $codEstado;
            echo json_encode($devolver);
        } else if (isset($_GET["premium"])) {
            $codEstado = 400;
            $mensaje = "Solicitud Incorrecta";
            $token = $_GET["token"];
            $texto = $_GET["texto"];
            $articulos = Articulos::getArticulosPremiumByTokenytexto($token, $texto);
            if ($articulos=="noExiste") {
                $codEstado = 402;
                $mensaje = "No existe la cuenta introducida";
            } else if ($articulos=="sinPermiso") {
                $codEstado = 403;
                $mensaje = "Sin permisos premium";
            } else if (count($articulos)==0) {
                $codEstado = 0;
                $mensaje = "No existen artículos con esa cadena";
            } else if (count($articulos)>0) {
                $codEstado = 200;
                $mensaje = "DATOS FILTRADOS CORRECTAMENTE";
                foreach ($articulos as $art) {
                    $devolver['articulos'][] = ["titulo"=>$art->getTitulo(), "fecha"=>$art->getFecha(), "contenido"=>$art->getContenido(), "likes"=>$art->getLikes()];
                }
            }
            $devolver['mensaje'] = $mensaje;
            $devolver['codEstado'] = $codEstado;
            echo json_encode($devolver);
        }
    } else if ($metodo == "PUT") {
        parse_str(file_get_contents("php://input"),$parametros);
        if (isset($parametros["activar"])) {
            $codEstado = 400;
            $mensaje = "Solicitud Incorrecta";
            $token = $parametros["token"];
            $activar = Cuentas::activarCuenta($token);
            if ($activar=="noExiste") {
                $codEstado = 402;
                $mensaje = "No existe la cuenta introducida";
            } else if ($activar=="yaActiva") {
                $codEstado = 409;
                $mensaje = "EL ESTADO DE LA CUENTA YA ES ACTIVA";
            } else if ($activar=="cuentaActivada") {
                $codEstado = 200;
                $mensaje = "CUENTA ACTIVADA CORRECTAMENTE";
            }
            $devolver['mensaje'] = $mensaje;
            $devolver['codEstado'] = $codEstado;
            echo json_encode($devolver);
        }
    }  else if ($metodo == "POST") { 
        if (isset($_POST["crear"])) {
            $codEstado = 400;
            $mensaje = "Solicitud Incorrecta";
            $nombre = $_POST["nombre"];
            $crear = Cuentas::crearCuenta($nombre);
            if ($crear=="existeCuenta") {
                $codEstado = 401;
                $mensaje = "El nombre introducido corresponde con una cuenta existente";
            } else {
                $devolver['token'] = $crear;
                $codEstado = 200;
                $mensaje = "CUENTA CREADA CORRECTAMENTE";
            }
            $devolver['mensaje'] = $mensaje;
            $devolver['codEstado'] = $codEstado;
            echo json_encode($devolver);
        }
    }
    
    