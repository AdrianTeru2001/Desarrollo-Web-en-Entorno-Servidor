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

<h1>Stock actual <?= $_REQUEST['stock'] ?></h1>
<form action="salida.php" method="post">
    <input type="hidden" name="codigo" value="<?=$_POST["codigo"] ?>">
    <input type="hidden" name="stock" value="<?=$_POST["stock"] ?>">
    Salida: <input type="number" name="cantidad" max=<?=$_REQUEST['stock']?>>
    <input type="submit" name="restar" value="restar" style="width:50px">
</form>
<form action="ejercicio2.php" method="post">
    <input type="submit" value="cancelar" style="width:70px">
</form>

<?php 

    if (isset($_POST["codigo"]) && isset($_POST["restar"])) {

        $aux=$_POST["stock"]-$_POST["cantidad"];
        $restar = "update productos set stock=".$aux." where codigo=$_POST[codigo]";
        $conexion->exec($restar);
        header('Location: ejercicio2.php');

    } 
}else{
    header('Location: ejercicio2.php');
}
?>