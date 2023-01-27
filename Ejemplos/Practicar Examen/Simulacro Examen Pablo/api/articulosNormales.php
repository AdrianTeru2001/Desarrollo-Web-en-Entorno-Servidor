<?php 

require_once "../Articulos.php";

$cod_estado = 200;
$metodo = $_SERVER['REQUEST_METHOD'];
if($metodo == "GET"){
    if(isset($_GET["titulo"]) && isset($_GET["likes"])){
        $titulo = $_GET["titulo"];
        $likes = $_GET["likes"];
        $query = "";
        $listado = Articulos::obtenerArticulos($titulo, $likes);
        if($listado){
            foreach ($listado as $item) {
                $info[] = ["titulo" => $item->getTitulo(), "fecha" => $item->getFecha(), "contenido" => $item->getContenido(), "likes" => $item->getLikes()];
            }
    
            $mensaje = "Datos extraidos";
        }
        else{
            $info = [];
            $mensaje = "No hay datos con la busqueda indicada";
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