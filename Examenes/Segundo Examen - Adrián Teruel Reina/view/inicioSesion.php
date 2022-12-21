<!-- Inicio Sesion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
</head>

<body>

    <h2>RESERVA DE CITAS MÉDICAS</h2>
    <form action="../controller/comprobarSesion.php" method="post">
        USUARIO: <input type="text" name="usuario" required><br>
        CONTRASEÑA: <input type="password" name="contrasena" required><br>
        <input type="submit" value="ACEPTAR">
    </form>

</body>

</html>