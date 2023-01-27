<?php 

require_once "../Cuentas.php";

$cod_estado = 200;
$metodo = $_SERVER['REQUEST_METHOD'];
if($metodo == "POST"){
    if(isset($_POST["token"])){
        if(Cuentas::activarCuenta($_POST["token"])){
            $mensaje = "Activación realizada";
        }
        else{
            $cod_estado = 404;
            $mensaje = "La cuenta ya estaba activa";
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