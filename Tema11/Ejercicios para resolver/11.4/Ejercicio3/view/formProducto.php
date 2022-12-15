<!-- Formulario Producto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
    <title>Nuevo Producto</title>
</head>

<body>
    
    <div class="formulario">
        <h1 class="formularioH1">Nuevo Producto</h1>
        <form action="../controller/anadirProducto.php" method="post">
            <h3>Nombre</h3>
            <input type="text" size="50" name="nombre">
            <h3>Precio</h3>
            <input type="number" step="0.01" min=0 name="precio">
            <h3>Stock</h3>
            <input type="number" min=0 name="stock">
            <br><br>
            <input type="submit" value="Añadir Producto" class="boton">
        </form>

        <form action="../controller/index.php" method="post">
            <input type="submit" value="Volver al Inicio" class="boton">
        </form>
    </div>

</body>

</html>