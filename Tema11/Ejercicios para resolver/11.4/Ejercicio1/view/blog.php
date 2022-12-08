<!-- Blog Ejercicio 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>

    <h1>Blog</h1>
    <a href="../controller/nuevoArticulo.php">Nuevo Articulo</a>

    <hr>

    <?php 
    
        foreach ($data["articulos"] as $articulo) {
            ?>
                <h2><?= $articulo->getTitulo() ?></h2>
                <h3><?= $articulo->getFecha() ?></h3>
                <p><?= $articulo->getContenido() ?></p><br>
                <a href="../controller/borrarArticulo.php?id=<?= $articulo->getId() ?>">Borrar</a>
            <?php
        }

    ?>

    <h2>Realizado por Adrián Teruel Reina</h2>

</body>

</html>