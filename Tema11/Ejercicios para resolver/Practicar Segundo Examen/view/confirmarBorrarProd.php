<!-- Formulario Confirmar Borrar Producto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estiloscss.css" type="text/css">
    <title>Borrar Producto</title>
</head>

<body>

    <h1>¿Estás seguro de borrar el producto <?= $_GET["nom"] ?> ?</h1>

    <div class="contenidoBorrar">
        <a href="../controller/borrarProd.php?cod=<?= $_GET["cod"] ?>"><div class="si">SI</div></a>
        <a href="../controller/index.php"><div class="no">NO</div></a>    
    </div>

</body>

</html>