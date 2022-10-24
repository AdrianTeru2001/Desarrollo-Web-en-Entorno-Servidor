<!-- Ejercicio 1.
A través de un formulario, el usuario introduce una fecha, si no es correcta se debe indicar en un mensaje;
si es correcta se debe mostrar en el formato elegido, crea botones de opción para configurar todas 
las posibilidades de los dígitos del dia, mes y año. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Comprobar Fecha</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["ano"])) { //Si existen los valores de dia, mes y año
            //Recogemos todos los valores necesarios
            $dia = $_GET["dia"];
            $mes = $_GET["mes"];
            $ano = $_GET["ano"];
            $formato = $_GET["formato"];
            $fecha = "$ano-$mes-$dia"; //Creamos la variable fecha que contenga la fecha
            if (checkdate($mes, $dia, $ano)) { //Si la fecha introducida es valida
                echo "<h2>Fecha Correcta</h2>"; //Decimos que la fecha es correcta
                echo "<h3>Fecha -> ",date($formato, strtotime($fecha)),"</h3>"; //Y mostramos la fecha con el formato que hayamos elegido
            } else { //Si es incorrecta
                echo "<h2>Fecha Incorrecta</h2>"; //Decimos que la fecha es incorrecta
            }
        } else { //Si no se han ingresado los valores
            echo "<h2>Ingrese una fecha para comprobar si es correcta.</h2>"; //Decimos que tiene que ingresar la fecha para comprobarla
        }
    ?>

    <form action="Ej1.php" method="get"> <!-- Mandamos la fecha a esta misma página -->
        Formato de la fecha: 
        <select name="formato"> <!-- Ponemos las diferentes opciones para el formato de la fecha -->
            <option value="d/m/Y">02/09/2018</option>
            <option value="j/n/y">2/9/18</option>
            <option value="Y/m/d">2018/09/02</option>
            <option value="y/n/j">18/9/2</option>
            <option value="d-m-Y">02-09-2018</option>
            <option value="j-n-y">2-9-18</option>
            <option value="Y/m/d">2018-09-02</option>
            <option value="y-n-j">18-9-2</option>
        </select><br><br>
        <!-- Pedimos el dia, mes y año de la fecha -->
        Día <input type="number" name="dia" required>
        Mes <input type="number" name="mes" required>
        Año <input type="number" name="ano" required>
        <input type="submit" value="Enviar fecha">
    </form>

</body>

</html>