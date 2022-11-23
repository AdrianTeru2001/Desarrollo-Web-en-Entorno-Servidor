<?php

try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["telefono"])) {

    $consulta = $conexion->query("select * from cliente where dni='$_POST[dni]'");

    if (($consulta->rowCount()) == 0) {
        $insertar = "insert into cliente values('$_POST[dni]','$_POST[nombre]','$_POST[direccion]', $_POST[telefono])";
        $conexion->exec($insertar);
        header('Location: ejercicio1.php');
    }else{
        echo '<script>alert("El usuario y existe");</script>';
        echo '<script>location.href="ejercicio1.php";</script>';
    }
    

} else {
    header('Location: ejercicio1.php');
}

?>