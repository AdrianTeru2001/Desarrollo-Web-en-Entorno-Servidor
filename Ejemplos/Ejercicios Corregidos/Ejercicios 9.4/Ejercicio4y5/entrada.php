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

<h1>Stock actual <?= $_REQUEST['stock'] ?> </h1>
<form action="entrada.php" method="post">   
    <input type="hidden" name="codigo" value="<?=$_POST["codigo"] ?>">
    <input type="hidden" name="stock" value="<?=$_POST["stock"] ?>">
    Entrada: <input type="number" name="cantidad">
    <input type="submit" name="añadir" value="añadir" style="width:50px">
</form>
<form action="ejercicio2.php" method="post">
    <input type="submit" value="cancelar" style="width:70px">
</form>

<?php 

    if (isset($_POST["codigo"]) && isset($_POST["añadir"])) {

        $aux=$_POST["stock"]+$_POST["cantidad"];
        $añadir = "update productos set stock=".$aux." where codigo=$_POST[codigo]";
        $conexion->exec($añadir);
        header('Location: ejercicio2.php');

    } 
}else{
    header('Location: ejercicio2.php');
}
?>