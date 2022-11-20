<?php
session_start();
if (!isset($_SESSION['productos'])) {
    header("Location: index.php");
}
if (isset($_REQUEST['reiniciar'])) {
    $_SESSION['carrito'] = [];
    header("Location: index.php");
}
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = isset($_COOKIE['carrito']) ? unserialize(base64_decode($_COOKIE['carrito'])) : [];
}
if (isset($_REQUEST['eliminarProd'])) {
    $idProd = $_REQUEST['eliminarProd'];
    if ($_SESSION['carrito'][$idProd] > 1) $_SESSION['carrito'][$idProd]--;
    else unset($_SESSION['carrito'][$idProd]);
}
setcookie('carrito', base64_encode(serialize($_SESSION['carrito'])));
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cesta</title>
</head>

<body>
    <div class="container">
        <table class="productos">
            <thead>
                <tr>
                    <th colspan="5">PRODUCTOS EN TU CESTA</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th><a href="index.php">Volver a la tienda</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cantidadTotal = 0;
                $precioTotal = 0;
                foreach ($_SESSION['carrito'] as $id => $cantidad) {
                    $producto = $_SESSION['productos'][$id];
                    $cantidadTotal += $cantidad;
                    $precioTotal += $cantidad * $producto[1];
                ?>
                    <tr>
                        <td><?= $producto[0] ?></td>
                        <td><?= $producto[1] ?> €</td>
                        <td><?= $cantidad ?></td>
                        <td><img src="img/<?= $producto[2] ?>" alt=""></td>
                        <td>
                            <form action="#" method="POST">
                                <input type="hidden" name='eliminarProd' value=<?= $id ?>>
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <th>Totales</th>
                    <th><?= $precioTotal ?> €</th>
                    <th><?= $cantidadTotal ?></th>
                    <th colspan="2">
                        <form action="#" method="POST">
                            <input type="hidden" name="reiniciar">
                            <input type="submit" value="Reiniciar Cesta">
                        </form>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>