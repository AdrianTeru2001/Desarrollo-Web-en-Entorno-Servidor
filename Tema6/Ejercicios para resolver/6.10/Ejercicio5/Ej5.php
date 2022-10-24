<!-- Ejercicio 5.
Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Mostrar fecha proximo dia</title>
</head>

<body>

    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["ano"])) { //Si existen los valores de dia, mes y año
            //Recogemos todos los valores necesarios
            $dia = $_GET["dia"];
            $mes = $_GET["mes"];
            $ano = $_GET["ano"];
            $fecha = "$dia-$mes-$ano"; //Creamos la variable fecha que contenga la fecha
            if (checkdate($mes, $dia, $ano)) { //Si la fecha introducida es valida
                echo "<h2>Fecha Correcta</h2>"; //Decimos que la fecha es correcta
                echo "<h3>Fecha introducida -> ",date("d/m/Y", strtotime($fecha)),"</h3>";
                echo "<h3>Un dia despues -> ",date("d/m/Y", strtotime($fecha."+1 day")),"</h3>"; //Mostramos la fecha de un dia mas a la fecha introducida 
            } else { //Si es incorrecta
                echo "<h2>Fecha Incorrecta</h2>"; //Decimos que la fecha es incorrecta
            }
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese una fecha para mostrar la fecha de siguiente dia.</h2>"; //Decimos que tiene que ingresar la fecha para mostrar la fecha del siguiente dia
        }
    ?>

    <form action="Ej5.php" method="get"> <!-- Mandamos la fecha a esta misma página -->
        <!-- Pedimos el dia, mes y año de la fecha -->
        Día <input type="number" name="dia" required>
        Mes <input type="number" name="mes" required>
        Año <input type="number" name="ano" required>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>