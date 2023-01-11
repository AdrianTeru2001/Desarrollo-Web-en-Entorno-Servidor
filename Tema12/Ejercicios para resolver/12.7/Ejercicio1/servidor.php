<?php

    //Vemos si hemos mandado los datos
    if (isset($_GET["cant"]) && empty($_GET["cant"])==false) {
        $cantidad = $_GET["cant"];
        $moneda = $_GET["moneda"];
        if ($cantidad > 0) {
            //Damos valor al código, ponemos el mensaje y hacemos el paso de una moneda a otra
            $codigo = 0;
            $mensaje = "Correcto";
            if ($moneda == "euros") {
                $resultado = $cantidad * 166.386;
                $paso = "pesetas";
            }
            if ($moneda == "pesetas") {
                $resultado = $cantidad / 166.386;
                $paso = "euros";
            }
        } else {
            $codigo = 2;
            $mensaje = "La cantidad debe ser positiva";
            $resultado = 0;
            $paso = "";
        }
    } else {
        $codigo = 1;
        $mensaje = "No se han recibido todos los datos para la conversión";
        $resultado = 0;
        $paso = "";
    }
    //Codificamos el resultado a json para que el cliente pueda recogerlo
    echo json_encode(["codigo" => $codigo, "mensaje" => $mensaje, "resultado" => $resultado, "moneda" => $paso]);