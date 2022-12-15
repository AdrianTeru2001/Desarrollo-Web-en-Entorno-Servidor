<!-- Formulario Reponer -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
    <title>Reponer</title>
</head>

<body>
    
    <div class="formulario">
        <h1 class="formularioH1">Reponer</h1>
        <form action="../controller/reponerProducto.php" method="post">
            <h3>¿Qué cantidad de <?= $_GET["nom"] ?> quieres reponer?</h3>
            <input type="number" min=0 name="stock">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <br><br>
            <input type="submit" value="Reponer" class="boton">
        </form>

        <form action="../controller/index.php" method="post">
            <input type="submit" value="Volver al Inicio" class="boton">
        </form>
    </div>

</body>

</html>