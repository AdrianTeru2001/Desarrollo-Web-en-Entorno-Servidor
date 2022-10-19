<!-- Ejercicio 9.
Pedir al usuario una cadena de caracteres e imprimirla invertida. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 - Invertir caracteres</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["cadena"])) { //Si la cadena se ha introducido
            $cadena = $_GET["cadena"]; //Pasamos la cadena a una variable
            $array = str_split($cadena); //Dividimos los caracteres y los metemos en un array
            echo "Cadena -> ",$cadena,"<br><br>";
            echo "Cadena invertida -> ";
            for ($i=count($array)-1; $i >= 0; $i--) { //Hacemos el for invertido
                echo $array[$i]; //Mostramos los caracteres
            }
        } else { //Si no se ha introducido la cadena decimos que se tiene que introducir
            echo "Introduce una cadena para invertirla";
        }
        echo "<br><br>";
    ?>

    <form action="Ej9.php" method="get"> <!-- Mandamos la cadena a esta misma página -->
        Introduzca una cadena <input type="text" name="cadena" required>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>