<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>

<body>

    <?php 

        session_start();

        if (isset($_SESSION["inicio"])) {
            header("Location: ../controller/index.php");
        }

    ?>

    <h1>Inicie Sesion con su Token</h1>

    <?php 
    
        /* Si saliese algun fallo al iniciar sesion, saldría aqui */
        if (isset($_GET["fallo"])) {
            echo "<h4>".$_GET['fallo']."</h4>";
        }
    
    ?>

    <form action="../controller/compInicioSesion.php" method="get">
        Usuario: <input type="text" name="usuario"><br>
        Token: <input type="text" name="token"><br>
        <input type="submit" value="Iniciar Sesion">
    </form>

    <a href="formRegistro.php">Registro de Usuario</a>

</body>

</html>