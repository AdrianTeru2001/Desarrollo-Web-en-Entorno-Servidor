<!-- Ejercicio 4 - Modificar -->
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
    <title>Ejercicio 4 - Modificar</title>
</head>

<body>
    
    <!-- Mostramos todas las opciones para modificar lo que queramos del artículo -->
    <table>
        <tr class="nom"><td><h2>Modificar Artículo</h2></td></tr>
            <form action="Ej4.php" method="get">
                <tr class="prop">
                    <td>Código: <input type="text" name="cod" value="<?php echo $_GET["modificar"] ?>" readonly></td>
                </tr>
                <tr class="prop">
                    <td>Descripción: <input type="text" name="desc"></td>
                </tr>
                <tr class="prop">
                    <td>Precio de compra: <input type="text" name="pC"></td>
                </tr>
                <tr class="prop">
                    <td>Precio de venta: <input type="text" name="pV"></td>
                </tr>
                <tr class="prop">
                    <td>Stock: <input type="text" name="stock"></td>
                </tr>
                <input type="hidden" name="modificado" value="1">
                <tr class="prop">
                    <td><input type="submit" class='mod' value="Modificar Artículo"></td>
                </tr>
            </form>
            <form action="Ej4.php" method="get">
                <tr class="prop">
                    <td><input type="submit" class='mod' value="Volver sin modificar"></td>
                </tr>
            </form>
    </table>

</body>

</html>