<?php
//Carrito hecho con sesiones y cookies para guardar la cesta cuando se cierra el navegador
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos']=[
    'raton'=>[6,"Raton de la marca logitech de muy buena calidad"],
    'teclado'=>[11,"Teclado gaming de tacto mecánico muy resistente"],
    'monitor'=>[80,"Monitor de 24 pulgadas 1ms y 75hz con panel LCD"], 
    'joystick'=>[33,"Joystick compatible con ps4 y PC con motor de vibración"]];
    if (isset($_COOKIE['cesta'])) {
        $_SESSION['enCesta']=unserialize($_COOKIE['cesta']);
        $_SESSION['total']    = $_COOKIE['total'];
        $_SESSION['cantidad'] = $_COOKIE['cantidad'];
    }

}
if (!isset($_SESSION['enCesta'])) {
    $_SESSION['enCesta'] = [];
    $_SESSION['total'] = 0;
    $_SESSION['cantidad'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border = "1">
    <tr><th colspan=3><br><h2>La tiendecita</h2></th><th><a href="Cesta.php">CESTA<br><?=$_SESSION['cantidad']?>Prod</th></tr>
<tr><th>Producto</th><th>Precio</th><th>Imagen</th><th></th></tr>
<?php 
  foreach ($_SESSION['productos'] as $prod => $precio) { 
?>
    <tr><td><?=$prod?></td><td><?=$precio[0]?></td><td><a href="Detalle.php?prod=<?=$prod?>"><img style="width:100px" src="<?=$prod?>.png"/></td>
    <td><form action="MeteCarro.php" method="post">
        <input type="hidden" name="prod" value="<?=$prod?>">
        <input type="submit" value="Comprar">
    </form>
    <?php
echo '</td></tr>';
}
echo '</table>';
?>
</body>
</html>
