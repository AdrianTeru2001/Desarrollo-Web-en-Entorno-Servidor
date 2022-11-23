<!-- Ejercicio 5 - Venta -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
            background-color: rgb(235, 235, 235);
        }
        table, td{
            border-bottom: 2px solid black;
            border-collapse: collapse;
        }
        table{
            margin: auto;
        }
        td{
            height: 50px;
            width: 80px;
            padding: 10px;
        }
        .mod{
            background-color: rgb(241, 175, 74);
            border-radius: 10px;
            padding: 8px;
        }
        .nom{
            background-color: gray;
        }
        .prop{
            background-color: lightgrey;
        }
        .mod:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
    </style>
    <title>Ejercicio 5 - Venta</title>
</head>

<body>
    
    <?php 
    
        session_start();

        //Cogemos toda las variables necesarias
        $codigo = $_GET["carrito"];
        $stock = $_GET["stock"];

        //Ir controlando que cantidad se puede sacar según quede en stock y tengamos en el carrito
        if (array_key_exists($codigo, $_SESSION["carr"])) {
            $stock2 =  $stock-$_SESSION["carr"][$codigo];
        } else {
            $stock2 = $stock;
        }

    ?>

    <!-- Ingresamos la cantidad de artículos que queremos darle salida -->
    <table>
        <tr class="nom"><td><h2>Venta de Artículos</h2></td></tr>
        <form action="Ej5.php" method="get">
            <tr class="prop">
                <td><h3>¿Cuántos artículos vas a vender?</h3>
                <input type="number" name="num" min=0 max=<?= $stock2; ?> required></td>
            </tr>
            <input type='hidden' name='articulo' value='<?php echo $codigo ?>'>
            <input type='hidden' name='stock' value='<?php echo $stock ?>'>
            <input type="hidden" name="carrito" value="1">
            <tr class="prop">
                <td><input type="submit" class='mod' value="Añadir al carrito"></td>
            </tr>
        </form>
        <form action="Ej5.php" method="get">
            <tr class="prop">
                <td><input type="submit" class='mod' value="Volver sin añadir al carrito"></td>
            </tr>
        </form>
        
    </table>

</body>

</html>