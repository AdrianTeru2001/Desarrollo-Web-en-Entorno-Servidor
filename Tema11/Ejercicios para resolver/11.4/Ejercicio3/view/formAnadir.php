<!-- Formulario Añadir al Carrito -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
    <title>Añadir al Carrito</title>
</head>

<body>
    
    <div class="formulario">
        <h1 class="formularioH1">Añadir al Carrito</h1>
        <form action="../controller/anadirCarrito.php" method="post">
            <h3>¿Qué cantidad de <?= $_GET["nom"] ?> quieres añadir al carrito?</h3>
            <input type="number" min=1 name="cant">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <input type="hidden" name="nom" value="<?= $_GET["nom"] ?>">
            <input type="hidden" name="stock" value="<?= $_GET["stock"] ?>">
            <br><br>
            <input type="submit" value="Añadir al Carrito" class="boton">
        </form>
        
        <form action="../controller/index.php" method="post">
            <input type="submit" value="Volver al Inicio" class="boton">
        </form>
    </div>

</body>

</html>