<?php

    //Servidor donde se recogen los json
    require_once "Cliente.php";
    require_once "Empleado.php";

    $metodo = $_SERVER["REQUEST_METHOD"];
    $codEstado = 400;
    $mensaje = "Solicitud Incorrecta";

    if ($metodo == "GET") { //Ver a los clientes de un empleado
        $dni = $_GET["dni"];
        $empleado = Empleado::getEmpleadoById($dni);
        if ($empleado != false) {
            $clientes = Cliente::getClientesByEmpleado($dni);
            if (count($clientes)>0) {
                $codEstado = 200;
                $mensaje = "OK";
                foreach ($clientes as $cli) {
                    $devolver['clientes'][] = ["nombre" => $cli->getNombre(), "telefono" => $cli->getTelefono()];
                }
            } else {
                $codEstado = 200;
                $mensaje = "Empleado sin clientes";
            }
        } else {
            $codEstado = 404;
            $mensaje = "DNI del Empleado no encontrado";
        }
        $devolver['mensaje'] = $mensaje;
        $devolver['codEstado'] = $codEstado;
        echo json_encode($devolver);
    } else if ($metodo == "POST") { //Añadir clientes
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $dniGestor = $_POST["dniGestor"];
        $cliente = Cliente::getClienteById($dni);
        if ($cliente == false) {
            $empleado = Empleado::getEmpleadoById($dniGestor);
            if ($empleado != false) {
                $codEstado = 200;
                $mensaje = "Cliente insertado correctamente";
                $cliente1 = new Cliente($dni, $nombre, $direccion, $telefono, $dniGestor);
                $cliente1->insert();
            } else {
                $codEstado = 409;
                $mensaje = "Conflicto. No existe un gestor con el DNI aportado";
            }
        } else {
            $codEstado = 409;
            $mensaje = "YA EXISTE UNA CUENTA CON ESE DNI";
        }
        $devolver['mensaje'] = $mensaje;
        $devolver['codEstado'] = $codEstado;
        echo json_encode($devolver);
    } else if ($metodo == "PUT") { //Actualizar clientes
        parse_str(file_get_contents("php://input"),$parametros);
        $dni = $parametros["dni"];
        $dniGestor = $parametros["dniGestor"];
        $cliente = Cliente::getClienteById($dni);
        if ($cliente != false) {
            $empleado = Empleado::getEmpleadoById($dniGestor);
            if ($empleado != false) {
                $codEstado = 200;
                $mensaje = "Gestor del cliente actualizado correctamente";
                $cliente->setGestor($dniGestor);
                $cliente->update();
            } else {
                $codEstado = 404;
                $mensaje = "El gestor no existe";
            }
        } else {
            $codEstado = 404;
            $mensaje = "El cliente no existe";
        }
        $devolver['mensaje'] = $mensaje;
        $devolver['codEstado'] = $codEstado;
        echo json_encode($devolver);
    } else if ($metodo == "DELETE") { //Eliminar a un empleado
        parse_str(file_get_contents("php://input"),$parametros);
        $dniEmpleado = $parametros["dniEmpleado"];
        $empleado = Empleado::getEmpleadoById($dniEmpleado);
        if ($empleado != false) {
            $tieneClientes = Cliente::existeClienteGestor($dniEmpleado);
            if (!$tieneClientes) {
                $codEstado = 200;
                $mensaje = "Empleado eliminado correctamente";
                $empleado->delete();
            } else {
                $codEstado = 409;
                $mensaje = "Imposible borrar. Empleado con clientes";
            }
        } else {
            $codEstado = 409;
            $mensaje = "El empleado no existe";
        }
        $devolver['mensaje'] = $mensaje;
        $devolver['codEstado'] = $codEstado;
        echo json_encode($devolver);
    } else { //Por si no se envía ningun método
        $devolver['mensaje'] = $mensaje;
        $devolver['codEstado'] = $codEstado;
        echo json_encode($devolver);
    }