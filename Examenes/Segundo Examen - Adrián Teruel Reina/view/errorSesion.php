<!-- Error inicio Sesion -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Inicio Sesion</title>
</head>

<body>

    <?php 
        /* session_start();

        if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
            header("Location: view/inicioSesion.php");
        } else {
            header("Location: controller/index.php");
        } */

        $mensaje = $_GET["mensaje"];
        echo "<h2>",$mensaje,"</h2>";
    ?>

    <form action="inicioSesion.php" metho="post">
        <input type="submit" value="Volver a Iniciar Sesion">
    </form>

</body>

</html>