<!-- Ejercicio 4.
Verificar si un string leído por teclado finaliza con la misma palabra que empieza. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Comprobar si finaliza igual que empieza</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["frase"])) {
            $bandera = false; //Iniciamos un booleano a false
            $frase = trim($_GET["frase"]); //Recogemos la frase, la metemos en una variable y le quitamos los espacios del principio y del final
            $array = explode(" ",$frase); //Dividimos el contenido de la frase por espacios y las pasamos a un array
            echo "Frase -> '",$frase,"'";
            echo "<br><br>";
            for ($i=0; $i < count($array); $i++) { 
                if ($array[$i]=="") { //Si un elemento del array está vacio
                    unset($array[$i]); //Lo eliminamos
                    $array = array_values($array); //Ordenamos el array
                    $i=-1; //Empezamos de nuevo el bucle
                }
            }
            if (strtolower($array[0])==strtolower($array[count($array)-1])) { //Si la primera palabra y la última son la misma
                $bandera = true; //Pasamos a true el booleano
            }
            if ($bandera) { //Si el booleano es true 
                echo "La frase SI acaba con la misma palabra que empieza"; //Decimos que la primera y la última palabra son la misma
            } else {
                echo "La frase NO acaba con la misma palabra que empieza"; //Si no pues decimos que no son la misma
            }
        } else {
            echo "Introduce una frase para ver si acaba igual que empieza";
        }
        echo "<br><br>";
    ?>

    <form action="Ej4.php" method="get"> <!-- Mandamos la frase a esta misma página -->
        Introduzca una frase <input type="text" name="frase" required>
        <input type="submit" value="Comprobar Inicio y Fin">
    </form>

</body>

</html>