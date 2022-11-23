<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
if (isset($_POST["dni"])) {
?>

<h1>estas seguro de que quieres borrar el registro </h1>
<form action="borrar.php" method="post">
    <input type="hidden" name="confirmar">
    <input type="hidden" name="dni" value="<?=$_POST["dni"] ?>">
    <input type="submit" value="si" style="width:50px">
</form>
<form action="ejercicio1.php" method="post">
    <input type="submit" value="no" style="width:50px">
</form>

<?php 

    if (isset($_POST["dni"]) && isset($_POST["confirmar"])) {

        $borrar = "delete from cliente where dni='$_POST[dni]'";
        $conexion->exec($borrar);
        header('Location: ejercicio1.php');

    } 
}else{
    header('Location: ejercicio1.php');
}
?>