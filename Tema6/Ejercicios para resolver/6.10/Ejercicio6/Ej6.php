<!-- Ejercicio 6.
Mostrar el día de la semana una vez transcurridos un numero de años, meses, y días, elegidos por el usuario, desde la fecha actual. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Mostrar dia de la semana despues de x dias, meses y años</title>
</head>

<body>

    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["ano"])) { //Si existen los valores de dia, mes y año
            //Recogemos todos los valores necesarios
            $dia = $_GET["dia"];
            $mes = $_GET["mes"];
            $ano = $_GET["ano"];
            $fecha = date("d-m-Y"); //Creamos la variable fecha que contenga la fecha
            $diaSemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); //Creamos un array con los dias de la semana
            echo "<h3>Fecha actual -> ",date("d/m/Y", strtotime($fecha)),"</h3>"; //Mostramos la fecha actual
            $fecha = date("d-m-Y", strtotime($fecha."+$dia day $mes month $ano year")); //Calculamos la fecha segun los dias, meses y años introducidos
            echo "<h3>Fecha segun tiempo introducido -> ",date("d/m/Y", strtotime($fecha)),"</h3>"; //Mostramos la fecha calculada
            echo "<h3>El dia de la semana de la fecha ",date("d/m/Y", strtotime($fecha))," es ",$diaSemana[date('w', strtotime($fecha))],"</h3>"; //Mostramos el dia de la semana que corresponde a la fecha mediante el array y la funcion date
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese unos dias, meses y años para ver que dia de la semana será ese dia contando desde hoy</h2>"; //Decimos que tiene que ingresar la fecha para mostrar el dia de la semana de ese dia
        }
    ?>

    <form action="Ej6.php" method="get"> <!-- Mandamos la fecha a esta misma página -->
        <!-- Pedimos el dia, mes y año de la fecha -->
        Días <input type="number" name="dia" required>
        Meses <input type="number" name="mes" required>
        Años <input type="number" name="ano" required>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>