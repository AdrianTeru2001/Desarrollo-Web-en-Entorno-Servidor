<?php session_start(); ?>
<?php

try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "");
}catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (isset($_POST["codigo"]) && isset($_POST["descripcion"]) && isset($_POST["precioC"]) && isset($_POST["precioV"]) && isset($_POST["stock"])) {

    $consulta = $conexion->query("select * from productos where codigo='$_POST[codigo]'");

    if (($consulta->rowCount()) == 0) {
        $insertar = "insert into productos values($_POST[codigo],'$_POST[descripcion]',$_POST[precioC], $_POST[precioV],$_POST[stock])";
        $conexion->exec($insertar);        
    }
}
header('Location: ejercicio2.php');
?>