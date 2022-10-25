<!-- Ejercicio 2
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo 
y nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. 
El número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se 
incluye en el cómputo. Utiliza sesiones. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>

    <?php 
        session_start(); //Iniciamos la sesion
        if (isset($_SESSION["intro"])) { 
            if (isset($_GET["num"])) {
                $_SESSION["intro"]++; //Sumamos 1 a la sesion de numeros introducidos
                if ($_GET["num"]<0) {
                    $_SESSION["acabar"] = $_GET["num"]; //Metemos el número en la sesion acabar
                }
                if ($_GET["num"]%2!=0) { //Si el número es impar
                    $_SESSION["introImpares"]++;
                    $_SESSION["impares"] = $_SESSION["impares"]+$_GET["num"];
                    $_SESSION["mediaImpares"] =  $_SESSION["impares"] / $_SESSION["introImpares"]; //Calculamos la media de imparess
                } else if ($_GET["num"]%2==0){ //Si el número es par
                    if ($_SESSION["pares"]<$_GET["num"]) { //Miramos si el número introducido es mayor que el que ya existe
                        $_SESSION["pares"] = $_GET["num"]; 
                    }
                }
                header("location: Ej2.php"); 
            } else { //Si no se introduce ningún número (o llegamos a la pagina despues del header de antes)
                echo "<h3>La cantidad de números introducidos es ",$_SESSION["intro"],"</h3>";
                echo "<h3>La media de los números impares es ",$_SESSION["mediaImpares"],"</h3>";
                echo "<h3>El mayor de los números pares es ",$_SESSION["pares"],"</h3><br>";
            }
        } else {
            //Creamos todas las sesiones que nos hagan falta
            $_SESSION["intro"] = 0;
            $_SESSION["introImpares"] = 0;
            $_SESSION["impares"] = 0;
            $_SESSION["mediaImpares"] = 0;
            $_SESSION["pares"] = 0;
            $_SESSION["acabar"] = 0;
        }
    ?>

    <?php 
        if ($_SESSION["acabar"]>=0) { //Si la sesion acabar es menor que 0 (negativa) ?> 
            <!-- Mostramos todo lo necesario para introducir números -->
            <h2>Ve introduciendo números para hacer mostrar los datos del ejercicio</h2>
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