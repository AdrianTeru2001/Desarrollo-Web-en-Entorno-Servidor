<!-- Ejercicio 3.
Pedir una fecha y mostrar a que día de la semana corresponde (en español). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Comprobar dia de la semana</title>
</head>

<body>

    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["ano"])) { //Si existen los valores de dia, mes y año
            //Recogemos todos los valores necesarios
            $dia = $_GET["dia"];
            $mes = $_GET["mes"];
            $ano = $_GET["ano"];
            $diaSemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); //Creamos un array con los dias de la semana
            $fecha = "$dia-$mes-$ano"; //Creamos la variable fecha que contenga la fecha
            if (checkdate($mes, $dia, $ano)) { //Si la fecha introducida es valida
                echo "<h2>Fecha Correcta</h2>"; //Decimos que la fecha es correcta
                echo "<h3>El dia de la semana de la fecha ",$fecha," es ",$diaSemana[date('w', strtotime($fecha))],"</h3>"; //Mostramos el dia de la semana que corresponde a la fecha mediante el array y la funcion date
            } else { //Si es incorrecta
                echo "<h2>Fecha Incorrecta</h2>"; //Decimos que la fecha es incorrecta
            }
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese una fecha para comprobar a que dia de la semana corresponde.</h2>"; //Decimos que tiene que ingresar la fecha para comprobar el dia de la semana
        }
    ?>

    <form action="Ej3.php" method="get"> <!-- Mandamos la fecha a esta misma página -->
        <!-- Pedimos el dia, mes y año de la fecha -->
        Día <input type="number" name="dia" required>
        Mes <input type="number" name="mes" required>
        Año <input type="number" name="ano" required>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>