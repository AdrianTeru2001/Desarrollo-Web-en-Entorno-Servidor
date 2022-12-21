<!-- Inicio de sesion Correcto -->
<?php 
    session_start();

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: inicioSesion.php");
    }

    $usuario = $_SESSION["inicioS"];

    echo "<h3>Bienvenid@ ",$usuario,"</h3>";
?>

<form action="../controller/index.php" metho="post">
    <input type="submit" value="ACEPTAR">
</form>