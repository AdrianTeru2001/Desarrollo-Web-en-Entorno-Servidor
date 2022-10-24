<!-- Ejercicio 1
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado.
A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado
de introducir los datos cuando meta un número negativo. Utiliza sesiones. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>

    <?php 
        session_start(); //Iniciamos la sesion
        if (isset($_SESSION["intro"])) {
            if (isset($_GET["num"])) {
                if ($_GET["num"]<0) { //Si el número introducido es menor de 0 (es negativo)
                    $_SESSION["acabar"] = $_GET["num"]; //Metemos el número en la sesion acabar
                }
                $_SESSION["intro"]++; 
                $_SESSION["acumulado"] = $_SESSION["acumulado"]+$_GET["num"]; 
                $_SESSION["media"] =  $_SESSION["acumulado"] / $_SESSION["intro"]; //Sacamos la media diviendo acumulado entre número introducido
                header("location: Ej1.php"); 
            } else { //Si no se introduce ningún número (o llegamos a la pagina despues del header de antes)
                //Mostramos todos los datos de las sesiones (acumulado, cantidad de números introducidos y la media)
                echo "<h3>La suma de todos los números introducidos es ",$_SESSION["acumulado"],"</h3>";
                echo "<h3>La cantidad de números introducidos es ",$_SESSION["intro"],"</h3>";
                echo "<h3>La media de los números introducidos es ",$_SESSION["media"],"</h3><br>";
            }
        } else {
            //Creamos todas las sesiones que nos hagan falta
            $_SESSION["intro"] = 0;
            $_SESSION["acumulado"] = 0;
            $_SESSION["media"] = 0;
            $_SESSION["acabar"] = 0;
        }
    ?>

    <?php 
        if ($_SESSION["acabar"]>=0) { //Si la sesion acabar es menor que 0 (negativa) ?> 
            <!-- Mostramos todo lo necesario para introducir números -->
            <h2>Ve introduciendo números para hacer la media de todos ellos</h2>
            <h4>(La introducción se acaba al ingresar un número negativo)</h4>
            <form action="#" method="get">
                Introduce un número <input type="number" name="num" required>
                <input type="submit" value="Hacer media">
            </form>    
    <?php 
        } else { //Si acabar es negativo
            //Se muestra solo el mensaje de que ya se ha finalizado la introducción de números
            echo "<h2>Introducción de números finalizada</h2>";
        }
    ?>

</body>

</html>