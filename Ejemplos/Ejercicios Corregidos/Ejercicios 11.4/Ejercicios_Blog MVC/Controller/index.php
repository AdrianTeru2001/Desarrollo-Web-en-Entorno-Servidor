<?php
require_once '../Model/Articulos.php';
// Obtiene todos los articulos
$data['articulos'] = Articulos::getArticulos();
// Carga la vista de listado
include '../View/listado.php';