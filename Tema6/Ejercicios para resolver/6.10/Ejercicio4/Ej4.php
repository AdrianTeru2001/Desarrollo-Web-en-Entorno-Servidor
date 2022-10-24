<!-- Ejercicio 4.
Pedir una fecha y mostrarla en el formato “12 de Enero de 2018” (en español). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Mostrar fecha con formato indicado</title>
</head>

<body>

    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["ano"])) { //Si existen los valores de dia, mes y año
            //Recogemos todos los valores necesarios
            $dia = $_GET["dia"];
            $mes = $_GET["mes"];
            $ano = $_GET["ano"];
            $mesLetra = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); //Creamos un array con los meses del año
            $fecha = "$dia-$mes-$ano"; //Creamos la variable fecha que contenga la fecha
            if (checkdate($mes, $dia, $ano)) { //Si la fecha introducida es valida
                echo "<h2>Fecha Correcta</h2>"; //Decimos que la fecha es correcta
                echo "<h3>Fecha -> ",date('d', strtotime($fecha))," de ",$mesLetra[date('n', strtotime($fecha))-1]," de ",date('Y', strtotime($fecha)),"</h3>"; //Mostramos la fecha con el formato indicado
            } else { //Si es incorrecta
                echo "<h2>Fecha Incorrecta</h2>"; //Decimos que la fecha es incorrecta
            }
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese una fecha para mostrarla con un formato específico.</h2>"; //Decimos que tiene que ingresar la fecha para mostrarla con un formato
        }
    ?>

    <form action="Ej4.php" method="get"> <!-- Mandamos la fecha a esta misma página -->
        <!-- Pedimos el dia, mes y año de la fecha -->
        Día <input type="number" name="dia" required>
        Mes <input type="number" name="mes" required>
        Año <input type="number" name="ano" required>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>