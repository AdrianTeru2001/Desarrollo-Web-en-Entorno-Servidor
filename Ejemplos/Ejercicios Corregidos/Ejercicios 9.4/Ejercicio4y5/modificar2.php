<?php session_start(); ?>
<?php 

try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root","");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
if (isset($_POST["codigo"]) && isset($_POST["descripcion"]) && isset($_POST["precioC"]) && isset($_POST["precioV"]) && isset($_POST["stock"])) {
    
    $modificar="update productos set codigo=$_POST[codigo], descripcion='$_POST[descripcion]',precio_compra=$_POST[precioC],precio_venta=$_POST[precioV], stock=$_POST[stock] where codigo=$_POST[codigoviejo]";
    $conexion->exec($modificar);
    header('Location: ejercicio2.php');
}else{
    header('Location: ejercicio2.php');
}

?>