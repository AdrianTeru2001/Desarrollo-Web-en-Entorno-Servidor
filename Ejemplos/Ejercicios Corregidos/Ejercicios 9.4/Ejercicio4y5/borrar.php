<?php session_start(); ?>
<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
if (isset($_POST["codigo"])) {
?>

<h1>estas seguro de que quieres borrar el producto </h1>
<form action="borrar.php" method="post">
    <input type="hidden" name="confirmar">
    <input type="hidden" name="codigo" value="<?=$_POST["codigo"] ?>">
    <input type="submit" value="si" style="width:50px">
</form>
<form action="ejercicio2.php" method="post">
    <input type="submit" value="no" style="width:50px">
</form>

<?php 

    if (isset($_POST["codigo"]) && isset($_POST["confirmar"])) {

        $borrar = "delete from productos where codigo='$_POST[codigo]'";
        $conexion->exec($borrar);
        header('Location: ejercicio2.php');

    } 
}else{
    header('Location: ejercicio2.php');
}
?>