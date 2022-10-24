<!-- Ejercicio 2.
Lo mismo que el anterior, pero para la hora. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Comprobar Hora</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["hora"]) && isset($_GET["minuto"]) && isset($_GET["segundo"])) { //Si existen los valores de hora, minuto y segundo
            //Recogemos todos los valores necesarios
            $hora = $_GET["hora"];
            $minuto = $_GET["minuto"];
            $segundo = $_GET["segundo"];
            $formato = $_GET["formato"];
            $horario = "$hora:$minuto:$segundo";//Creamos la variable horario que contenga la hora
            if (($segundo>=0 && $segundo<60) && ($minuto>=0 && $minuto<60) && ($hora>=0 && $hora<=24)) { //Si la hora introducida es valida
                echo "<h2>Hora Correcta</h2>";
                echo "<h3>Hora -> ",date($formato, strtotime($horario)),"</h3>"; //Mostramos la hora en el formato seleccionado
            } else { //Si no es valida la hora
                echo "<h2>Hora Incorrecta</h2>"; //Decimos que la fecha es incorrecta 
            }
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese una hora para comprobar si es correcta.</h2>"; //Decimos que ingrese los valores correctos de la hora
        }
    ?>

    <form action="Ej2.php" method="get"> <!-- Mandamos la hora a esta misma página -->
        Formato de la hora: 
        <select name="formato"> <!-- Ponemos las diferentes opciones para el formato de la hora -->
            <option value="H:i:s">14:54:34</option>
            <option value="s:i:H">34:54:14</option>
            <option value="h:i:s">02:54:34</option>
            <option value="s:i:h">34:54:02</option>
            <option value="g:i:s">2:54:34</option>
            <option value="s:i:g">34:54:2</option>
        </select><br><br>
        <!-- Pedimos la hora, minuto y segundo de la hora -->
        Horas <input type="number" name="hora" required>
        Minutos <input type="number" name="minuto" required>
        Segundos <input type="number" name="segundo" required>
        <input type="submit" value="Enviar Hora">
    </form>

</body>

</html>