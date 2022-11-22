<!-- Ejercicio 4 - Salida -->
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
    <title>Ejercicio 4 - Salida</title>
</head>

<body>
    
    <?php 
    
        //Cogemos toda las variables necesarias
        $articulo = $_GET["salida"];
        $stock = $_GET["stock"];

        //Mensaje para controlar que no se saquen mas artículos de los que hay
        if (isset($_GET["mayor"])) {
            echo "<h2>No se pueden sacar mas artículos de los que hay</h2>";
        }

    ?>

    <!-- Ingresamos la cantidad de artículos que queremos darle salida -->
    <table>
        <tr class="nom"><td><h2>Salida de Artículos</h2></td></tr>
        <form action="Ej4.php" method="get">
            <tr class="prop">
                <td><h3>¿Cuántos artículos vas a sacar?</h3>
                <input type="number" name="num" required></td>
            </tr>
            <input type='hidden' name='articulo' value='<?php echo $articulo ?>'>
            <input type='hidden' name='stock' value='<?php echo $stock ?>'>
            <input type="hidden" name="salida" value="1">
            <tr class="prop">
                <td><input type="submit" class='mod' value="Sacar Artículos"></td>
            </tr>
        </form>
        <form action="Ej4.php" method="get">
            <tr class="prop">
                <td><input type="submit" class='mod' value="Volver sin sacar"></td>
            </tr>
        </form>
        
    </table>

</body>

</html>