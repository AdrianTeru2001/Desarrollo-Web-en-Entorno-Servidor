<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>

<body>

    <?php 
    
        if (isset($_GET["det"])) {
            $det = $_GET["det"];
            $productos = unserialize($_COOKIE["productosS"]);
            echo "<table>";
            echo "<tr><td><br>";
            echo "<img src='",$productos[$det]['img'],"' alt='",$productos[$det]['nom'],"' width='200px' height'150px'><br>";
            echo $productos[$det]['nom'],"<br>";
            echo $productos[$det]['precio'],"<br>";
            echo $productos[$det]['desc'],"<br>";
            echo "</table>";
        }

    ?>
    <br>
    <form action="Ej9.php" method="get">
        <input type="submit" value="Volver a la tienda">
    </form>

</body>

</html>