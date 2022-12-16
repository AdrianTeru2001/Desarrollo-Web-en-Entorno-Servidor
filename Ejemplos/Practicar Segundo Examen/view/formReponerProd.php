<!-- Formulario Reponer Producto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponer Producto</title>
</head>

<body>

    <h1>¿Cuantos producto <?= $_GET["nom"] ?> quieres reponer?</h1>
    <form action="../controller/reponerProd.php" method="post">
        <h3>Cantidad: </h3>
        <input type="number" name="cant" required>
        <input type="hidden" name="cod" value="<?= $_GET["cod"] ?>">
        <input type="hidden" name="stock" value="<?= $_GET["stock"] ?>">
        <br><br><br>
        <input type="submit" value="Reponer Producto">
    </form>

    <br><br>

    <form action="../controller/index.php" method="post">
        <input type="submit" value="Volver al Inicio">
    </form>

</body>

</html>