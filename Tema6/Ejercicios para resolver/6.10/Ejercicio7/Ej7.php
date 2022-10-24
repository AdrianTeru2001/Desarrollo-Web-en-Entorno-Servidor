<!-- Ejercicio 7.
Pedir fecha de nacimiento y una fecha futura, y mostrar la edad que tendrá en esa fecha (tener en cuenta que un año tiene 60*60*24*365.25 segundos) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Edad que tendrá según fecha</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["diaN"]) && isset($_GET["mesN"]) && isset($_GET["anoN"]) && isset($_GET["diaF"]) && isset($_GET["mesF"]) && isset($_GET["anoF"])) { //Comprobamos que existan todos los datos necesarios
            //Recogemos todos los valores necesarios
            $diaN = $_GET["diaN"];
            $mesN = $_GET["mesN"];
            $anoN = $_GET["anoN"];
            $diaF = $_GET["diaF"];
            $mesF = $_GET["mesF"];
            $anoF = $_GET["anoF"];
            if (checkdate($mesN, $diaN, $anoN) && checkdate($mesF, $diaF, $anoF)) { //Si las fechas son correctas
                $fechaNacimiento = strtotime("$diaN-$mesN-$anoN 00:00:00"); //Pasamos la fecha de nacimento a entero
                $fechaFutura = strtotime("$diaF-$mesF-$anoF 00:00:00"); //Pasamos la fecha futura a entero
                if ($fechaNacimiento < $fechaFutura) { //Comprobamos que la fecha futura es mayor que la de nacimiento
                    $fechaFinal = $fechaFutura-$fechaNacimiento; //Restamos ambas fechas
                    $anoFinal = $fechaFinal/31557600; //Calculamos cuantos años tendrá
                    //Mostramos ambas fechas y los años que tendrá
                    echo "<h3>Fecha de Nacimiento -> ",date("d/m/Y", $fechaNacimiento),"</h3>";
                    echo "<h3>Fecha de Futura -> ",date("d/m/Y", $fechaFutura),"</h3>";
                    echo "<h3>Años que tendrá el dia de la fecha futura -> ",floor($anoFinal)," años</h3>";
                } else { //Si no lo es
                    echo "<h3>La fecha futura debe ser mas tarde que la fecha de nacimiento</h3>"; //Decimos que la fecha futura tiene que ser mayor que la de nacimiento
                }
            } else { //Si las fechas no son correctas
                echo "<h3>Introduce las fechas correctamente</h3>"; //Decimos que tiene que introducir una fecha correcta
            }
        } else { //Si no se han introducido las fechas
            echo "<h2>Introduce una fecha de nacimiento y una fecha futura para saber, pasada la fecha futura, que edad tiene</h2>"; //Decimos que las introduzca
        }
    ?>

    <form action="Ej7.php" method="get"> <!-- Mandamos las fechas a esta misma página -->
        <!-- Pedimos fecha de nacimiento -->
        <h3>Fecha de nacimiento:</h3>
        Día <input type="number" name="diaN" required>
        Mes <input type="number" name="mesN" required>
        Año <input type="number" name="anoN" required><br><br>
        <!-- Pedimos una fecha futura -->
        <h3>Fecha futura:</h3>
        Día <input type="number" name="diaF" required>
        Mes <input type="number" name="mesF" required>
        Año <input type="number" name="anoF" required><br><br><br>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>