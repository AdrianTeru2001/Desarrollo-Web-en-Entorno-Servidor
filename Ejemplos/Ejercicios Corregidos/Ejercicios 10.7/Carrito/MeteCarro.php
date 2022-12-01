<?php
session_start();
require_once 'Producto.php';
if (isset($_POST['prod'])) {
    $prod = $_POST['prod'];
    $producto=unserialize($_SESSION['catalogo'][$prod]);
    if ($producto->getStock()-$_SESSION['productos'][$prod]>0) {
        if (isset($_SESSION['productos'][$prod])) {
            $_SESSION['productos'][$prod]++;
        }else{
            $_SESSION['productos'][$prod]=1;
        }
        $_SESSION['cantidad']++;
        $precio=$producto->getPrecio();
        $_SESSION['total'] += $precio;
        setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
        setcookie('total', $_SESSION['total'], time() + 24 * 3600);
        setcookie('productos', serialize($_SESSION['productos']), time() + 24 * 3600);
    }
}
header('Location:Carrito.php');
