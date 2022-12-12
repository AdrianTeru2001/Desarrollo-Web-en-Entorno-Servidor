<!-- Formulario Articulo -->
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

    <div class="formulario">
        <h1 class="formularioH1">Nuevo Articulo</h1>
        <form action="../controller/crearArticulo.php" method="post">
            <h3>Título</h3>
            <input type="text" size="50" name="titulo">
            <h3>Fecha</h3>
            <input type="text" value="<?php echo $fecha; ?>" name="fecha" readonly>
            <h3>Contenido</h3>
            <textarea name="contenido" cols="60" rows="6">
            </textarea><br><br>
            <input type="submit" value="Crear Articulo" class="boton">
        </form>
    </div>

</body>

</html>