<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table{
            text-align: center;
        }
        tr, td, th{
            border: 1px solid black;
        }
    </style>
    <title>Ejecicio 3 - Descripcióon</title>
</head>

<body>
    
    <?php 

        session_start();
        if (isset($_GET["descP"])) {
            //Ponemos el nombre del producto, una imagen con el precio del productoy una descipción del mismo, todo en una tabla
            $num = $_GET["descP"];
            echo "<table style='width: 400px; height: 250px;'> <tr>";
            echo "<td><h1>",$_SESSION["productos"][$num][0],"</h1></td>";
            echo "</tr><tr>";
            echo "<td><img src=",$_SESSION["productos"][$num][2]," alt='Cascos Logitech G435' width='200px' height='150px'><br><h3>",$_SESSION["productos"][$num][1],"€</h3></td>";
            echo "</tr><tr>";
            echo "<td><h3>",$_SESSION["productos"][$num][3],"</h3></td>";
            echo "</tr></table>";
        } else {
            echo "No hay seleccionado ningún producto";
        }
    ?>
    
    <br>
    <!-- Botón para volver a la página principal -->
    <form action="Ej3.php" method="get">
        <input type="hidden" name="play" value="false">
        <input type="hidden" name="camiseta" value="false">
        <input type="hidden" name="cascos" value="false">
        <input type="hidden" name="echo" value="false">
        <input type="submit" value="Volver a la tienda">
    </form>
    <br>
    <!-- Botón para volver a la cesta -->
    <form action="Ej3Cesta.php" method="get">
        <input type="submit" value="Volver a la cesta">
    </form>

</body>

</html>