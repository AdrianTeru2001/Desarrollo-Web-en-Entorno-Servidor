<!-- Ejercicio 7.
Verificar si en una frase se encuentra una determinada palabra pedida al usuario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Buscar frase</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["palabra"])) { //Si la palabra se ha introducido
            $bandera = false;
            $frase = "Hola me llamo adrian y me gusta mucho jugar a los videojuegos, el futbol y programar";
            $palabra = trim($_GET["palabra"]); //Metemos la palabra en un array
            $arrayFrase = explode(" ", $frase); //Metemos la frase en un array
            echo "Frase -> ",$frase;
            echo "<br><br>";
            for ($i=0; $i < count($arrayFrase); $i++) { 
                if ($arrayFrase[$i]=="") { //Si un elemento del array está vacio
                    unset($arrayFrase[$i]); //Lo eliminamos
                    $arrayFrase = array_values($arrayFrase); //Ordenamos el array
                    $i=-1; //Empezamos de nuevo el bucle
                }
            }
            for ($i=0; $i < count($arrayFrase); $i++) { 
                if (strtolower($palabra) == strtolower($arrayFrase[$i])) { //Si la palabra introducida se encuentra en la frase
                    $bandera = true; //Pasamos a true la bandera
                    $i=count($arrayFrase); //Forzamos el fin del array
                }
            }
            if ($bandera==true) { //Si la bandera esta a true
                echo "La palabra ",$palabra," SI se encuentra en la frase"; //Decimos que si se encunetra la palabra en la frase
            } else { //Si la bandera esta a false
                echo "La palabra ",$palabra," NO se encuentra en la frase"; //Decimos que no se encunetra la palabra en la frase
            }
        } else { //Si no se ha introducido la palabra decimos que se tiene que introducir
            echo "Introduce una palabra para ver si se encuentra en la frase";
        }
        echo "<br><br>";

    ?>

    <form action="Ej7.php" method="get"> <!-- Mandamos la palabra a esta misma página -->
        Introduzca una palabra <input type="text" name="palabra" required>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>