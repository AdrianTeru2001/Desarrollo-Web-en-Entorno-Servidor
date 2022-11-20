<?php
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
    $file = fopen('productos.txt', 'r');
    while (!feof($file)) {
        $line = explode("-", fgets($file));
        if (count($line) > 1) {
            $_SESSION['productos'][$line[0]] = array_slice($line, 1);
        }
    }
    fclose($file);
}
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = isset($_COOKIE['carrito']) ? unserialize(base64_decode($_COOKIE['carrito'])) : [];
}
//si recibimos un id de un producto añadido a la cesta
if (isset($_REQUEST['idProducto'])) {
    $idProducto = $_REQUEST['idProducto'];
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]++;
    } else {
        $_SESSION['carrito'][$idProducto] = 1;
    }
    setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])), strtotime("+30days"));
}

$totalCesta = 0;
foreach ($_SESSION['carrito'] as $cantidad) {
    $totalCesta += $cantidad;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tienda</title>
</head>

<body>
    <div class="container">
        <table class="productos">
            <thead>
                <tr>
                    <th colspan="3">LA TIENDECITA</th>
                    <th><a href="cesta.php">CESTA <br> <?= $totalCesta ?> Prod</a></th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th><a href="gestionProductos.php">Gestionar productos</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['productos'] as $id => $producto) {
                ?>
                    <tr>
                        <td><?= $producto[0] ?></td>
                        <td><?= $producto[1] ?>€</td>
                        <td><a href="detalle.php?id=<?= $id ?>"><img src="img/<?= $producto[2] ?>" alt=""></a></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name='idProducto' value=<?= $id ?>>
                                <input type="submit" value="Añadir Producto">
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>
</body>

</html>