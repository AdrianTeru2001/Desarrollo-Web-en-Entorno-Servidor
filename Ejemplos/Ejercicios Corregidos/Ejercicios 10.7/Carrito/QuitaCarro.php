<?php
session_start();
require_once 'Producto.php';
if (isset($_GET['quitapro'])) {
    $prod = $_GET['quitapro'];
    if ($_SESSION['productos'][$prod]==1) {
        unset($_SESSION['productos'][$prod]);
    }else{
        $_SESSION['productos'][$prod]--;
    }
    $_SESSION['cantidad']--;
    $precio=unserialize($_SESSION['catalogo'][$prod])->getPrecio();
    $_SESSION['total'] -= $precio;
    setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
    setcookie('total', $_SESSION['total'], time() + 24 * 3600);
    setcookie($prod, $_SESSION['productos'][$prod], time() + 24 * 3600);
}
header('Location:Cesta.php');
