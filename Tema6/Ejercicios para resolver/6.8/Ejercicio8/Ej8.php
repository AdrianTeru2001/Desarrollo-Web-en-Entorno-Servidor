<!-- Ejercicio 8.
Pedir un string al usuario e imprimir todos los números seguidos y sin espacios, correspondientes 
al código ascii de cada uno de sus caracteres. Posteriormente calcular la frase original a partir
de dichos números (usar un array). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 - Usar el ASCII de una palabra</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["cadena"])) { //Si la cadena se ha introducido
            $cadena = $_GET["cadena"]; //Pasamos la cadena a una variable
            $array = str_split($cadena); //Dividimos los caracteres y los metemos en un array
            $arrayASCII = [];
            echo "Cadena pasado a código ASCII todo junto -> ";
            for ($i=0; $i < count($array); $i++) { 
                $arrayASCII[] = ord($array[$i]); //Pasamos los caracteres a código ASCII y los metemos valor a valor en un nuevo array
                echo $arrayASCII[$i];
            }
            echo "<br><br>";
            echo "Pasando los valores ASCII a cadena -> ";
            for ($i=0; $i < count($arrayASCII); $i++) { 
                echo chr($arrayASCII[$i]); //Pasamos de ASCII a caracter y los mostramos todos juntos
            }
        } else { //Si no se ha introducido la cadena decimos que se tiene que introducir
            echo "Introduce una cadena para saber su codigo ASCII";
        }
        echo "<br><br>";
    ?>

    <form action="Ej8.php" method="get"> <!-- Mandamos la cadena a esta misma página -->
        Introduzca una cadena <input type="text" name="cadena" required>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>