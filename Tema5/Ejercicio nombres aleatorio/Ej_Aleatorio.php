<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres Aleatorio</title>
</head>

<body>
    
    <?php //Metemos los nombres en un textarea y los pasamos medienate un input submit a la otra página
        echo "<h1>Introduce los nombres que quieras hacer el sorteo</h1>";
        echo "<h3>Los nombres deben estar separados por ','</h3>";
        echo "<form action='comprobar_Nombres.php' id='names' method='get'>";
        echo "<textarea name='names' form='names' cols='80' rows='10'></textarea> <br>";
        echo "<input type='hidden' name='num' value=0>";
        echo "<input type='submit' value='Enviar nombres'>";
        echo "</form>";
    ?>
</body>

</html>