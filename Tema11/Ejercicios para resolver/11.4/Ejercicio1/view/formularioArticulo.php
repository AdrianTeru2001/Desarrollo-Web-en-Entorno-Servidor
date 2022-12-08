<!-- Formularop Articulo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Articulo</title>
</head>

<body>

    <?php 
        $fecha = date("d-m-Y");
    ?>

    <form action="../controller/crearArticulo.php" method="post">
        <h3>Título</h3>
        <input type="text" size="50" name="titulo">
        <h3>Fecha</h3>
        <input type="text" value="<?php echo $fecha; ?>" name="fecha" readonly>
        <h3>Contenido</h3>
        <textarea name="contenido" cols="60" rows="6">
        </textarea>
        <hr>
        <input type="submit" value="Crear Articulo">
    </form>

</body>

</html>