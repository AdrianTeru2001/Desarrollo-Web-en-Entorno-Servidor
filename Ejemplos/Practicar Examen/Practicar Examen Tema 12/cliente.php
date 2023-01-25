<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>

<body>
    
    <h1>Consultas a la API Artículos del Blog</h1>

    <h2>Artículos normales</h2>
    <form action="normal.php" method="get">
        Título: <input type="text" name="titulo">
        Cuántos likes: <input type="number" name="likes" min="1">
        <input type="hidden" name="normal" value="0">
        <input type="submit" value="Consultar">
    </form>
    <hr>

    <h2>Artículos premium</h2>
    <form action="premium.php" method="get">
        Token de la cuenta premiun: <input type="text" name="token">
        Buscar el texto: <input type="text" name="texto">
        <input type="hidden" name="premium" value="0">
        <input type="submit" value="Consultar">
    </form>
    <hr>

    <h2>Crear una cuenta premium</h2>
    <form action="crearCuenta.php" method="get">
        Nombre: <input type="text" name="nombre">
        <input type="hidden" name="crear" value="0">
        <input type="submit" value="Crear">
    </form>
    <hr>

    <h2>Activar una cuenta bloqueada</h2>
    <form action="activarCuenta.php" method="get">
        Token de la cuenta: <input type="text" name="token">
        <input type="hidden" name="activar" value="0">
        <input type="submit" value="Activar">
    </form>
    <hr>

</body>

</html>