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
    <a href="../controller/nuevoArticulo.php"><div class="boton">Nuevo Articulo</div></a>

    <?php 
    
        foreach ($data["articulos"] as $articulo) {
            ?>
                <div class="articulos">
                    <h2><?= $articulo->getTitulo() ?></h2>
                    <h3><?= $articulo->getFecha() ?></h3>
                    <p><?= $articulo->getContenido() ?></p><br>
                    <a href="../controller/borrarArticulo.php?id=<?= $articulo->getId() ?>"><div class="boton">Borrar</div></a>
                    <a href="../view/formularioModificar.php?id=<?= $articulo->getId() ?>"><div class="boton">Modificar</div></a>
                </div>
            <?php
        }

    ?>

    <h2 class="footer">Realizado por Adrián Teruel Reina</h2>

</body>

</html>