<!-- Formulario Añadir al Carrito -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto al Carrito</title>
</head>

<body>

    <h1>¿Que cantidad de <?= $_GET["nom"] ?> quieres añadir al carrito?</h1>
    <form action="../controller/anadirCarrito.php" method="post">
        <h3>Cantidad: </h3>
        <input type="number" name="cant" required>
        <input type="hidden" name="cod" value="<?= $_GET["cod"] ?>">
        <input type="hidden" name="stock" value="<?= $_GET["stock"] ?>">
        <br><br><br>
        <input type="submit" value="Añadir al Carrito">
    </form>

    <br><br>

    <form action="../controller/index.php" method="post">
        <input type="submit" value="Volver al Inicio">
    </form>

</body>

</html>