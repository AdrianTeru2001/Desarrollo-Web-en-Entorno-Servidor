<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>

    <?php 
    
        session_start();

        if (isset($_SESSION["inicio"])) {
            header("Location: ../controller/index.php");
        }

    ?>

    <h1>Registro de Usuario</h1>

    <?php 
    
        /* Si saliese algun fallo al registrarnos, saldría aqui */
        if (isset($_GET["fallo"])) {
            echo "<h4>El usuario '".$_GET['fallo']."' ya existe</h4>";
        }

    ?>

    <form action="../controller/registro.php" method="get">
        Usuario: <input type="text" name="usuarioR"><br>
        <input type="submit" value="Registrarse">
    </form>

</body>

</html>