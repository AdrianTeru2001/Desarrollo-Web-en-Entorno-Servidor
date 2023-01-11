<?php
require_once '../Model/Articulos.php';
$articulo= Articulos::getArticuloById($_GET['codigo']);
$data['destino']="updateArticulo.php";
$data['contenido']=$articulo->getContenido();
$data['fecha']=$articulo->getFecha();
$data['titulo']=$articulo->getTitulo();
$data['codigo']=$_GET['codigo'];
include "../View/formularioArticulo.php";