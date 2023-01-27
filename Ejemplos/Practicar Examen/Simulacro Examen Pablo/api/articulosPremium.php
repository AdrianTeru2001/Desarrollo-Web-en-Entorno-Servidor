<?php 

require_once "../Articulos.php";
require_once "../Cuentas.php";

$cod_estado = 200;
$metodo = $_SERVER['REQUEST_METHOD'];
if($metodo == "POST"){
    if(isset($_POST["token"]) && isset($_POST["texto"])){
        //? comprobacion cuenta activada o si existe
        $cuenta = Cuentas::getCuentaByToken($_POST["token"]);
        if($cuenta){
            $estado = $cuenta->getEstado();
            if($estado == "activa"){
                $listado = Articulos::obtenerArticulosPremium($_POST["token"], $_POST["texto"]);
                $cuenta->setConsultas($cuenta->getConsultas()-1);
                $cuenta->update();

                if(count($listado) > 0){
                    foreach ($listado as $item) {
                        $info[] = ["titulo" => $item->getTitulo(), "fecha" => $item->getFecha(), "contenido" => $item->getContenido(), "likes" => $item->getLikes()];
                    }
                    $mensaje = "Datos extraidos";
                }
                else{
                    $cod_estado = 404;
                    $mensaje = "No hay datos";
                }
            }
            else{
                $cod_estado = 404;
                $mensaje = "Cuenta bloqueada";
            }
        }
        else{
            $cod_estado = 404;
            $mensaje = "Cuenta inexistente";
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

if($cod_estado == 200){
    $datos["info"] = $info;
}
$datos["mensaje"] = $mensaje;
$datos["cod"] = $cod_estado;

echo json_encode($datos);