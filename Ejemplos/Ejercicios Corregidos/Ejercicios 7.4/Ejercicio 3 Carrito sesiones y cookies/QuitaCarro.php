<?php
session_start();

if (isset($_GET['quitapro'])) {
    $prod = $_GET['quitapro'];
    $_SESSION['enCesta'][$prod]--;
    if ($_SESSION['enCesta'][$prod]==0) {
        unset($_SESSION['enCesta'][$prod]);
    }
    $_SESSION['cantidad']--;
    $_SESSION['total'] -= $_SESSION['productos'][$prod][0];
    setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
    setcookie('total', $_SESSION['total'], time() + 24 * 3600);
    setcookie('cesta', serialize($_SESSION['enCesta']), time() + 24 * 3600);
}
header('Location:Cesta.php');
