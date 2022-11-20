<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Detalle</title>
    <style>
        #imagen {
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th colspan="3">LA TIENDECITA</th>
                    <th><a href="index.php">Volver</a></th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Cantidad <br> en el carrito</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $_SESSION['productos'][$_REQUEST['id']][0] ?></td>
                    <td><?= $_SESSION['productos'][$_REQUEST['id']][1] ?>€</td>
                    <td><img src="img/<?= $_SESSION['productos'][$_REQUEST['id']][2] ?>" alt="" id="imagen"></td>
                    <td><?= isset($_SESSION['carrito'][$_REQUEST['id']]) ? $_SESSION['carrito'][$_REQUEST['id']] : 0 ?></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>