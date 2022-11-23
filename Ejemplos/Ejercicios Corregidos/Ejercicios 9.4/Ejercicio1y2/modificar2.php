<?php 

try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root","");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["telefono"]) ) {
    
    $modificar="update cliente set dni='$_POST[dni]', nombre='$_POST[nombre]',direccion='$_POST[direccion]',telefono= $_POST[telefono] where dni='$_POST[dniviejo]'";
    $conexion->exec($modificar);
    header('Location: ejercicio1.php');
}else{
    header('Location: ejercicio1.php');
}

?>