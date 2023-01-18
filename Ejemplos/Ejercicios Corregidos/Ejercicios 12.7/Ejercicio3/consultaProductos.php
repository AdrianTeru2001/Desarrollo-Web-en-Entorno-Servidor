<?php
require_once 'Producto.php';
require_once 'Cliente.php';
const RUTA="http://localhost/PHP/Tema12WebServices/3/img/";
if (!isset($_GET['user']) || !isset($_GET['token'])) {
  $devolver['mensaje'] = "FALTA TOKEN DE ACCESO";
  $devolver['codEstado'] = 400;
} else {
  if (Cliente::comprueba($_GET['user'], $_GET['token'])) {
    $cliente = Cliente::getClienteById($_GET['user']);
    $cliente->sumaConsulta();
    if (isset($_GET['min']) && isset($_GET['max'])) {
      $productos = Producto::getProductosFiltroPrecio($_GET['min'], $_GET['max']);
    } else {
      $productos = Producto::getProductosFiltroNombre($_GET['nombre']);
    }
    if (count($productos) == 0) {
      $devolver['mensaje'] = "PRODUCTO NO ENCONTRADO";
      $devolver['codEstado'] = 404;
    } else {
      $devolver['mensaje'] = "PETICION CORRECTA";
      $devolver['codEstado'] = 200;
      foreach ($productos as $producto) {
        $devolver['productos'][] = ['nombre' => $producto->getNombre(), 'precio' => $producto->getPrecio(), 'imagen' => RUTA . $producto->getImagen()];
      }
    }
  } else {
    $devolver['mensaje'] = "USUARIO NO AUTORIZADO";
    $devolver['codEstado'] = 401;
  }
}
echo json_encode($devolver);
