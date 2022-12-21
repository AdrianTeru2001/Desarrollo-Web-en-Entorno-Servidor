<!-- Formulario Nuevo Producto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
</head>

<body>

    <h1>Datos del Producto</h1>
    <form action="../controller/anadirProd.php" method="post">
        <h3>Nombre: </h3>
        <input type="text" size="40" name="nombre" required>
        <h3>Precio: </h3>
        <input type="number" step=0.01 name="precio" required>
        <h3>Stock: </h3>
        <input type="number" name="stock" required>
        <br><br><br>
        <input type="submit" value="Añadir Producto">
    </form>

    <br><br>

    <form action="../controller/index.php" method="post">
        <input type="submit" value="Volver al Inicio">
    </form>

</body>

</html>