<?php
session_start();
try {
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "");
} catch (Exception $e) {
    echo ("Imposible acceder a la base de datos");
    die("Error: " . $e->getMessage());
}

if (!isset($_SESSION['enCesta'])) {
    if (isset($_COOKIE['cesta'])) {
        $_SESSION['enCesta']=unserialize($_COOKIE['cesta']);
        $_SESSION['total']    = $_COOKIE['total'];
        $_SESSION['cantidad'] = $_COOKIE['cantidad'];
    }else{
        $_SESSION['enCesta'] = [];
        $_SESSION['total'] = 0;
        $_SESSION['cantidad'] = 0;
    }
}
?>
<table border = "1">
    <tr><th colspan=3><br><form action="productos.php" method="post"><input type="submit" value="Administrar Productos" name="administrar"></form></th><th><a href="Cesta.php">CESTA<br><?=$_SESSION['cantidad']?>Prod</th></tr>
<tr><th>Producto</th><th>Precio</th><th>Imagen</th><th></th></tr>
<?php 
$consulta = $conexion->query("SELECT * FROM productos");
while ($prod = $consulta->fetchObject()) {
?>
    <tr><td><?=$prod->nombre?></td><td><?=$prod->precio?></td><td><a href="Detalle.php?prod=<?=$prod->nombre?>"><img style="width:100px" src="<?=$prod->nombre?>.png"/></td><td>
    
    <form action="MeteCarro.php" method="post">
        <input type="hidden" name="prod" value="<?=$prod->nombre?>">
        <input type="submit" value="Comprar">
    </form>
    <?php
echo '</td></tr>';
}
echo '</table>';
?>
