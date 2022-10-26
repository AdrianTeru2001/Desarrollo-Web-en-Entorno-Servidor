<!-- Ejercicio 3
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras 
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado, 
el contador de los números introducidos y la media. Utiliza sesiones. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>

    <?php 
        session_start(); //Iniciamos la sesion
        if (isset($_SESSION["intro"])) { 
            if (isset($_GET["num"])) {
                $_SESSION["intro"]++; //Sumamos 1 a la sesion de numeros introducidos
                $_SESSION["acumulado"] = $_SESSION["acumulado"] + $_GET["num"]; //Sumamos el número introducido al acumulado
                $_SESSION["media"] = $_SESSION["acumulado"] / $_SESSION["intro"]; //Hacemos la media
                header("location: Ej3.php"); 
            } else { //Si no se introduce ningún número (o llegamos a la pagina despues del header de antes)
                echo "<h3>El total de números acumulados es ",$_SESSION["acumulado"],"</h3>";
                echo "<h3>La cantidad de números introducidos es ",$_SESSION["intro"],"</h3>";
                echo "<h3>La media de los números introducidos es ",$_SESSION["media"],"</h3><br>";
            }
        } else {
            //Creamos todas las sesiones que nos hagan falta
            $_SESSION["intro"] = 0;
            $_SESSION["media"] = 0;
            $_SESSION["acumulado"] = 0;
        }
    ?>

    <?php 
        if ($_SESSION["acumulado"]<=10000) { //Si el acumulador supera 10000 ?> 
            <!-- Mostramos todo lo necesario para introducir números -->
            <h2>Ve introduciendo números hasta que la suma de todos ellos no supere 10000</h2>
            <form action="#" method="get">
                Introduce un número <input type="number" name="num" required>
                <input type="submit" value="Hacer media">
            </form>    
    <?php 
        } else {
            echo "<h2>Introducción de números finalizada</h2>";
        }
        if ($_GET["volver"] = "volver") {?> <br><br>
            <form action="../Ejercicio4/Ej4_Cookie.php" methos="get">
                <input type="submit" value="Volver a elegir ejercicios">
            </form>
    <?php } ?>

</body>

</html>