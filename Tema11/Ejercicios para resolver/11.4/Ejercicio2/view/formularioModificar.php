<!-- Formulario Modificar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosCss.css" type="text/css">
    <title>Modificar Articulo</title>
</head>

<body>

    <div class="formulario">
        <h1 class="formularioH1">Modificar Articulo</h1>
        <form action="../controller/modificarArticulo.php" method="post">
            <h3>Título</h3>
            <input type="text" size="50" name="titulo">
            <h3>Contenido</h3>
            <textarea name="contenido" cols="60" rows="6">
            </textarea><br><br>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <input type="submit" value="Modificar Artículo" class="boton">
        </form>
    </div>

</body>

</html>