<?php
session_start();


if (isset($_POST['prod'])) {
    $prod = $_POST['prod'];
    if (array_key_exists($prod, $_SESSION['enCesta'])) {
        $_SESSION['enCesta'][$prod]++;
    }else{
        $_SESSION['enCesta'][$prod]=1;   
    }
    
    $_SESSION['cantidad']++;
    $_SESSION['total'] += $_SESSION['productos'][$prod][0];
    setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
    setcookie('total', $_SESSION['total'], time() + 24 * 3600);
    setcookie('cesta', serialize($_SESSION['enCesta']), time() + 24 * 3600);
}
header('Location:Carrito.php');
