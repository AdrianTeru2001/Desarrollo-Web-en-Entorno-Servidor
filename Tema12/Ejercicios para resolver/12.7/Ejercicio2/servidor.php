<?php

    //Vemos si hemos mandado la cantidad de cartas
    if (isset($_GET["num"]) && empty($_GET["num"])==false) {
        $num = $_GET["num"];
        if ($num>=1 && $num<=40) {
            //Damos valor al código, ponemos el mensaje y hacemos la eleccion de cartas
            $codigo = 0;
            $mensaje = "Correcto";
            $cartas = [];
            for ($i=0; $i < $num; $i++) { 
                $bandera = false;
                while (!$bandera) { //Controlamos que las cartas no se repitan
                    $numAle = rand(1, 10);
                    switch ($numAle) {
                        case 1:
                            $figura = "As";
                            break;
                        case 8:
                            $figura = "Sota";
                            break;
                        case 9:
                            $figura = "Caballo";
                            break;
                        case 10:
                            $figura = "Rey";
                            break;
                        default:
                            $figura = $numAle;
                            break;
                    }
                    $paloAle = rand(1, 4);
                    switch ($paloAle) {
                        case 1:
                            $palo = "copas";
                            break;
                        case 2:
                            $palo = "oros";
                            break;
                        case 3:
                            $palo = "bastos";
                            break;
                        case 4:
                            $palo = "espadas";
                            break;
                    }
                    $carta = $figura." de ".$palo;
                    if (!in_array($carta, $cartas)) { //Si la carta no ha salido aun, la metemos en el array y terminamos el bucle while
                        $cartas[] = $carta;
                        $bandera = true;
                    }
                }
            }
        } else if ($num<1) {
            $codigo = 2;
            $mensaje = "La cantidad de cartas debe ser positiva";
            $cartas = [];
        } else if ($num>40) {
            $codigo = 2;
            $mensaje = "La cantidad de cartas debe ser menor o igual a 40";
            $cartas = [];
        }
    } else {
        $codigo = 1;
        $mensaje = "No se ha recibido bien la cantidad de cartas para sacar";
        $cartas = [];
    }
    //Codificamos el resultado a json para que el cliente pueda recogerlo
    echo json_encode(["codigo" => $codigo, "mensaje" => $mensaje, "cartas" => $cartas]);