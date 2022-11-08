<?php
session_start();

if (isset($_REQUEST['vaciar'])) {
    unset($_SESSION['enCesta']);
    unset($_SESSION['cantidad']);
    unset($_SESSION['total']);
    setcookie('cantidad', null, -1);
    setcookie('total', null, -1);
    setcookie('cesta', null, -1);
}
header('Location:Carrito.php');
