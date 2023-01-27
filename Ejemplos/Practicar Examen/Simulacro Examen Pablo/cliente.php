<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Consultar productos normales</h1>
    <form action="muestraDatos.php" method="GET">
        <input type="text" name="titulo" placeholder="Introduce titulo">
        <input type="number" name="likes" min="1" placeholder="Introduce likes">
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <h1>Consultar productos premium</h1>
    <form action="muestraDatos.php" method="GET">
        <input type="text" name="token" placeholder="Token">
        <input type="text" name="texto" min="1" placeholder="texto">
        <input type="submit" value="Enviar">
    </form>

    <hr>
    <h1>Crear cuenta premium</h1>
    <form action="muestraDatos.php" method="GET">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="submit" value="Enviar">
    </form>

    <hr>
    <h1>Activar cuenta</h1>
    <form action="muestraDatos.php" method="GET">
        <input type="text" name="token2" placeholder="token">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>