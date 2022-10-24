<!-- Ejercicio 8.
Pedir la fecha de nacimiento y el nombre de dos personas y mostrar el nombre de la mayor. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 - Comparar fechas de nacimiento de dos personas</title>
</head>

<body>
    
<?php 
        if (isset($_GET["diaP1"]) && isset($_GET["mesP1"]) && isset($_GET["anoP1"]) && isset($_GET["nombreP1"]) && isset($_GET["diaP2"]) && isset($_GET["mesP2"]) && isset($_GET["anoP2"]) && isset($_GET["nombreP2"])) { //Comprobamos que existan todos los datos necesarios
            //Recogemos todos los valores necesarios
            $diaP1 = $_GET["diaP1"];
            $mesP1 = $_GET["mesP1"];
            $anoP1 = $_GET["anoP1"];
            $nombreP1 = $_GET["nombreP1"];
            $diaP2 = $_GET["diaP2"];
            $mesP2 = $_GET["mesP2"];
            $anoP2 = $_GET["anoP2"];
            $nombreP2 = $_GET["nombreP2"];
            if (checkdate($mesP1, $diaP1, $anoP1) && checkdate($mesP2, $diaP2, $anoP2)) { //Si las fechas son correctas
                $fechaP1 = strtotime("$diaP1-$mesP1-$anoP1 00:00:00"); //Pasamos la fecha de nacimento de persona 1 a entero
                $fechaP2 = strtotime("$diaP2-$mesP2-$anoP2 00:00:00"); //Pasamos la fecha de nacimento de persona 2 a entero
                echo "<h3>Fecha de Nacimiento de ",$nombreP1," -> ",date("d/m/Y", $fechaP1),"</h3>";
                echo "<h3>Fecha de Nacimiento de ",$nombreP2," -> ",date("d/m/Y", $fechaP2),"</h3>";
                //vemos quien es mayor de los dos
                if ($fechaP1<$fechaP2) { //Si persona 1 es mayor que persona 2, decimos quien es mayor
                    echo "<h3>",$nombreP1," es mayor que ",$nombreP2,"</h3>";
                } else if ($fechaP1>$fechaP2) { //Si perona 2 es mayor que persona 1, decimos quien es mayor
                    echo "<h3>",$nombreP2," es mayor que ",$nombreP1,"</h3>";
                } else if ($fechaP1==$fechaP2) { //Si tienen la misma edad, lo decimos
                    echo "<h3>",$nombreP1," y ",$nombreP2," tienen la misma edad</h3>";
                }
            } else { //Si las fechas no son correctas
                echo "<h3>Introduce las fechas correctamente</h3>"; //Decimos que tiene que introducir una fecha correcta
            }
        } else { //Si no se han introducido las fechas
            echo "<h2>Introduce las fechas de nacimiento y los nombres de dos personas para ver quien es mayor</h2>"; //Decimos que las introduzca
        }
    ?>

    <form action="Ej8.php" method="get"> <!-- Mandamos las fechas a esta misma página -->
        <!-- Pedimos fecha de nacimiento y nombre de la persona 1 -->
        <h3>Fecha de nacimiento y nombre Primera persona:</h3>
        Día <input type="number" name="diaP1" required>
        Mes <input type="number" name="mesP1" required>
        Año <input type="number" name="anoP1" required>
        Nombre <input type="text" name="nombreP1" required><br><br>
        <!-- Pedimos fecha de nacimiento y nombre de la persona 2 -->
        <h3>Fecha de nacimiento y nombre Segunda persona:</h3>
        Día <input type="number" name="diaP2" required>
        Mes <input type="number" name="mesP2" required>
        Año <input type="number" name="anoP2" required>
        Nombre <input type="text" name="nombreP2" required><br><br><br>
        <input type="submit" value="Enviar fechas">
    </form>

</body>

</html>