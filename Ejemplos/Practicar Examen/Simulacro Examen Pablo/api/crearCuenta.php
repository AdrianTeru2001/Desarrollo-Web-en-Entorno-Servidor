<?php 

require_once "../Articulos.php";
require_once "../Cuentas.php";

$cod_estado = 200;
$metodo = $_SERVER['REQUEST_METHOD'];
if($metodo == "PUT"){
    parse_str(file_get_contents("php://input"),$parametros);
    if(isset($parametros["nombre"])){
        $persona = new Cuentas($parametros["nombre"]);
        if($persona->insert()){
            $mensaje = "Inserción realizada";
        }
        else{
            $mensaje = "Ya exstía la persona";
        }
    }
    else{
        $cod_estado=404;
        $mensaje = "Parametros mal especificados";
    }
}
else{
$cod_estado = 404;
$mensaje = "Metodo incorrecto";
}


$datos["mensaje"] = $mensaje;
$datos["cod"] = $cod_estado;

echo json_encode($datos);