<?php
session_start();

if (!isset($_SESSION['productos'])) {
    header("Location: index.php");
}

if (isset($_REQUEST['idProducto'])) {
    //eliminamos la imagen del disco en el servidor
    if (file_exists("img/".$_SESSION['productos'][$_REQUEST['idProducto']][2])) {
        unlink("img/".$_SESSION['productos'][$_REQUEST['idProducto']][2]);
    }
    //eliminamos el producto del array de sesión
    unset($_SESSION['productos'][$_REQUEST['idProducto']]);

    //actualizamos el fichero completo volcando el array
    actualizarFichero();
}
if (isset($_REQUEST['nombre'])) {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], "img/" . $_FILES["imagen"]["name"])) {
        $id="ID".count($_SESSION['productos'])+1;
        $_SESSION['productos'][$id] = [$_REQUEST['nombre'],$_REQUEST['precio'],$_FILES['imagen']['name']];
        actualizarFichero();
    }
}
function actualizarFichero(){
    $file = fopen('productos.txt', 'w');
    foreach ($_SESSION['productos'] as $key => $value) {
        fwrite($file, trim($key . "-" . implode("-", $value)).PHP_EOL);
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        input[type="text"] {
            width: 120px;
        }
    </style>
    <title>Gestión de productos</title>
</head>

<body>
    <div class="container">
        <table class="productos">
            <thead>
                <tr>
                    <th colspan="3">LA TIENDECITA</th>
                    <th rowspan="2"><a href="index.php">Volver</a></th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
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
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
                <tr>
                    <form enctype="multipart/form-data" action="" method="POST">
                        <td><input type="text" name="nombre" placeholder="Nombre..."></td>
                        <td><input type="text" name="precio" placeholder="Precio..."></td>
                        <td>
                            <!-- Con max_file_size establecemos el valor máximo en bytes del archivo -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                            <input type="file" name="imagen" accept="image/*">
                        </td>
                        <td>
                            <input type="submit" value="Añadir">
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>